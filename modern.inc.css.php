<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 *	\file       htdocs/theme/modern/modern.inc.css.php
 *	\brief      Style layer of the "modern" theme. Included at the end of style.css.php (after the md base sheet).
 *
 *	All accent colors are derived from the colors set by the admin in Setup > Display > Theme
 *	(top menu background, action button color, link color), so the palette stays configurable.
 *	Default palette is indigo, see theme_vars.inc.php.
 */

// Values computed by style.css.php before this include: $butactionbg, $colorbackhmenu1 ('r,g,b'), $colortextbackhmenu ('FFFFFF' or '000000'), $colortextlink ('r,g,b')
$mAcc = trim($butactionbg);
if (strpos($mAcc, ',') !== false) {
	$mAccParts = array_slice(array_map('trim', explode(',', $mAcc)), 0, 3);
	$mAcc = 'rgb('.implode(',', $mAccParts).')';
} else {
	$mAcc = '#'.ltrim($mAcc, '#');
}
$mBar = 'rgb('.$colorbackhmenu1.')';
$mBarTxt = '#'.$colortextbackhmenu;
$mLink = 'rgb('.$colortextlink.')';
?>

/* ============================================================================== */
/* MODERN THEME                                                                   */
/* ============================================================================== */

:root {
	--m-accent: <?php print $mAcc; ?>;
	--m-accent-strong: color-mix(in srgb, var(--m-accent) 82%, black);
	--m-accent-soft: color-mix(in srgb, var(--m-accent) 9%, var(--m-surface));
	--m-accent-ring: color-mix(in srgb, var(--m-accent) 22%, transparent);
	--m-link: <?php print $mLink; ?>;
	--m-bar: <?php print $mBar; ?>;
	--m-bar-text: <?php print $mBarTxt; ?>;
	--m-bar-text-dim: color-mix(in srgb, var(--m-bar-text) 78%, transparent);
	/* Sidebar: same color as the top bar, the other shades derive from it */
	--m-side-bg: var(--m-bar);
	--m-side-card: color-mix(in srgb, var(--m-side-bg) 78%, black);
	--m-side-hover: color-mix(in srgb, var(--m-side-bg) 90%, var(--m-bar-text));
	--m-side-line: color-mix(in srgb, var(--m-side-bg) 82%, var(--m-bar-text));
	--m-side-strong: var(--m-bar-text);
	--m-side-text: var(--m-bar-text-dim);
	--m-side-icon: var(--m-bar-text-dim);
	--m-side-muted: color-mix(in srgb, var(--m-bar-text) 60%, var(--m-side-bg));
	--m-side-active: #3082ff; /* current entry */
	--m-side-active-text: #ffffff;
	--m-ink: #0f172a;
	--m-ink-2: #334155;
	--m-muted: #64748b;
	--m-border: #e2e8f0;
	--m-border-strong: #cbd5e1;
	--m-surface: #ffffff;
	--m-surface-2: #f8fafc;
	--m-surface-3: #f1f5f9;
	--m-ok-bg: #f0fdf4;
	--m-warn-bg: #fffbeb;
	--m-err-bg: #fef2f2;
	--m-danger: #b91c1c;
	--m-radius: 12px;
	--m-radius-sm: 8px;
	--m-shadow: 0 1px 2px rgba(15,23,42,.04), 0 6px 20px rgba(15,23,42,.04);
	--m-shadow-lg: 0 10px 30px rgba(15,23,42,.14);
	--inputbordercolor: var(--m-border-strong);
	--colorboxstatsborder: var(--m-border);
	--colorbacktabactive: var(--m-accent-soft);
	--colortextlink: var(--m-link);
}

<?php
// Dark mode: same switch as the base sheet (Setup > Display > Theme, or &THEME_DARKMODEENABLED=2 on the URL to force it)
if (getDolGlobalString('THEME_DARKMODEENABLED')) {
	print "/* Dark mode */\n";
	print (getDolGlobalInt('THEME_DARKMODEENABLED') != 2) ? "@media (prefers-color-scheme: dark) {\n" : "@media not print {\n";
	?>
	:root {
		--m-ink: #e5e7eb;
		--m-ink-2: #cbd5e1;
		--m-muted: #94a3b8;
		--m-border: #2c3547;
		--m-border-strong: #44516a;
		--m-surface: #1c2230;
		--m-surface-2: #232a3a;
		--m-surface-3: #2a3245;
		--m-ok-bg: #12301f;
		--m-warn-bg: #3a2c0d;
		--m-err-bg: #3b1616;
		--m-danger: #f87171;
		--m-accent-strong: color-mix(in srgb, var(--m-accent) 55%, white);
		--m-accent-soft: color-mix(in srgb, var(--m-accent) 24%, var(--m-surface));
		--m-shadow: 0 1px 2px rgba(0,0,0,.3), 0 6px 20px rgba(0,0,0,.25);
		--m-shadow-lg: 0 10px 30px rgba(0,0,0,.5);
		--colorbackbody: #131824;
		--colorbackvmenu1: var(--m-surface);
		--colorbackgrey: var(--m-surface-2);
		--colorbacktitle1: var(--m-surface-2);
		--colorbacktabcard1: var(--m-surface);
		--colorbacklinepairhover: var(--m-surface-2);
		--colorbacklineimpair1: var(--m-surface);
		--colorbacklineimpair2: var(--m-surface);
		--colorbacklinepair1: var(--m-surface);
		--colorbacklinepair2: var(--m-surface);
		--tooltipbgcolor: var(--m-surface-3);
		--colortextbackvmenu: var(--m-ink);
		--colortext: var(--m-ink);
		--colortextlink: color-mix(in srgb, var(--m-link) 55%, white);
		--inputbordercolor: var(--m-border-strong);
		--inputbackgroundcolor: var(--m-surface);
		--colorboxstatsborder: var(--m-border);
		--colorbacktabactive: var(--m-accent-soft);
	}
	body { color-scheme: dark; }
	select, .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple,
	.select2-dropdown, .select2-container--default .select2-search--dropdown .select2-search__field, .ui-dialog, .ui-widget-content,
	.ui-datepicker, .tox .tox-edit-area {
		background: var(--m-surface) !important; color: var(--m-ink) !important; border-color: var(--m-border-strong) !important;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered, .select2-results__option { color: var(--m-ink) !important; }
	.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted { background: var(--m-accent-soft) !important; color: var(--m-accent-strong) !important; }
	.select2-container--default .select2-results__option[aria-selected=true] { background: var(--m-surface-3) !important; }
	div.tabBar, table.liste, table.noborder, table.border, div.fichehalfleft, div.fichehalfright { background-color: var(--m-surface); }
	img.photoref, div.photoref { background: var(--m-surface) !important; }
	html body td, html body th, html body tr { border-bottom-color: var(--m-border) !important; border-top-color: var(--m-border) !important; }
	div.boxstats, a.boxstats, div.box, div.info-box { background: var(--m-surface); color: var(--m-ink); }
	#id-top, div.tmenudiv { border-bottom: 1px solid color-mix(in srgb, var(--m-accent) 45%, transparent); }
	span.badgeneutral, .badgeneutral, .badge-secondary, span.badge:not([class*="badge-"]), a.badge:not([class*="badge-"]) { background: var(--m-surface-3) !important; color: var(--m-ink) !important; border: 1px solid var(--m-border-strong) !important; }
	a.butAction, input.butAction, button.butAction { background-image: linear-gradient(180deg, color-mix(in srgb, var(--m-accent) 82%, white) 0%, color-mix(in srgb, var(--m-accent) 92%, white) 100%) !important; border-color: color-mix(in srgb, var(--m-accent) 70%, white) !important; }
	.button-cancel, a.butActionCancel { background: var(--m-surface-2) !important; color: var(--m-ink) !important; border-color: var(--m-border-strong) !important; }
	a.butActionRefused, span.butActionRefused, .butActionRefused { background: var(--m-surface-3) !important; color: var(--m-muted) !important; border-color: var(--m-border) !important; }
	#topmenu-login-dropdown .user-header, #topmenu-login-dropdown .dropdown-header, #topmenu-login-dropdown .user-body, #topmenu-login-dropdown .user-footer, #topmenu-login-dropdown .dropdown-menu { background: var(--m-surface) !important; color: var(--m-ink) !important; }
	#topmenu-login-dropdown .user-header p, #topmenu-login-dropdown .user-header small, #topmenu-login-dropdown .user-header span, #topmenu-login-dropdown .user-header i { color: var(--m-ink) !important; }
	#topmenu-login-dropdown .user-header { background: var(--m-surface-2) !important; }
	.nographyet { filter: invert(1); opacity: .16; }
	.nographyettext { opacity: .7; color: var(--m-muted); }
	.fa[style*="color"], .fas[style*="color"], .far[style*="color"], .fab[style*="color"], i[class*="fa-"][style*="color"], span.pictomodule, span.pictofixedwidth[class*="fa-"] { filter: brightness(2.9) saturate(.8); }
	span.opacitymedium.fa, .fa.opacitymedium, .fas.opacitymedium { filter: brightness(1.6); }
	img.ui-datepicker-trigger, img[src*="object_calendar"], img[src*="object_paypal"] { filter: invert(.88); }
	div.neutral, div.info-box-neutral { background: var(--m-surface-2) !important; color: var(--m-ink) !important; border-color: var(--m-border-strong) !important; }
	.select2-container--default .select2-selection--multiple .select2-selection__choice { background: var(--m-surface-3) !important; color: var(--m-ink) !important; border-color: var(--m-border-strong) !important; }
	.cke_chrome { filter: invert(.92) hue-rotate(180deg); border-color: var(--m-border-strong) !important; }
	.boxfooter, tr.liste_total td { background: var(--m-surface-2) !important; }
	tr.liste_total td, tr.liste_total th, tr.liste_total td * { color: var(--m-ink) !important; }
	.amount, span.amount, td.amount { color: #5eead4 !important; }
	div.error, span.error, .error { color: #fca5a5 !important; }
	div.warning, span.warning, .warning, div.warning a { color: #fcd34d !important; }
	div.ok, .ok:not(img) { color: #86efac; }
	button.dpInvisibleButtons, .dpInvisibleButtons { color: var(--m-accent-strong) !important; }
	a.classlink, div.boxfooter a, .boxtablefooter a { color: var(--m-accent-strong) !important; }
	input, select, textarea { color: var(--m-ink); }
	::placeholder { color: var(--m-muted); }
	<?php
	print "}\n";
}
?>

/* Poppins 400, 500 and 600 (SIL OFL, see fonts/LICENSE-Poppins.txt) bundled in theme/modern/fonts */
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 400; font-display: swap;
	src: url('fonts/poppins-latin-ext-400.woff2') format('woff2');
	unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C4, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 400; font-display: swap;
	src: url('fonts/poppins-latin-400.woff2') format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 500; font-display: swap;
	src: url('fonts/poppins-latin-ext-500.woff2') format('woff2');
	unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C4, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 500; font-display: swap;
	src: url('fonts/poppins-latin-500.woff2') format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 600; font-display: swap;
	src: url('fonts/poppins-latin-ext-600.woff2') format('woff2');
	unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C4, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
@font-face {
	font-family: 'Poppins'; font-style: normal; font-weight: 600; font-display: swap;
	src: url('fonts/poppins-latin-600.woff2') format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
html { -webkit-font-smoothing: antialiased; }
body, input, select, textarea, button, #id-top .tmenulabel, #id-top .mainmenuaspan {
	font-family: 'Poppins', 'Segoe UI Variable Text', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, 'Helvetica Neue', Arial, sans-serif;
	font-size: 14px;
	line-height: 1.5;
	text-rendering: optimizeLegibility;
}
body { background: var(--colorbackbody); color: var(--m-ink); letter-spacing: -0.006em; }
h1, h2, h3, .titre, .table-title, div.titre { letter-spacing: -0.015em; }
td, th { font-variant-numeric: tabular-nums; }
a, a:hover { text-decoration: none; }
::selection { background: var(--m-accent-ring); }

/* ---------- Top bar ---------- */
#id-top, div#tmenu_tooltip, .tmenudiv {
	background: var(--m-bar) !important;
	box-shadow: 0 1px 0 rgba(255,255,255,.06), 0 4px 16px rgba(15,23,42,.18);
}
[id^=mainmenutd_] { background: transparent !important; border-radius: var(--m-radius-sm); }
div.tmenucenter, a.tmenu, a.tmenusel, .tmenu a { color: var(--m-bar-text-dim) !important; font-size: 12.5px; font-weight: 500; }
[id^=mainmenutd_]:hover { background: color-mix(in srgb, var(--m-bar-text) 10%, transparent) !important; }
a.tmenu:hover, a.tmenu:hover .tmenucenter { color: var(--m-bar-text) !important; }
li.tmenusel, div.tmenusel, #mainmenutd_home.tmenusel, [id^=mainmenutd_].tmenusel {
	background: color-mix(in srgb, var(--m-accent) 55%, transparent) !important;
	box-shadow: inset 0 -2px 0 color-mix(in srgb, var(--m-accent) 60%, white);
}
li.tmenusel .tmenucenter, div.tmenusel .tmenucenter, .tmenusel a { color: var(--m-bar-text) !important; }
.login_block, .login_block a, #topmenu-login-dropdown, #topmenu-login-dropdown a { color: var(--m-bar-text) !important; }

/* ---------- Left menu ---------- */
div.vmenu, .vmenu { padding: 8px; background: transparent; }
a.vmenu, a.vsmenu, span.vmenu, span.vsmenu { color: var(--m-ink-2) !important; font-weight: 500; }
.vmenu a.vmenu, .vmenu a.vsmenu, a.vmenu, a.vsmenu { border-radius: 6px; padding: 4px 8px; transition: background .15s; }
a.vmenu:hover, a.vsmenu:hover { background: var(--m-accent-soft); color: var(--m-accent-strong) !important; }
div.blockvmenu, div.blockvmenubookmarks, div.blockvmenusearch { border-radius: var(--m-radius); }

/* ---------- Page titles ---------- */
.titre, div.titre, .table-fiche-title .titre { font-size: 20px; font-weight: 700; letter-spacing: -.02em; color: var(--m-ink); }
.refidno { color: var(--m-muted); }

/* ---------- Cards, lists, tables ---------- */
div.tabBar, table.liste, table.noborder:not(.paymenttable):not(.margintable):not(.tableforcontact), table.formdoc, div.noborder:not(.paymenttable):not(.margintable):not(.tableforcontact) {
	background: var(--m-surface);
	border: 1px solid var(--m-border) !important;
	border-radius: var(--m-radius);
	box-shadow: var(--m-shadow);
}
table.liste, table.noborder, table.formdoc { border-collapse: separate; border-spacing: 0; }
div.tabBar { padding: 18px 20px; }
tr.liste_titre th, tr.liste_titre td, th.liste_titre, td.liste_titre, tr.liste_titre_sel th {
	background: var(--m-surface-2) !important;
	color: var(--m-ink) !important;
	font-size: 13px;
	font-weight: 600;
	text-transform: none;
	letter-spacing: 0;
	border-bottom: 1px solid var(--m-border) !important;
	border-top: 0 !important;
	padding: 10px 12px;
}
tr.liste_titre a, th.liste_titre a { color: var(--m-ink) !important; font-weight: 600 !important; }
th.liste_titre_sel, th.liste_titre_sel a, tr.liste_titre th.liste_titre_sel a { font-weight: 700 !important; }
tr.liste_titre_filter td { background: var(--m-surface) !important; }
tr.oddeven td, tr.oddeven th, tr.even td, tr.odd td { border-bottom: 1px solid var(--m-surface-3) !important; padding-top: 11px; padding-bottom: 11px; }
tr.oddeven:hover td { background: var(--m-surface-2) !important; }
tr.oddeven:hover td:first-child { box-shadow: inset 2px 0 0 var(--m-accent); }
td.right, td.nowrap, .amount, .nowraponall { font-variant-numeric: tabular-nums; }
td.titlefield, .titlefield, .titlefieldcreate { color: var(--m-muted); font-weight: 500; font-size: 12.5px; }
td.valuefield, .valuefield { color: var(--m-ink); font-weight: 500; }
td.fieldrequired, .fieldrequired { color: var(--m-ink) !important; font-weight: 600; }
table.border td, table.tagtable td { padding-top: 6px; padding-bottom: 6px; }

/* ---------- Tabs ---------- */
div.tabs { border-bottom: 1px solid var(--m-border); margin-bottom: 14px; padding: 0 0 0 2px; }
div.tabs .inline-block.tabsElem { margin-right: 4px; }
a.tab, a.tab:link, a.tab:visited {
	background: transparent !important;
	border: 0 !important;
	border-radius: 0 !important;
	color: var(--m-muted) !important;
	font-weight: 500;
	padding: 9px 14px !important;
}
a.tab:hover { color: var(--m-ink) !important; background: transparent !important; }
a.tab#active { color: var(--m-accent) !important; border-bottom: 2px solid var(--m-accent) !important; }

/* ---------- Inputs ---------- */
input:not([type=checkbox]):not([type=radio]):not([type=submit]):not([type=button]):not([type=file]), select, textarea {
	border: 1px solid var(--m-border-strong) !important;
	border-radius: var(--m-radius-sm) !important;
	padding: 7px 10px;
	min-height: 34px;
	background: var(--m-surface);
	box-shadow: 0 1px 1px rgba(15,23,42,.03);
	transition: border-color .15s, box-shadow .15s;
}
tr.liste_titre_filter input, tr.liste_titre_filter select, tr.liste_titre_filter .select2-selection { min-height: 28px !important; padding: 3px 8px; font-size: 12.5px; }
input:focus, select:focus, textarea:focus {
	outline: none !important;
	border-color: var(--m-accent) !important;
	box-shadow: 0 0 0 3px var(--m-accent-ring) !important;
}
input[type=checkbox], input[type=radio] { accent-color: var(--m-accent); }
.select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple { border-radius: var(--m-radius-sm) !important; border-color: var(--m-border-strong) !important; }
.select2-container--default .select2-results__option--highlighted[aria-selected] { background: var(--m-accent) !important; }

/* ---------- Buttons ---------- */
.butAction, a.butAction, input.butAction, span.butAction, a.butActionDelete, span.butActionDelete, a.butActionRefused, span.butActionRefused,
input.button, input[type=submit], input[type=button], button.button, a.button {
	border-radius: var(--m-radius-sm) !important;
	font-weight: 500;
	font-size: 13.5px;
	text-transform: none !important;
	letter-spacing: 0;
	padding: 8px 14px !important;
	border: 1px solid transparent;
	box-shadow: var(--m-shadow);
	transition: transform .1s, box-shadow .15s, background .15s, filter .15s;
}
.butAction:not(.butActionDelete):not(.butActionRefused), input.button-save, input[type=submit].button:not(.button-cancel), input.button:not(.button-cancel) {
	background: linear-gradient(180deg, color-mix(in srgb, var(--m-accent) 88%, white) 0%, var(--m-accent) 100%) !important;
	border-color: var(--m-accent-strong) !important;
	color: #fff !important;
	box-shadow: 0 1px 2px color-mix(in srgb, var(--m-accent-strong) 40%, transparent), inset 0 1px 0 rgba(255,255,255,.18);
}
.butAction:hover:not(.butActionDelete):not(.butActionRefused), input[type=submit]:hover { box-shadow: var(--m-shadow-lg); transform: translateY(-1px); filter: brightness(1.06); }
input[type=submit].button-cancel, input.button.button-cancel, input.button-cancel, a.button-cancel, .button-cancel {
	background: var(--m-surface) !important;
	color: var(--m-ink-2) !important;
	border: 1px solid var(--m-border-strong) !important;
	box-shadow: none;
}
.button-cancel:hover { background: var(--m-surface-3) !important; transform: none; filter: none; }
.butAction.butActionDelete, a.butActionDelete, span.butActionDelete, input.butActionDelete {
	background: var(--m-surface) !important;
	color: var(--m-danger) !important;
	border: 1px solid #fecaca !important;
	box-shadow: none;
}
.butAction.butActionDelete:hover, a.butActionDelete:hover, span.butActionDelete:hover { background: var(--m-err-bg) !important; transform: none; filter: none; }
.butActionRefused, a.butActionRefused, span.butActionRefused { background: var(--m-surface-3) !important; color: #94a3b8 !important; border: 1px solid var(--m-border) !important; box-shadow: none; }
.center > .button + .button, .center > input + input { margin-left: 8px; }

/* ---------- Badges and statuses ---------- */
span.badge, .badge { border-radius: 999px !important; padding: 2px 10px; font-weight: 500; }
span.badge-status, .badge-status { border-radius: 999px !important; font-weight: 600; font-size: 11.5px; padding: 3px 10px; }

/* ---------- Dashboard / info boxes ---------- */
.info-box, div.box, .boxstats, .box { border-radius: var(--m-radius); }
.info-box, .boxstats, .boxstatscontent { background: var(--m-surface); box-shadow: var(--m-shadow); border: 1px solid var(--m-border); }

/* ---------- Popups, dropdowns, tooltips ---------- */
.ui-dialog, .select2-dropdown, .dropdown-menu, div.dropdown-content, .ui-menu, #topmenu-login-dropdown .dropdown-menu {
	border-radius: var(--m-radius) !important;
	box-shadow: var(--m-shadow-lg) !important;
	border: 1px solid var(--m-border) !important;
}
.ui-dialog .ui-dialog-titlebar { background: var(--m-surface-2); border-bottom: 1px solid var(--m-border); border-radius: var(--m-radius) var(--m-radius) 0 0; }
.ui-widget-overlay { background: rgba(15,23,42,.45) !important; opacity: 1 !important; }

/* ---------- Pagination ---------- */
.pagination .page-link, ul.pagination li a { border-radius: 6px; }
.pagination li.active a, .pagination li.active .page-link { background: var(--m-accent) !important; color: #fff !important; }

/* ---------- Scrollbars ---------- */
::-webkit-scrollbar-thumb { background: var(--m-border-strong); border-radius: 8px; }

<?php include __DIR__."/components.inc.css.php"; ?>
