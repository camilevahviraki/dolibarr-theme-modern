<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 *	\file       htdocs/theme/modern/components.inc.css.php
 *	\brief      Component styles of the "modern" theme (tabs, tooltips, notifications, dialogs, message boxes, tables).
 *	            Included by modern.inc.css.php. Uses the --m-* variables defined there.
 */
?>

/* ============================================================================== */
/* COMPONENTS                                                                     */
/* ============================================================================== */

/* ---------- Tabs (real markup uses .tabactive / .tabunactive) ---------- */
div.tabs { display: flex; flex-wrap: wrap; align-items: flex-end; gap: 2px; border-bottom: 1px solid var(--m-border); margin: 0 0 16px; padding: 0; }
div.tabs div.tabsElem { margin: 0; }
div.tabs a.tab, a.tab.tabunactive, a.tabunactive, a.tab.tabactive, a.tabactive, a.tab:link, a.tab:visited, span.tabspan {
	display: inline-block;
	background: transparent !important;
	border: 0 !important;
	border-bottom: 2px solid transparent !important;
	border-radius: 0 !important;
	box-shadow: none !important;
	margin: 0 !important;
	padding: 10px 14px !important;
	color: var(--m-muted) !important;
	font-weight: 500;
	transition: color .15s, border-color .15s;
}
div.tabs a.tab:hover, a.tabunactive:hover { color: var(--m-ink) !important; border-bottom-color: var(--m-border-strong) !important; }
div.tabs a.tabactive, div.tabs a.tab.tabactive, a.tab#active, .tabactive {
	color: var(--m-accent) !important;
	border-bottom: 2px solid var(--m-accent) !important;
	background: transparent !important;
}
div.tabs a.tab .badge, div.tabs a.tab .badge-status { margin-left: 6px; }
div.tabsAction { gap: 8px; margin: 18px 0 8px; }

/* ---------- Tooltips and info popups ---------- */
div.ui-tooltip, div.ui-tooltip.mytooltip {
	background: #fff !important;
	color: var(--m-ink) !important;
	border: 1px solid var(--m-border) !important;
	border-radius: var(--m-radius) !important;
	box-shadow: var(--m-shadow-lg) !important;
	padding: 14px 16px !important;
	font-stretch: normal;
	font-size: 13px;
	line-height: 1.55;
	min-width: 0;
}
div.ui-tooltip.mytooltip { min-width: 320px; }
div.ui-tooltip hr { border: 0; border-top: 1px solid var(--m-border); margin: 8px 0; }
div.ui-tooltip b, div.ui-tooltip strong { font-weight: 600; }

/* ---------- Notifications (jnotify toasts) ---------- */
.jnotify-container .jnotify-notification { margin-bottom: 8px; }
.jnotify-container .jnotify-notification .jnotify-background, div.jnotify-background {
	background: #fff !important;
	border: 1px solid var(--m-border) !important;
	border-left: 4px solid #16a34a !important;
	border-radius: var(--m-radius) !important;
	box-shadow: var(--m-shadow-lg) !important;
	opacity: 1 !important;
}
.jnotify-container .jnotify-notification .jnotify-message { color: var(--m-ink) !important; font-size: 13.5px; font-weight: 500; padding: 12px 16px; }
.jnotify-container .jnotify-notification-warning .jnotify-background { border-left-color: #d97706 !important; }
.jnotify-container .jnotify-notification-warning .jnotify-message, .jnotify-container .jnotify-notification-warning .jnotify-close { color: var(--m-ink) !important; }
.jnotify-container .jnotify-notification-error .jnotify-background { border-left-color: #dc2626 !important; }
.jnotify-container .jnotify-notification-error .jnotify-message, .jnotify-container .jnotify-notification-error .jnotify-close { color: var(--m-ink) !important; }
.jnotify-container .jnotify-close { color: var(--m-muted) !important; }

/* ---------- Inline message boxes ---------- */
div.ok, div.info, div.warning, div.error, div.green, div.red {
	border-radius: var(--m-radius-sm);
	border: 1px solid var(--m-border);
	border-left-width: 4px;
	background: #fff;
	color: var(--m-ink);
	padding: 10px 14px;
	box-shadow: none;
}
div.ok { border-left-color: #16a34a; background: #f0fdf4; }
div.info { border-left-color: var(--m-accent); background: var(--m-accent-soft); }
div.warning { border-left-color: #d97706; background: #fffbeb; }
div.error, div.red { border-left-color: #dc2626; background: #fef2f2; }

/* ---------- Dialogs ---------- */
.ui-dialog.ui-widget.ui-widget-content { border: 1px solid var(--m-border); border-radius: var(--m-radius); box-shadow: var(--m-shadow-lg); padding: 0; overflow: hidden; }
.ui-dialog .ui-dialog-titlebar.ui-widget-header { background: var(--m-surface-2) !important; border: 0; border-bottom: 1px solid var(--m-border); border-radius: 0; color: var(--m-ink); font-weight: 600; padding: 14px 16px !important; }
.ui-dialog .ui-dialog-content { padding: 16px !important; }
.ui-dialog .ui-dialog-buttonpane { border-top: 1px solid var(--m-border); background: var(--m-surface-2); padding: 12px 16px; margin: 0; }
div#dialogforpopup { background-color: var(--m-surface) !important; }
.ui-dialog .ui-dialog-buttonpane button { border-radius: var(--m-radius-sm); font-weight: 500; }
.ui-dialog .ui-dialog-buttonpane button:first-child { background: var(--m-accent) !important; color: #fff !important; border-color: var(--m-accent-strong); }

/* ---------- Field tables (card pages), key/value ---------- */
table.border, table.bordernooddeven, table.table-border, .table-border {
	background: transparent;
	border: 0 !important;
	border-collapse: collapse;
	box-shadow: none !important;
}
table.border td, table.bordernooddeven td, .table-border-col, .table-key-border-col, .table-val-border-col {
	border: 0 !important;
	border-bottom: 1px solid #f1f5f9 !important;
	padding: 9px 8px !important;
}
table.border tr:last-child td { border-bottom: 0 !important; }
table.border td:first-child, .table-key-border-col { color: var(--m-muted); font-size: 12.5px; font-weight: 500; }
div.fichecenter div.underbanner, div.underbanner { border-bottom: 1px solid var(--m-border) !important; border-top: 1px solid var(--m-border) !important; }

/* ---------- Section headings above tables ---------- */
table.table-fiche-title, div.table-fiche-title { margin-bottom: 8px; }
table.table-fiche-title .titre, div.table-fiche-title .titre { font-size: 15px; font-weight: 600; letter-spacing: -.01em; }

/* ---------- Totals and group rows ---------- */
tr.liste_total td, tr.liste_total th, tr.liste_titre_sel td { background: var(--m-surface-2) !important; font-weight: 600; border-top: 1px solid var(--m-border) !important; }
tr.trforbreak td, tr.trforbreak th { background: var(--m-accent-soft) !important; color: var(--m-accent-strong); }
tr.pair td, tr.impair td, tr.oddeven td { background: var(--m-surface); }
table.dataTable thead th { background: var(--m-surface-2); border-bottom: 1px solid var(--m-border); }

/* ---------- Dashboard widgets and boxes ---------- */
div.box, .boxstats, .boxstatscontent, div.boxstatsindicator { border-radius: var(--m-radius); }
.boxstats { background: var(--m-surface); border: 1px solid var(--m-border); box-shadow: var(--m-shadow); transition: box-shadow .15s, transform .15s; }
.boxstats:hover { box-shadow: var(--m-shadow-lg); transform: translateY(-1px); }

/* ---------- Pagination ---------- */
div.pagination li > a, div.pagination li > span.inactive, ul.pagination li > a { border-radius: 6px !important; border: 1px solid var(--m-border); padding: 4px 9px; color: var(--m-ink-2); background: #fff; }
div.pagination li a:hover { background: var(--m-accent-soft); color: var(--m-accent-strong); border-color: var(--m-accent-ring); }
div.pagination li.active a, div.pagination li .active a { background: var(--m-accent) !important; border-color: var(--m-accent) !important; color: #fff !important; }

/* ---------- Left menu groups ---------- */
div.blockvmenusearchphone, div.blockvmenuimpair, div.blockvmenupair, div.blockvmenubookmarks, div.blockvmenusearch, div.blockvmenuend {
	background: var(--m-surface);
	border: 1px solid var(--m-border);
	border-radius: var(--m-radius);
	margin-bottom: 10px;
	padding: 6px 4px;
	box-shadow: none;
}
.menu_titre { text-transform: uppercase; font-size: 11px; letter-spacing: .06em; color: var(--m-muted) !important; font-weight: 600; }
a.vsmenu.vmenusel, a.vmenu.vmenusel, .vmenusel { background: var(--m-accent-soft); color: var(--m-accent-strong) !important; border-radius: 6px; }

/* ---------- Dropdowns ---------- */
.dropdown-menu, div.dropdown-content, #topmenu-login-dropdown .dropdown-menu { background: #fff; color: var(--m-ink); }
.dropdown-menu a, .dropdown-content a { border-radius: 6px; }
.dropdown-menu a:hover, .dropdown-content a:hover { background: var(--m-accent-soft) !important; }

/* ---------- Misc ---------- */
hr { border: 0; border-top: 1px solid var(--m-border); }
.opacitymedium { color: var(--m-muted); opacity: 1; }

/* Tabs: the state class is on the wrapper div (div.tab.tabactive > a.tab) */
div.tabs div.tab, div.tabs div.tabactive, div.tabs div.tabunactive, div.tabs .tabsElem > div {
	background: transparent !important;
	border: 0 !important;
	border-radius: 0 !important;
	box-shadow: none !important;
	margin: 0 !important;
	padding: 0 !important;
}
div.tabs div.tabactive > a.tab, div.tabs div.tabsElemActive a.tab { color: var(--m-accent) !important; border-bottom: 2px solid var(--m-accent) !important; }

/* ============================================================================== */
/* CONSISTENT CONTROL HEIGHT (inputs, selects, select2, buttons share one height) */
/* ============================================================================== */
:root { --m-control-h: 36px; --m-control-h-sm: 30px; }

input:not([type=checkbox]):not([type=radio]):not([type=file]):not([type=range]):not([type=color]):not([type=hidden]):not([type=image]),
select:not([multiple]):not([size]),
.select2-container--default .select2-selection--single {
	box-sizing: border-box;
	height: var(--m-control-h) !important;
	min-height: var(--m-control-h) !important;
	line-height: 1.2;
}
input[type=submit], input[type=button], input.button, button.button, a.button, input.button.small, .button.small {
	box-sizing: border-box;
	height: var(--m-control-h);
	min-height: var(--m-control-h);
	padding: 0 16px !important;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	line-height: 1;
	vertical-align: middle;
}
.select2-container { vertical-align: middle; }
.select2-container--default .select2-selection--single { display: flex; align-items: center; padding: 0 !important; }
.select2-container--default .select2-selection--single .select2-selection__rendered { line-height: normal !important; padding: 0 28px 0 10px !important; flex: 1; }
.select2-container--default .select2-selection--single .select2-selection__arrow { height: 100% !important; top: 0 !important; right: 4px; }
.select2-container--default .select2-selection--multiple { min-height: var(--m-control-h); box-sizing: border-box; }

/* Filter bars: keep everything vertically centred on the same line */
.divfilteralone, .divsearchfield { display: inline-flex; align-items: center; gap: 8px; vertical-align: middle; }
.divsearchfield { padding-top: 6px !important; padding-bottom: 6px !important; }

/* Filter row inside list tables: a denser, still uniform height */
tr.liste_titre_filter input:not([type=checkbox]):not([type=radio]):not([type=submit]):not([type=button]):not([type=hidden]),
tr.liste_titre_filter select:not([multiple]),
tr.liste_titre_filter .select2-container--default .select2-selection--single {
	height: var(--m-control-h-sm) !important;
	min-height: var(--m-control-h-sm) !important;
	padding-top: 0; padding-bottom: 0;
	font-size: 12.5px;
}

/* Narrow selects (page size "limit", small combos): keep the text visible */
.select2-container--default .select2-selection--single .select2-selection__rendered { padding: 0 22px 0 10px !important; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.select2-container.limit .select2-selection--single, .select2-container .select2-selection--single.limit { min-width: 56px; }
.select2-container.limit .select2-selection__rendered, .select2-selection--single.limit .select2-selection__rendered { padding: 0 18px 0 8px !important; }
.select2-container--default .select2-selection--single .select2-selection__arrow { right: 2px; width: 18px; }

/* Multi selects (filters): same height as their neighbours */
tr.liste_titre_filter .select2-container--default .select2-selection--multiple,
.divfilteralone .select2-container--default .select2-selection--multiple {
	height: var(--m-control-h-sm); min-height: var(--m-control-h-sm); overflow: hidden; padding: 0 6px;
	display: flex; align-items: center;
}
.divfilteralone .select2-container--default .select2-selection--multiple { height: var(--m-control-h); min-height: var(--m-control-h); }
.select2-container--default .select2-selection--multiple .select2-search__field { height: 22px !important; min-height: 0 !important; margin: 0; border: 0 !important; box-shadow: none !important; }
.select2-container--default .select2-selection--multiple .select2-selection__rendered { display: flex; align-items: center; flex-wrap: nowrap; padding: 0; }

/* Specificity fixes (must beat the shared control-height rule above) */
html body tr.liste_titre_filter td input:not([type=checkbox]):not([type=radio]):not([type=file]):not([type=range]):not([type=color]):not([type=hidden]):not([type=image]):not([type=submit]),
html body tr.liste_titre_filter td select:not([multiple]):not([size]),
html body tr.liste_titre_filter td .select2-container--default .select2-selection--single {
	height: var(--m-control-h-sm) !important;
	min-height: var(--m-control-h-sm) !important;
}
html body tr.liste_titre_filter td .select2-container--default .select2-selection--multiple {
	height: var(--m-control-h-sm) !important;
	min-height: var(--m-control-h-sm) !important;
	max-height: var(--m-control-h-sm) !important;
	overflow: hidden !important;
}
html body .select2-container.limit { height: var(--m-control-h); width: auto !important; min-width: 56px; }
html body .select2-container.limit .select2-selection--single { width: 100% !important; }

/* select2 keeps the native <select> visually hidden: never size or style it */
html body select.select2-hidden-accessible {
	height: 1px !important; min-height: 0 !important; width: 1px !important;
	padding: 0 !important; margin: -1px !important; border: 0 !important; box-shadow: none !important;
}

/* select2 wrapper span must not add inline line-box space around the selection */
.select2-container > .selection { display: block; width: 100%; }
html body .select2-container--default .select2-selection--single { margin: 0 !important; }

/* ============================================================================== */
/* LAYOUT: sidebar, content spacing, card columns                                 */
/* ============================================================================== */

/* ---------- Sidebar ---------- */
.side-nav {
	background: var(--m-surface) !important;
	border-right: 1px solid var(--m-border);
	box-shadow: none !important;
}
#id-left { padding-top: 14px; }
div.vmenu { padding: 0 10px; }
div.vmenu .menu_contenu, div.vmenu .menu_titre { padding: 0; }
div.vmenu a.vsmenu, div.vmenu a.vmenu, div.vmenu span.vsmenu, div.vmenu span.vmenu {
	display: block;
	padding: 7px 10px;
	margin: 1px 0;
	border-radius: 8px;
	color: var(--m-ink-2) !important;
	font-size: 13.5px;
	font-weight: 500;
	line-height: 1.35;
}
div.vmenu a.vsmenu:hover, div.vmenu a.vmenu:hover { background: var(--m-accent-soft); color: var(--m-accent-strong) !important; }
div.vmenu .menu_contenu { margin: 0; }
div.vmenu .menu_titre { padding: 16px 10px 6px; }
div.vmenu a.vsmenu.vmenusel, div.vmenu a.vmenu.vmenusel { background: var(--m-accent-soft); color: var(--m-accent-strong) !important; }
.blockvmenusearch input, .blockvmenusearch .searchform input { width: 100%; }
div.blockvmenusearch, div.blockvmenuimpair, div.blockvmenupair, div.blockvmenubookmarks, div.blockvmenuend, div.blockvmenusearchphone {
	background: transparent !important;
	border: 0 !important;
	padding: 0 !important;
	margin-bottom: 8px;
}
.help, div.help { color: var(--m-muted); }

/* ---------- Content area ---------- */
#id-right { padding-top: 18px; }
div.fiche { padding-left: 24px; padding-right: 24px; }
body.sidebar-collapse div.fiche { padding-left: 24px; padding-right: 24px; }

/* ---------- Card columns: labels inside editable rows must not get extra padding ---------- */
table.border table.nobordernopadding td,
table.border tr td table.nobordernopadding tr td,
table.bordernooddeven table.nobordernopadding td {
	padding: 0 !important;
	border: 0 !important;
	color: inherit;
}
div.fichehalfleft, div.fichehalfright { padding-top: 4px; }
div.fichehalfleft table.border, div.fichehalfright table.border { width: 100%; }
div.fichehalfright table.border td:first-child, div.fichehalfleft table.border td:first-child { vertical-align: middle; }
table.border td.titlefield, table.border td.titlefieldcreate { width: 40%; }

/* Main container breathing room */
div.fiche > table.table-fiche-title:first-child { margin-top: 4px; }

/* Menu links are followed by a br in the markup: hide it so spacing comes from padding only */
div.vmenu .menu_contenu > br, div.vmenu div.menu_titre > br { display: none; }
div.vmenu .menu_contenu { padding: 0 !important; overflow: visible; }
div.vmenu .menu_titre { margin-top: 6px; }
div.vmenu .menu_titre a.vmenu, div.vmenu .menu_titre span.vmenu {
	padding: 6px 10px; font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--m-muted) !important; background: transparent !important;
}
.side-nav { width: 240px; }

/* ---------- Disabled / refused actions: normal arrow cursor, never the pointer hand ---------- */
.butActionRefused, a.butActionRefused, span.butActionRefused, .butAction.butActionRefused,
.butActionDelete.butActionRefused, .disabled, .disabled *, a.disabled, span.disabled,
button:disabled, button[disabled], input:disabled, input[disabled], select:disabled, select[disabled], textarea:disabled,
input[type=submit]:disabled, input[type=button]:disabled, input.button:disabled, input.button[disabled],
a.button.disabled, .button.disabled, .button[disabled], [aria-disabled=true], [aria-disabled=true] *,
.ui-state-disabled, .ui-state-disabled *, .select2-container--disabled, .select2-container--disabled *,
.select2-results__option[aria-disabled=true], tr.disabled, .opacitymedium.disabled {
	cursor: default !important;
}
.butActionRefused:hover, a.butActionRefused:hover, span.butActionRefused:hover { transform: none !important; box-shadow: none !important; filter: none !important; }

/* Sidebar rows: no stray line boxes around the links */
div.vmenu .menu_contenu { line-height: 0; height: auto !important; }
div.vmenu .menu_contenu > a { line-height: 1.35; }

/* ============================================================================== */
/* CHECKBOXES AND RADIOS                                                          */
/* ============================================================================== */
input[type=checkbox], input[type=radio] {
	-webkit-appearance: none;
	appearance: none;
	box-sizing: border-box;
	width: 18px;
	height: 18px;
	min-width: 18px;
	min-height: 18px;
	margin: 0 6px 0 0;
	padding: 0;
	vertical-align: middle;
	position: relative;
	cursor: pointer;
	background: #fff;
	border: 1px solid var(--m-border-strong) !important;
	box-shadow: none !important;
	transition: background .12s, border-color .12s, box-shadow .12s;
}
input[type=checkbox] { border-radius: 6px !important; }
input[type=radio] { border-radius: 50% !important; }
input[type=checkbox]:hover, input[type=radio]:hover { border-color: var(--m-accent) !important; }
input[type=checkbox]:focus-visible, input[type=radio]:focus-visible { outline: none; box-shadow: 0 0 0 3px var(--m-accent-ring) !important; }
input[type=checkbox]:checked, input[type=checkbox]:indeterminate {
	background-color: var(--m-accent);
	border-color: var(--m-accent) !important;
}
input[type=checkbox]:checked {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M3.5 8.5l3 3 6-6.5' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	background-size: 12px 12px;
	background-position: center;
	background-repeat: no-repeat;
}
input[type=checkbox]:indeterminate {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M4 8h8' stroke='%23fff' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
	background-size: 12px 12px;
	background-position: center;
	background-repeat: no-repeat;
}
input[type=radio]:checked {
	border-color: var(--m-accent) !important;
	background: radial-gradient(circle at center, var(--m-accent) 0 4px, #fff 4.5px);
}
input[type=checkbox]:disabled, input[type=radio]:disabled { background-color: #f1f5f9; border-color: var(--m-border) !important; opacity: .7; cursor: default !important; }
input[type=checkbox]:checked:disabled { background-color: #a5b4fc; border-color: #a5b4fc !important; }
/* checkbox in list tables (select all / select row): slightly smaller, centred */
td.nowrap input[type=checkbox], th input[type=checkbox], td.center input[type=checkbox], input.checkforselect, input.checkforaction { margin: 0; vertical-align: middle; }

/* ============================================================================== */
/* USER DROPDOWN (top right): dark text on a light panel, readable footer buttons */
/* ============================================================================== */
#topmenu-login-dropdown .dropdown-menu, #topmenu-login-dropdown .dropdown-menu a, #topmenu-login-dropdown .dropdown-menu span,
#topmenu-login-dropdown .dropdown-menu div, #topmenu-login-dropdown .dropdown-menu .login_block_user {
	color: var(--m-ink) !important;
}
#topmenu-login-dropdown .dropdown-menu { background: #fff; padding: 0; overflow: hidden; }
#topmenu-login-dropdown .dropdown-header, #topmenu-login-dropdown .user-body { background: #fff; padding: 14px 16px; }
#topmenu-login-dropdown .user-body a { color: var(--m-muted) !important; font-size: 12.5px; }
#topmenu-login-dropdown .user-body a:hover { color: var(--m-accent) !important; }
.user-footer { background: var(--m-surface-2) !important; border-top: 1px solid var(--m-border); padding: 12px 14px !important; display: flex; gap: 8px; align-items: center; }
.user-footer .clearboth { display: none; }
.user-footer .pull-left, .user-footer .pull-right { float: none !important; }
.user-footer .pull-right { margin-left: auto; }
a.button-top-menu-dropdown, .user-footer a {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	height: 34px;
	padding: 0 12px !important;
	margin: 0 !important;
	background: #fff !important;
	color: var(--m-ink-2) !important;
	border: 1px solid var(--m-border-strong) !important;
	border-radius: var(--m-radius-sm) !important;
	box-shadow: none !important;
	font-size: 13px;
	font-weight: 500;
	text-decoration: none;
	transition: background .15s, color .15s, border-color .15s;
}
a.button-top-menu-dropdown:hover, .user-footer a:hover { background: var(--m-accent-soft) !important; color: var(--m-accent-strong) !important; border-color: var(--m-accent-ring) !important; }
.user-footer .pull-right a, a.button-top-menu-dropdown[href*=logout] { color: var(--m-danger) !important; }
.user-footer .pull-right a:hover { background: #fef2f2 !important; border-color: #fecaca !important; color: var(--m-danger) !important; }
.user-footer i, .user-footer span.fa, .user-footer span.far { color: inherit !important; }

/* User dropdown: centred links and centred buttons */
#topmenu-login-dropdown .user-body, #topmenu-login-dropdown .dropdown-header { text-align: center; }
#topmenu-login-dropdown .user-body a { display: block; text-align: center; }
#topmenu-login-dropdown .user-body a { padding: 6px 0; }
.user-footer { justify-content: center !important; }
.user-footer .pull-left, .user-footer .pull-right { flex: 1 1 0; display: flex; justify-content: center; margin: 0 !important; }
.user-footer .pull-left:nth-of-type(2) { flex: 0 0 auto; }
a.button-top-menu-dropdown, .user-footer a { justify-content: center !important; text-align: center; min-width: 40px; width: 100%; }
.user-footer .pull-left:nth-of-type(2) a { width: 40px; padding: 0 !important; }
.user-footer a span, .user-footer a i { display: inline-flex; align-items: center; margin: 0 !important; }
#topmenu-login-dropdown .user-body > span, #topmenu-login-dropdown .user-body > span > span { display: block; text-align: center !important; padding: 6px 0; }

/* User dropdown: vertical centring */
.user-footer { align-items: center !important; }
.user-footer .pull-left, .user-footer .pull-right { align-items: center; height: 36px; }
a.button-top-menu-dropdown, .user-footer a {
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	height: 36px !important;
	line-height: 1 !important;
	padding-top: 0 !important;
	padding-bottom: 0 !important;
	vertical-align: middle;
}
.user-footer a > *, .user-footer a i, .user-footer a span, .user-footer a .fa, .user-footer a .far, .user-footer a .fas {
	display: inline-flex !important;
	align-items: center;
	line-height: 1 !important;
	margin: 0 !important;
	padding: 0 !important;
	vertical-align: middle;
	height: auto;
}
.user-footer a .hideonsmartphone { padding-left: 6px !important; }
#topmenu-login-dropdown .user-body > span, #topmenu-login-dropdown .user-body > span > span {
	display: flex !important;
	align-items: center;
	justify-content: center;
	min-height: 38px;
	padding: 0 !important;
	line-height: 1.2;
}
#topmenu-login-dropdown .user-body > span, #topmenu-login-dropdown .user-body > span > span { gap: 6px; }

/* ============================================================================== */
/* SIDEBAR: clear contrast, visible parent/child hierarchy                        */
/* ============================================================================== */

/* Parent (group title): dark, bold, with an accent marker */
div.vmenu div.menu_titre { margin-top: 14px; padding: 0; }
div.vmenu div.menu_titre a.vmenu, div.vmenu div.menu_titre span.vmenu {
	display: flex !important;
	align-items: center;
	gap: 8px;
	padding: 8px 10px !important;
	background: transparent !important;
	color: var(--m-ink) !important;
	font-size: 13px !important;
	font-weight: 700 !important;
	letter-spacing: .02em;
	text-transform: none !important;
	border-radius: 8px;
}
div.vmenu div.menu_titre a.vmenu:hover { background: var(--m-surface-2) !important; color: var(--m-ink) !important; }
div.vmenu div.menu_titre i, div.vmenu div.menu_titre span.fa, div.vmenu div.menu_titre span.fas, div.vmenu div.menu_titre img { color: var(--m-accent) !important; }

/* Children: indented under the parent with a vertical guide line */
div.vmenu div.menu_contenu {
	margin: 0 0 0 18px !important;
	padding: 0 !important;
	border-left: 2px solid var(--m-border);
}
div.vmenu div.menu_contenu a.vsmenu, div.vmenu div.menu_contenu span.vsmenu {
	display: block !important;
	margin: 0 !important;
	padding: 6px 10px 6px 14px !important;
	color: var(--m-ink) !important;
	font-size: 13.5px !important;
	font-weight: 500 !important;
	line-height: 1.35;
	border-radius: 0 8px 8px 0;
	position: relative;
}
div.vmenu div.menu_contenu a.vsmenu:hover {
	background: var(--m-accent-soft) !important;
	color: var(--m-accent-strong) !important;
}
div.vmenu div.menu_contenu:hover { border-left-color: var(--m-accent); }

/* Current page marker: works wherever the page marks its item with one of these classes */
div.vmenu a.vsmenu.vmenusel, div.vmenu a.vmenu.vmenusel, html body div.vmenu div.menu_contenu a.vsmenu.m-current,
html body div.vmenu div.menu_contenu a.vsmenu.m-current:link,
html body div.vmenu div.menu_contenu a.vsmenu.m-current:visited,
html body div.vmenu div.menu_contenu a.vsmenu.m-current:hover,
html body div.vmenu div.menu_contenu a.vsmenu.m-current:active,
html body div.vmenu div.menu_contenu a.vsmenu.m-current:focus {
	-webkit-text-fill-color: #fff !important;
	opacity: 1 !important;
	background: var(--m-bar) !important;
	color: #fff !important;
	font-weight: 500 !important;
}
div.vmenu .menu_contenu.m-current { border-left-color: var(--m-accent); border-left-width: 3px; margin-left: 17px !important; }

/* Active parent: the group title that contains the current item */
div.vmenu div.menu_titre a.vmenu.m-current-parent, div.vmenu div.menu_titre span.vmenu.m-current-parent,
div.vmenu div.menu_titre a.vmenu.m-current-parent:hover {
	background: var(--m-accent-soft) !important;
	color: var(--m-ink) !important;
}
div.vmenu div.menu_titre .m-current-parent i, div.vmenu div.menu_titre .m-current-parent span.fa { color: var(--m-accent-strong) !important; }

/* Expand/collapse icons, when a menu entry provides them */
div.vmenu .fa-caret-down, div.vmenu .fa-caret-right, div.vmenu .fa-chevron-down, div.vmenu .fa-chevron-right,
div.vmenu .fa-angle-down, div.vmenu .fa-angle-right, div.vmenu .fa-plus, div.vmenu .fa-minus,
div.vmenu .fa-plus-square, div.vmenu .fa-minus-square {
	margin-left: auto; font-size: 11px; color: var(--m-muted) !important; opacity: 1;
}
div.vmenu a:hover .fa-caret-down, div.vmenu a:hover .fa-caret-right, div.vmenu a:hover .fa-chevron-down,
div.vmenu a:hover .fa-chevron-right, div.vmenu a:hover .fa-angle-down, div.vmenu a:hover .fa-angle-right {
	color: var(--m-accent-strong) !important;
}
