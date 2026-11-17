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
	--m-accent-soft: color-mix(in srgb, var(--m-accent) 9%, white);
	--m-accent-ring: color-mix(in srgb, var(--m-accent) 22%, transparent);
	--m-link: <?php print $mLink; ?>;
	--m-bar: <?php print $mBar; ?>;
	--m-bar-text: <?php print $mBarTxt; ?>;
	--m-bar-text-dim: color-mix(in srgb, var(--m-bar-text) 78%, transparent);
	--m-ink: #0f172a;
	--m-ink-2: #334155;
	--m-muted: #64748b;
	--m-border: #e2e8f0;
	--m-border-strong: #cbd5e1;
	--m-surface: #ffffff;
	--m-surface-2: #f8fafc;
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

/* Inter (variable, SIL OFL) bundled in theme/modern/fonts */
@font-face {
	font-family: 'Inter'; font-style: normal; font-weight: 100 900; font-display: swap;
	src: url('fonts/inter-latin-ext-wght-normal.woff2') format('woff2-variations'), url('fonts/inter-latin-ext-wght-normal.woff2') format('woff2');
	unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
@font-face {
	font-family: 'Inter'; font-style: normal; font-weight: 100 900; font-display: swap;
	src: url('fonts/inter-latin-wght-normal.woff2') format('woff2-variations'), url('fonts/inter-latin-wght-normal.woff2') format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
html { -webkit-font-smoothing: antialiased; }
body, input, select, textarea, button {
	font-family: 'Inter', 'Segoe UI Variable Text', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, 'Helvetica Neue', Arial, sans-serif;
	font-size: 14px;
	line-height: 1.5;
	font-feature-settings: 'cv11', 'ss01', 'calt';
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
table.liste, table.noborder, table.formdoc { border-collapse: separate; border-spacing: 0; overflow: hidden; }
div.tabBar { padding: 18px 20px; }
tr.liste_titre th, tr.liste_titre td, th.liste_titre, td.liste_titre, tr.liste_titre_sel th {
	background: var(--m-surface-2) !important;
	color: var(--m-muted) !important;
	font-size: 12px;
	font-weight: 600;
	text-transform: uppercase;
	letter-spacing: .04em;
	border-bottom: 1px solid var(--m-border) !important;
	border-top: 0 !important;
	padding: 10px 12px;
}
tr.liste_titre a { color: var(--m-muted) !important; }
tr.liste_titre_filter td { background: var(--m-surface) !important; }
tr.oddeven td, tr.oddeven th, tr.even td, tr.odd td { border-bottom: 1px solid #f1f5f9 !important; padding-top: 11px; padding-bottom: 11px; }
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
	background: #fff;
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
	background: #fff !important;
	color: var(--m-ink-2) !important;
	border: 1px solid var(--m-border-strong) !important;
	box-shadow: none;
}
.button-cancel:hover { background: #f1f5f9 !important; transform: none; filter: none; }
.butAction.butActionDelete, a.butActionDelete, span.butActionDelete, input.butActionDelete {
	background: #fff !important;
	color: var(--m-danger) !important;
	border: 1px solid #fecaca !important;
	box-shadow: none;
}
.butAction.butActionDelete:hover, a.butActionDelete:hover, span.butActionDelete:hover { background: #fef2f2 !important; transform: none; filter: none; }
.butActionRefused, a.butActionRefused, span.butActionRefused { background: #f1f5f9 !important; color: #94a3b8 !important; border: 1px solid var(--m-border) !important; box-shadow: none; }
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
