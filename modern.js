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

	var KEY = 'modern_leftmenu_href';
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
	// (menu parameters may be absent from the current address). More matching parameters = better.
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
			} else if (!((k === 'mainmenu' || k === 'leftmenu') && cur === null)) {
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

	function init() {
		var links = Array.prototype.slice.call(document.querySelectorAll('div.vmenu a.vsmenu[href]'));
		var best = null;
		var bestScore = 0;
		links.forEach(function (a) {
			var s = score(a);
			if (s > bestScore) {
				best = a;
				bestScore = s;
			}
		});

		try {
			if (best) {
				sessionStorage.setItem(KEY, best.getAttribute('href'));
			} else {
				var saved = sessionStorage.getItem(KEY);
				best = links.filter(function (a) { return a.getAttribute('href') === saved; })[0] || null;
			}
		} catch (e) { /* storage blocked: keep the address match only */ }

		if (best) {
			mark(best);
		}

		// Remember the clicked link before the page reloads
		links.forEach(function (a) {
			a.addEventListener('click', function () {
				try { sessionStorage.setItem(KEY, a.getAttribute('href')); } catch (e) { /* ignore */ }
			});
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
