/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/theme/modern/modern.js
 * \brief      Highlights the current left menu link. Loaded automatically by main.inc.php (theme/<theme>/<theme>.js).
 *
 * The page reloads on every click, so the last clicked menu link is kept in sessionStorage.
 * On load: a link matching the current address wins, otherwise the last clicked link is used.
 */
(function () {
	'use strict';

	var KEY = 'modern_leftmenu_entry'; // {"id": "<section>|<entry>", "href": "..."} of the current entry
	var CLICKED = 'modern_leftmenu_clicked'; // set by a click, read once by the next page
	var IGNORED = ['token', 'theme', 'optioncss', 'page', 'sortfield', 'sortorder'];

	function path(href) {
		try {
			var u = new URL(href, window.location.href);
			return u.origin === window.location.origin ? u : null;
		} catch (e) {
			return null;
		}
	}

	// Score of a link against the current page. 0 = not this page.
	// Same file is required, and every parameter of the link must match the current address
	// (menu parameters may be absent or empty in the current address). More matching parameters = better.
	function score(a) {
		var u = path(a.getAttribute('href'));
		var here = new URL(window.location.href);
		if (!u || u.pathname !== here.pathname) {
			return 0;
		}
		var s = 1;
		var ok = true;
		u.searchParams.forEach(function (v, k) {
			if (!ok || IGNORED.indexOf(k) !== -1) {
				return;
			}
			var cur = here.searchParams.get(k);
			if (cur === v) {
				s += 2;
			} else if (!((k === 'mainmenu' || k === 'leftmenu') && !cur)) {
				ok = false;
			}
		});
		return ok ? s : 0;
	}

	function mark(a) {
		a.classList.add('m-current');
		var item = a.closest('.menu_contenu');
		if (item) {
			item.classList.add('m-current');
			// The menu is flat: the parent is the closest previous group title
			var prev = item.previousElementSibling;
			while (prev && !prev.classList.contains('menu_titre')) {
				prev = prev.previousElementSibling;
			}
			var parent = prev && prev.querySelector('a.vmenu, span.vmenu');
			if (parent) {
				parent.classList.add('m-current-parent');
			}
		}
	}

	// Collapsible groups: a chevron on each group title that has sub items, state kept in localStorage.
	// The menu is flat (title, then its items as siblings), so the items of a group are the siblings up to the next title.
	// Dolibarr only sends the sub items of the section being browsed. The others are read from the full menu
	// and added folded, so every such section shows its chevron.
	var GKEY = 'dolibarr_modern_theme_left_menu_groups'; // {"<section label>": true if folded}
	var MKEY = 'dolibarr_modern_theme_full_menu'; // whole menu tree, cached in sessionStorage
	var MENU_URL = new URL('../../core/get_menudiv.php', document.currentScript.src).href;
	var ROOT_URL = new URL('../../', document.currentScript.src).href; // address given to a label without a page
	var TITLES = 'div.vmenu div.menu_titre';

	function getGroups() {
		try { return JSON.parse(localStorage.getItem(GKEY) || '{}'); } catch (e) { return {}; }
	}

	function saveGroup(label, folded) {
		var groups = getGroups();
		groups[label] = folded;
		try { localStorage.setItem(GKEY, JSON.stringify(groups)); } catch (e) { /* ignore */ }
	}

	function groupItems(title) {
		var items = [];
		var n = title.nextElementSibling;
		while (n && !n.classList.contains('menu_titre')) {
			items.push(n);
			n = n.nextElementSibling;
		}
		return items;
	}

	function hasSubItems(title) {
		return groupItems(title).some(function (el) { return el.classList.contains('menu_contenu'); });
	}

	function applyState(title, items, folded) {
		title.classList.toggle('m-collapsed', folded);
		var btn = title.querySelector('.m-chev');
		if (btn) {
			btn.setAttribute('aria-expanded', folded ? 'false' : 'true');
		}
		items.forEach(function (el) {
			el.classList.toggle('m-group-hidden', folded);
		});
	}

	function addChevron(title, foldedByDefault) {
		if (!hasSubItems(title)) {
			return;
		}
		var items = groupItems(title);
		var label = title.textContent.trim();
		var hasCurrent = items.some(function (el) { return el.classList.contains('m-current'); });
		var saved = getGroups()[label];

		var btn = document.createElement('button');
		btn.type = 'button';
		btn.className = 'm-chev';
		btn.setAttribute('aria-label', label);
		btn.innerHTML = '<span class="fas fa-chevron-down" aria-hidden="true"></span>';
		title.appendChild(btn);
		title.classList.add('m-has-children');

		// The group of the current page is never folded
		applyState(title, items, !hasCurrent && (saved === undefined ? foldedByDefault : saved));

		btn.addEventListener('click', function (ev) {
			ev.preventDefault();
			ev.stopPropagation();
			var folded = !title.classList.contains('m-collapsed');
			applyState(title, items, folded);
			saveGroup(label, folded);
		});

		// Sent when a section is opened from the icon bar: show that one only, without saving the choice
		title.addEventListener('modern:show', function (ev) {
			applyState(title, items, ev.detail !== title);
		});
	}

	function text(el) {
		return el.textContent.replace(/\s+/g, ' ').trim();
	}

	// Calls done(doc) with the whole menu tree, served by Dolibarr as nested lists (core/get_menudiv.php)
	function loadFullMenu(done) {
		function parse(html) {
			done(new DOMParser().parseFromString(html, 'text/html'));
		}
		var cached = null;
		try { cached = sessionStorage.getItem(MKEY); } catch (e) { /* ignore */ }
		if (cached) {
			parse(cached);
			return;
		}
		fetch(MENU_URL, { credentials: 'same-origin' }).then(function (r) {
			return r.ok ? r.text() : '';
		}).then(function (html) {
			if (html.indexOf('ulmenu') !== -1) {
				try { sessionStorage.setItem(MKEY, html); } catch (e) { /* ignore */ }
				parse(html);
			}
		}).catch(function () { /* offline or blocked: the menu stays as sent */ });
	}

	// Name of a section in the full menu: its text without the sub lists
	function sectionName(li) {
		var copy = li.cloneNode(true);
		Array.prototype.forEach.call(copy.querySelectorAll('ul'), function (ul) { ul.remove(); });
		return text(copy);
	}

	// Sections (name -> list item) of the main menu that matches best the titles of the page
	function matchingSections(doc, names) {
		var best = {};
		var bestCount = 0;
		Array.prototype.forEach.call(doc.querySelectorAll('ul.ulmenu > li.lilevel0'), function (main) {
			var sections = {};
			var count = 0;
			Array.prototype.forEach.call(main.querySelectorAll('li.lilevel1'), function (li) {
				var name = sectionName(li);
				sections[name] = li;
				count += names.indexOf(name) !== -1 ? 1 : 0;
			});
			if (count > bestCount) {
				best = sections;
				bestCount = count;
			}
		});
		return best;
	}

	// Same markup as the sub items sent by Dolibarr: div.menu_contenu > a.vsmenu
	function menuItem(li) {
		var source = li.querySelector(':scope > a');
		if (!source) {
			return null;
		}
		var item = document.createElement('div');
		item.className = 'menu_contenu';
		var link = document.importNode(source, true);
		// A label without a page: Dolibarr sends it as a span, the full menu as a link to the home page
		if (new URL(link.getAttribute('href') || ROOT_URL, window.location.href).href === ROOT_URL) {
			var label = document.createElement('span');
			while (link.firstChild) {
				label.appendChild(link.firstChild);
			}
			link = label;
		}
		link.className = 'vsmenu';
		Array.prototype.forEach.call(link.querySelectorAll('.fa-does-not-exists'), function (i) { i.remove(); });
		item.appendChild(link);
		return item;
	}

	function addMissingItems(doc) {
		var titles = Array.prototype.slice.call(document.querySelectorAll(TITLES));
		var sections = matchingSections(doc, titles.map(text));
		titles.forEach(function (title) {
			var section = sections[text(title)];
			if (!section || hasSubItems(title)) {
				return;
			}
			var last = title;
			Array.prototype.forEach.call(section.querySelectorAll('ul li'), function (li) {
				var item = menuItem(li);
				if (item) {
					last.after(item);
					last = item;
				}
			});
			addChevron(title, true);
		});
	}

	// Scrolls the left menu so the current entry is visible, with the entries around it
	function showCurrent() {
		var menu = document.querySelector('.side-nav');
		var current = menu && menu.querySelector('.m-current');
		if (!current) {
			return;
		}
		var box = current.getBoundingClientRect();
		var view = menu.getBoundingClientRect();
		// Already well inside the menu (not stuck to its bottom edge): leave it where it is
		if (box.top < view.top || box.bottom > view.bottom - 60) {
			current.scrollIntoView({ block: 'center' });
		}
	}

	// Name of an entry: its section and its own text. Several entries can share one address, not one name.
	function entryId(a) {
		var node = a.closest('.menu_titre, .menu_contenu');
		var isTitle = node && node.classList.contains('menu_titre');
		while (node && !node.classList.contains('menu_titre')) {
			node = node.previousElementSibling;
		}
		return (node ? text(node) : '') + '|' + (isTitle ? '' : text(a));
	}

	function saveEntry(a) {
		try {
			sessionStorage.setItem(KEY, JSON.stringify({ id: entryId(a), href: a.getAttribute('href') }));
		} catch (e) { /* storage blocked: the address match only */ }
	}

	function savedEntry(links) {
		var saved = null;
		try { saved = JSON.parse(sessionStorage.getItem(KEY)); } catch (e) { /* ignore */ }
		if (!saved) {
			return null;
		}
		var same = links.filter(function (a) { return entryId(a) === saved.id; });
		return same.filter(function (a) { return a.getAttribute('href') === saved.href; })[0] || same[0] || null;
	}

	// Marks the one entry of the current page. The entry just clicked wins, even if its page redirects
	// elsewhere. Without a click: the best match of the address (the last entry when it is as good),
	// and failing that the last entry.
	function markCurrent(clicked) {
		Array.prototype.forEach.call(document.querySelectorAll('div.vmenu .m-current, div.vmenu .m-current-parent'), function (el) {
			el.classList.remove('m-current', 'm-current-parent');
		});
		// Sub items first: when a sub item and a section name match the same page, the sub item wins
		var links = Array.prototype.slice.call(document.querySelectorAll('div.vmenu a.vsmenu[href]'))
			.concat(Array.prototype.slice.call(document.querySelectorAll(TITLES + ' a.vmenu[href]')));
		var last = savedEntry(links);
		var best = null;
		var bestScore = 0;
		links.forEach(function (a) {
			var s = score(a);
			if (s > bestScore) {
				best = a;
				bestScore = s;
			}
		});
		if (last && (clicked || !best || score(last) >= bestScore)) {
			best = last;
		}
		if (best) {
			mark(best);
			saveEntry(best);
		}
	}

	// Unfolds the section holding the current entry, and scrolls to that entry
	function revealCurrent() {
		var node = document.querySelector('div.vmenu .menu_contenu.m-current');
		while (node && !node.classList.contains('menu_titre')) {
			node = node.previousElementSibling;
		}
		if (node) {
			node.dispatchEvent(new CustomEvent('modern:show', { detail: node }));
		}
		showCurrent();
	}

	function initGroups(clicked) {
		var titles = Array.prototype.slice.call(document.querySelectorAll(TITLES));
		var incomplete = titles.some(function (title) { return !hasSubItems(title); });
		titles.forEach(function (title) { addChevron(title, false); });
		if (incomplete) {
			loadFullMenu(function (doc) {
				addMissingItems(doc);
				markCurrent(clicked); // the entry may be one of those just added
				revealCurrent();
			});
		}
	}

	function init() {
		var clicked = false;
		try {
			clicked = !!sessionStorage.getItem(CLICKED);
			sessionStorage.removeItem(CLICKED);
		} catch (e) { /* ignore */ }

		markCurrent(clicked);
		initGroups(clicked);
		revealCurrent();

		// Remember the clicked link before the page reloads (also for the sub items added later)
		document.addEventListener('click', function (ev) {
			var a = ev.target.closest('div.vmenu a.vsmenu[href], ' + TITLES + ' a.vmenu[href]');
			// A modifier key opens another tab: this one stays where it is
			if (a && !ev.defaultPrevented && !ev.ctrlKey && !ev.metaKey && !ev.shiftKey) {
				saveEntry(a);
				try { sessionStorage.setItem(CLICKED, '1'); } catch (e) { /* ignore */ }
			}
			// A section name opens its page: show the section unfolded there, even if it was folded before.
			// A click already handled (icon bar) loads no page and is not saved.
			var section = ev.target.closest(TITLES + ' a.vmenu[href]');
			if (section && !ev.defaultPrevented) {
				saveGroup(section.closest('div.menu_titre').textContent.trim(), false);
			}
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();

/**
 * Left menu toggle (desktop only).
 * - A click on the toggle opens the menu or reduces it to an icon rail. The choice is kept in
 *   localStorage as "true" (open) or "false" (closed).
 * - Hovering the toggle while closed grows the menu over the page and the top bar (the content does not move),
 *   until the pointer leaves the toggle and the menu.
 * - Hovering an icon of the rail shows the name of its section. Clicking it opens the menu over the page,
 *   with that section highlighted and the only one unfolded, until a click outside or the Escape key. This is not saved.
 * - Hovering the toggle shows what it does.
 */
(function () {
	'use strict';

	var OPEN_KEY = 'dolibarr_modern_theme_left_menu_open';
	var CLOSED = 'sidebar-collapse'; // Dolibarr class on <body>
	var PEEK = 'm-menu-peek';
	var desktop = window.matchMedia('(hover: hover) and (min-width: 769px)');
	// Texts of the toggle tooltip: the page gives no translation to scripts of a theme
	var TEXTS = {
		en: { closed: 'Menu hidden: hover to preview, click to keep it open', open: 'Click to reduce the menu to icons' },
		fr: { closed: 'Menu réduit : survoler pour l’aperçu, cliquer pour le garder ouvert', open: 'Cliquer pour réduire le menu en icônes' }
	};

	// A small label beside an element, drawn in <body> so the menu does not clip it
	function createTip(content, left, anchor) {
		var box = anchor.getBoundingClientRect();
		var tip = document.createElement('div');
		tip.className = 'm-rail-tip';
		tip.setAttribute('role', 'tooltip');
		tip.textContent = content;
		tip.style.left = left + 'px';
		tip.style.top = (box.top + box.height / 2) + 'px';
		document.body.appendChild(tip);
		return tip;
	}

	function readOpen() {
		try { return localStorage.getItem(OPEN_KEY); } catch (e) { return null; }
	}

	function saveOpen(open) {
		try { localStorage.setItem(OPEN_KEY, open ? 'true' : 'false'); } catch (e) { /* storage blocked */ }
	}

	// This script runs in <head>: apply the saved state as soon as <body> exists, so the menu does not flash open
	function restoreState() {
		if (!desktop.matches || readOpen() !== 'false') {
			return;
		}
		new MutationObserver(function (changes, observer) {
			if (document.body) {
				document.body.classList.add(CLOSED);
				observer.disconnect();
			}
		}).observe(document.documentElement, { childList: true });
	}

	function setupToggle(toggle, menu) {
		var body = document.body;
		var timer = null;
		var held = false; // preview opened by a click on a rail icon: it stays until closed on purpose

		function stay() {
			window.clearTimeout(timer);
		}

		var restore = null; // puts the highlight of the current page back

		// Highlights a section opened from the rail instead of the entry of the current page
		function highlight(title, link) {
			var inside = false;
			for (var n = title.nextElementSibling; n && !n.classList.contains('menu_titre'); n = n.nextElementSibling) {
				inside = inside || n.classList.contains('m-current');
			}
			if (inside || link.classList.contains('m-current')) {
				return; // the current page is in this section: nothing to move
			}
			var marked = Array.prototype.map.call(menu.querySelectorAll('.vmenu.m-current, .vsmenu.m-current, .vmenu.m-current-parent'), function (el) {
				var name = el.classList.contains('m-current') ? 'm-current' : 'm-current-parent';
				el.classList.remove(name);
				return [el, name];
			});
			link.classList.add('m-current');
			restore = function () {
				link.classList.remove('m-current');
				marked.forEach(function (m) { m[0].classList.add(m[1]); });
			};
		}

		function endPreview() {
			stay();
			if (restore) {
				restore();
				restore = null;
			}
			held = false;
			body.classList.remove(PEEK);
		}

		// Short delay to move between the toggle and the menu
		function leave() {
			stay();
			if (held || !body.classList.contains(PEEK)) {
				return;
			}
			timer = window.setTimeout(function () {
				// A search list opened from the menu is drawn outside of it: wait until it is closed
				if (document.querySelector('.select2-container--open')) {
					leave();
				} else {
					endPreview();
				}
			}, 300);
		}

		toggle.addEventListener('mouseenter', function () {
			stay();
			if (desktop.matches && body.classList.contains(CLOSED)) {
				body.classList.add(PEEK);
			}
		});
		toggle.addEventListener('mouseleave', leave);
		menu.addEventListener('mouseenter', stay);
		menu.addEventListener('mouseleave', leave);

		// Head of the preview, over the left part of the top bar: moving over it keeps the preview
		var head = document.createElement('div');
		head.className = 'm-peek-head';
		toggle.closest('#id-top').appendChild(head);
		head.addEventListener('mouseenter', stay);
		head.addEventListener('mouseleave', leave);

		// A click on a rail icon of a section with sub items opens the menu over the page, on that section.
		// A section without sub items, or a click with a modifier key, follows the link as usual.
		menu.addEventListener('click', function (ev) {
			var link = ev.target.closest('.menu_titre.m-has-children .vmenu');
			var rail = body.classList.contains(CLOSED) && !body.classList.contains(PEEK);
			if (!link || !rail || !desktop.matches || ev.ctrlKey || ev.metaKey || ev.shiftKey) {
				return;
			}
			ev.preventDefault();
			var title = link.closest('.menu_titre');
			stay();
			held = true;
			body.classList.add(PEEK);
			highlight(title, link);
			Array.prototype.forEach.call(menu.querySelectorAll('.menu_titre.m-has-children'), function (section) {
				section.dispatchEvent(new CustomEvent('modern:show', { detail: title }));
			});
			title.scrollIntoView({ block: 'nearest' });
		});

		document.addEventListener('click', function (ev) {
			// The search list of the menu is drawn outside of it
			if (held && !menu.contains(ev.target) && !ev.target.closest('li.menuhider, .m-peek-head, .select2-container')) {
				endPreview();
			}
		});

		document.addEventListener('keydown', function (ev) {
			if (ev.key === 'Escape' && body.classList.contains(PEEK)) {
				endPreview();
			}
		});

		// Capture phase: runs before the Dolibarr handler that toggles the class
		document.addEventListener('click', function (ev) {
			if (!desktop.matches || !ev.target.closest('li.menuhider')) {
				return;
			}
			ev.preventDefault();
			endPreview();
			window.setTimeout(function () {
				saveOpen(!body.classList.contains(CLOSED));
			}, 0);
		}, true);
	}

	function setupRailTooltips(menu) {
		var tip = null;
		var owner = null;

		function hide() {
			if (tip) {
				tip.remove();
				tip = owner = null;
			}
		}

		function show(ev) {
			var link = ev.target.closest('.menu_titre .vmenu');
			var rail = document.body.classList.contains(CLOSED) && !document.body.classList.contains(PEEK);
			if (!link || link === owner || !rail || !desktop.matches) {
				return;
			}
			hide();
			owner = link;
			tip = createTip(link.textContent.trim(), menu.getBoundingClientRect().right + 8, link);
		}

		function leave(ev) {
			if (owner && !owner.contains(ev.relatedTarget)) {
				hide();
			}
		}

		menu.addEventListener('mouseover', show);
		menu.addEventListener('mouseout', leave);
		menu.addEventListener('focusin', show);
		menu.addEventListener('focusout', leave);
		menu.addEventListener('scroll', hide);
		document.addEventListener('click', hide, true);
	}

	function setupToggleTooltip(toggle) {
		var tip = null;
		var texts = TEXTS[document.documentElement.lang.slice(0, 2)] || TEXTS.en;

		function hide() {
			if (tip) {
				tip.remove();
				tip = null;
			}
		}

		function show() {
			hide();
			if (desktop.matches) {
				var closed = document.body.classList.contains(CLOSED);
				tip = createTip(closed ? texts.closed : texts.open, toggle.getBoundingClientRect().right + 8, toggle);
			}
		}

		toggle.addEventListener('mouseenter', show);
		toggle.addEventListener('mouseleave', hide);
		toggle.addEventListener('focusin', show);
		toggle.addEventListener('focusout', hide);
		// After a click the state has changed: update the text
		toggle.addEventListener('click', function () {
			window.setTimeout(show, 0);
		});
	}

	function init() {
		var toggle = document.querySelector('li.menuhider');
		var menu = document.querySelector('.side-nav');
		if (toggle && menu) {
			setupToggle(toggle, menu);
			setupRailTooltips(menu);
			setupToggleTooltip(toggle);
		}
	}

	restoreState();
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
