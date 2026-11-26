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
	background: var(--m-surface) !important;
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
	background: var(--m-surface) !important;
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
	background: var(--m-surface);
	color: var(--m-ink);
	padding: 10px 14px;
	box-shadow: none;
}
div.ok { border-left-color: #16a34a; background: var(--m-ok-bg); }
div.info { border-left-color: var(--m-accent); background: var(--m-accent-soft); }
div.warning { border-left-color: #d97706; background: var(--m-warn-bg); }
div.error, div.red { border-left-color: #dc2626; background: var(--m-err-bg); }

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
	border-bottom: 1px solid var(--m-surface-3) !important;
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
div.pagination li > a, div.pagination li > span.inactive, ul.pagination li > a { border-radius: 6px !important; border: 1px solid var(--m-border); padding: 4px 9px; color: var(--m-ink-2); background: var(--m-surface); }
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
.dropdown-menu, div.dropdown-content, #topmenu-login-dropdown .dropdown-menu { background: var(--m-surface); color: var(--m-ink); }
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
:root { --m-side-w: 290px; --m-rail-w: 56px; --m-top-h: 50px; }
.side-nav { width: var(--m-side-w); }

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
	background: var(--m-surface);
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
input[type=checkbox]:disabled, input[type=radio]:disabled { background-color: var(--m-surface-3); border-color: var(--m-border) !important; opacity: .7; cursor: default !important; }
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
#topmenu-login-dropdown .dropdown-menu { background: var(--m-surface); padding: 0; overflow: hidden; }
#topmenu-login-dropdown .dropdown-header, #topmenu-login-dropdown .user-body { background: var(--m-surface); padding: 14px 16px; }
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
	background: var(--m-surface) !important;
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
.user-footer .pull-right a:hover { background: var(--m-err-bg) !important; border-color: #fecaca !important; color: var(--m-danger) !important; }
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

/* ---------- Setup home (admin/index.php): cards ---------- */
section.setupsection {
	position: relative;
	padding: 22px 24px 22px 84px !important;
	margin: 0 0 14px;
	background: var(--m-surface) !important;
	border: 1px solid var(--m-border);
	border-radius: var(--m-radius);
	box-shadow: var(--m-shadow-sm, 0 1px 2px rgba(15,23,42,.05));
	color: var(--m-muted);
	line-height: 1.55;
	transition: border-color .15s, box-shadow .15s, transform .15s;
}
section.setupsection:hover {
	border-color: var(--m-accent);
	box-shadow: 0 6px 20px rgba(15,23,42,.08), 0 0 0 3px var(--m-accent-ring);
}
section.setupsection > span:first-child, section.setupsection > img:first-child {
	position: absolute; left: 24px; top: 22px;
	width: 44px; height: 44px; margin: 0 !important; padding: 0 !important;
	display: flex !important; align-items: center; justify-content: center;
	background: var(--m-accent-soft); border-radius: 12px;
	font-size: 20px !important; color: var(--m-accent-strong) !important;
}
section.setupsection > a:first-of-type {
	display: block;
	margin-bottom: 4px;
	font-size: 16px !important;
	font-weight: 600;
	color: var(--m-ink) !important;
}
section.setupsection > br { display: none; }
section.setupsection div.warning {
	margin: 14px 0 0 !important;
}
section.setupsection + br, section.setupsection + br + br { display: none; }
div.logo_setup { display: none; }

/* ---------- Title bar action buttons (view mode, refresh, add): compact ---------- */
html body a.btnTitle, html body .btnTitle {
	min-width: 0 !important;
	width: 32px; height: 32px;
	padding: 0 !important;
	margin: 0 0 0 6px !important;
	display: inline-flex !important; align-items: center; justify-content: center;
	border-radius: var(--m-radius-sm) !important;
	vertical-align: middle;
}
html body a.btnTitle.btnTitleSelected { background: var(--m-accent-soft); border-color: var(--m-accent) !important; color: var(--m-accent-strong); }
html body a.btnTitle .btnTitle-icon, html body a.btnTitle > .fa, html body a.btnTitle > span.fa, html body a.btnTitle > span.fas {
	font-size: 14px !important; line-height: 1; margin: 0 !important; padding: 0 !important; width: auto;
}
html body a.btnTitle.btnTitleSelected .btnTitle-icon { color: var(--m-accent-strong) !important; }
html body a.btnTitle:hover { background: var(--m-surface-2); }
/* Buttons with a text label keep their width */
html body a.btnTitle:has(.btnTitle-label) { width: auto; padding: 0 12px !important; }

/* Mass action column: row checkboxes aligned with the select-all checkbox of the header */
html body table.liste th.liste_titre.maxwidthsearch:has(#checkforselects), html body table.liste td.actioncolumn {
	text-align: right !important;
	padding-right: 6px !important;
	padding-left: 4px !important;
}
html body table.liste td.actioncolumn { padding-right: 8px !important; }

/* Tables no longer clip (dropdowns such as the column selector must overflow): round the corner cells instead */
table.liste > thead > tr:first-child > th:first-child, table.liste > tbody > tr:first-child > th:first-child,
table.liste > tbody > tr:first-child > td:first-child { border-top-left-radius: var(--m-radius); }
table.liste > thead > tr:first-child > th:last-child, table.liste > tbody > tr:first-child > th:last-child,
table.liste > tbody > tr:first-child > td:last-child { border-top-right-radius: var(--m-radius); }
table.liste > tbody > tr:last-child > td:first-child { border-bottom-left-radius: var(--m-radius); }
table.liste > tbody > tr:last-child > td:last-child { border-bottom-right-radius: var(--m-radius); }

/* Column selector dropdown (list icon in the table header) */
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft {
	background: var(--m-surface) !important;
	border: 1px solid var(--m-border) !important;
	border-radius: var(--m-radius) !important;
	box-shadow: var(--m-shadow-lg, 0 12px 32px rgba(15,23,42,.14)) !important;
	padding: 8px !important;
	margin-top: 6px;
	z-index: 1000;
	text-transform: none; letter-spacing: 0; font-weight: 400;
}
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li {
	display: flex; align-items: center; gap: 8px;
	padding: 5px 8px; border-radius: 6px; list-style: none;
	font-size: 13px; color: var(--m-ink); text-transform: none;
}
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li:hover { background: var(--m-accent-soft); }
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li label { padding: 0 !important; margin: 0; cursor: pointer; text-transform: none; flex: 1; }
/* Search box of the column selector: sticky and opaque, so options never show through it */
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li.liinputsearch,
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li.liinputsearch:hover {
	position: sticky; top: -8px; z-index: 2;
	background: var(--m-surface) !important;
	margin: -8px -8px 4px; padding: 8px 8px 8px !important;
	border-radius: var(--m-radius) var(--m-radius) 0 0;
	border-bottom: 1px solid var(--m-border);
}

/* ---------- Thin scrollbars (page, tables, dropdowns) ---------- */
* { scrollbar-width: thin; scrollbar-color: var(--m-border-strong) transparent; }
*::-webkit-scrollbar { width: 8px; height: 8px; }
*::-webkit-scrollbar-track { background: transparent; }
*::-webkit-scrollbar-thumb { background: var(--m-border-strong); border-radius: 8px; border: 2px solid transparent; background-clip: content-box; }
*::-webkit-scrollbar-thumb:hover { background: var(--m-muted); background-clip: content-box; }
*::-webkit-scrollbar-button { display: none; width: 0; height: 0; }

/* ---------- Record header: photo / icon placeholder ---------- */
html body div.divphotoref .photoref {
	display: inline-flex !important; align-items: center; justify-content: center;
	width: 72px; height: 72px; padding: 0 !important; margin: 0 !important;
	background: var(--m-accent-soft);
	border: 1px solid var(--m-accent-ring) !important;
	border-radius: 18px !important;
	box-shadow: none !important;
	overflow: hidden;
}
html body div.divphotoref .photoref > span.fas, html body div.divphotoref .photoref > span.fa,
html body div.divphotoref .photoref > span.far {
	font-size: 28px !important; line-height: 1; color: var(--m-accent-strong) !important;
}
html body div.divphotoref .photoref img, html body div.divphotoref img.photo {
	width: 100%; height: 100%; object-fit: cover; border-radius: 0 !important; box-shadow: none !important; border: 0 !important;
}
html body div.divphotoref { margin-right: 16px; }
html body div.divphotoref .photoref {
	background: transparent !important;
	border: 0 !important;
	box-shadow: 0 2px 10px rgba(15,23,42,.10), 0 1px 3px rgba(15,23,42,.06) !important;
}

/* ---------- Field tables (record cards): readable labels in an accent shade, dark values ---------- */
html body table.border td.titlefield, html body table.border td.titlefieldmiddle, html body table.border td.titlefieldcreate,
html body table.border td.titlefieldmax45, html body table.border td[class*="titlefield"],
html body table.border > tbody > tr > td:first-child:not([colspan]) {
	color: var(--m-ink-2) !important;
	font-size: 13px !important;
	font-weight: 600 !important;
}
html body table.border > tbody > tr > td:nth-child(2) {
	color: var(--m-ink) !important;
	font-size: 14px;
}

/* Radios: compact 16px, filled accent circle with a white dot when selected */
html body input[type=radio] {
	width: 16px !important; height: 16px !important; min-width: 16px !important; min-height: 16px !important;
	margin: 0 6px 0 0 !important;
	border-radius: 50% !important;
	background: var(--m-surface);
}
html body input[type=radio]:hover { box-shadow: 0 0 0 3px var(--m-accent-soft) !important; }
html body input[type=radio]:checked {
	border-color: var(--m-accent) !important;
	background: radial-gradient(circle at center, #fff 0 2.5px, var(--m-accent) 3px) !important;
}
html body input[type=radio]:checked:disabled { background: radial-gradient(circle at center, #fff 0 2.5px, #a5b4fc 3px) !important; border-color: #a5b4fc !important; }

/* General rule: any list column holding a row checkbox lines up with the header select-all checkbox */
html body table.liste td:has(> input.checkforselect), html body table.liste td:has(> input.checkforaction) {
	text-align: right !important;
	padding-right: 8px !important;
	padding-left: 4px !important;
}

/* ---------- Consistent field widths in forms ---------- */
/* Standard width for text-like inputs, selects and select2 boxes in field tables. Special cases keep their size:
   explicit small widths (width25..width200, maxwidth50/75/100), date pickers, numbers. */
:root { --m-field-w: 340px; --m-icon-w: 22px; }
html body table.border td :is(
		input[type=text], input[type=email], input[type=url], input[type=password], input[type=tel], input:not([type]),
		select:not(.select2-hidden-accessible), span.select2-container
	):where(:not([class~="width25"]):not([class~="width50"]):not([class~="width75"]):not([class~="width100"]):not([class~="width125"]):not([class~="width150"]):not([class~="width200"]):not(.hasDatepicker):not(.maxwidthdate):not([class~="maxwidth50"]):not([class~="maxwidth75"]):not([class~="maxwidth100"])) {
	width: calc(var(--m-field-w) - var(--m-icon-w)) !important;
	max-width: 100% !important;
	min-width: 0 !important;
	box-sizing: border-box;
}
html body table.border td span.select2-container .select2-selection { width: 100% !important; max-width: none !important; min-width: 0 !important; }

/* Icon + field: the icon is part of the standard width, so right edges line up with plain fields */
html body table.border td .pictofixedwidth ~ :is(input[type=text], input[type=email], input[type=url], input[type=tel], input:not([type]), span.select2-container):where(:not([class~="width25"]):not([class~="width50"]):not([class~="width75"]):not([class~="width100"]):not([class~="width125"]):not([class~="width150"]):not([class~="width200"]):not(.hasDatepicker)) {
	width: calc(var(--m-field-w) - var(--m-icon-w)) !important; margin-left: 0 !important;
}

/* Textareas and HTML editors (CKEditor) share the same width */
:root { --m-area-w: 560px; }
html body table.border td textarea,
html body table.border td div.cke, html body table.border td .cke_chrome, html body table.border td .cke_inner,
html body table.border td .mce-tinymce, html body table.border td .tox-tinymce {
	width: var(--m-area-w) !important;
	max-width: 100% !important;
	box-sizing: border-box;
}

/* Responsive: field widths shrink with the screen, and fill the cell on small screens */
html body table.border td :is(input[type=text], input[type=email], input[type=url], input[type=password], input[type=tel], input:not([type]), select:not(.select2-hidden-accessible), span.select2-container):where(:not([class~="width25"]):not([class~="width50"]):not([class~="width75"]):not([class~="width100"]):not([class~="width125"]):not([class~="width150"]):not([class~="width200"]):not(.hasDatepicker):not(.maxwidthdate):not([class~="maxwidth50"]):not([class~="maxwidth75"]):not([class~="maxwidth100"])) {
	width: min(calc(var(--m-field-w) - var(--m-icon-w)), calc(100% - var(--m-icon-w))) !important;
}
html body table.border td textarea, html body table.border td div.cke, html body table.border td .cke_chrome,
html body table.border td .cke_inner, html body table.border td .mce-tinymce, html body table.border td .tox-tinymce {
	width: min(var(--m-area-w), 100%) !important;
}
@media (max-width: 768px) {
	html body table.border td :is(input, select, span.select2-container, textarea, div.cke):not([type=checkbox]):not([type=radio]):not([type=submit]):not([type=button]):not(.hasDatepicker):not(.select2-hidden-accessible) {
		max-width: 100% !important;
	}
	html body table.border > tbody > tr > td:first-child:not([colspan]) { width: 38% !important; }
}

/* Date range (from / to): the two date fields together take the standard field width */
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput {
	display: inline-flex !important; align-items: center; gap: 6px;
	width: calc((min(var(--m-field-w) - var(--m-icon-w), 100% - var(--m-icon-w)) - 10px) / 2);
	vertical-align: middle;
}
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput input.hasDatepicker {
	flex: 1 1 auto; min-width: 0; width: 100% !important; max-width: none !important;
}
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput img.ui-datepicker-trigger { flex: 0 0 auto; }
/* Icon + field (native select too): no extra left margin, width stays responsive */
html body table.border td .pictofixedwidth ~ :is(input[type=text], input[type=email], input[type=url], input[type=tel], input:not([type]), select:not(.select2-hidden-accessible), span.select2-container):where(:not([class~="width25"]):not([class~="width50"]):not([class~="width75"]):not([class~="width100"]):not([class~="width125"]):not([class~="width150"]):not([class~="width200"]):not(.hasDatepicker)) {
	margin-left: 0 !important;
	width: min(calc(var(--m-field-w) - var(--m-icon-w)), calc(100% - var(--m-icon-w))) !important;
}
/* Icon placed before a wrapper (e.g. state select inside a div): same rule as icon directly before the field */
html body table.border td:has(.pictofixedwidth) :is(input[type=text], input[type=email], input[type=url], input[type=tel], input:not([type]), select:not(.select2-hidden-accessible), span.select2-container):where(:not([class~="width25"]):not([class~="width50"]):not([class~="width75"]):not([class~="width100"]):not([class~="width125"]):not([class~="width150"]):not([class~="width200"]):not(.hasDatepicker)) {
	margin-left: 0 !important;
}

/* One left edge for every control: cells holding controls (inputs, checkboxes, selects, textareas, editors, dates)
   get the icon column's width as left padding, unless they start with an icon themselves */
html body table.border td:not(:first-child):has(:is(input:not([type=hidden]), select, textarea, .cke, .select2-container)):not(:has(.pictofixedwidth)) {
	padding-left: calc(var(--m-icon-w) + 8px) !important;
}
html body table.border td textarea { margin-left: 0 !important; }
html body table.border td > input[type=checkbox], html body table.border td > input[type=radio] { margin-left: 3px !important; }

/* Photo placeholder or uploaded photo that is itself the img.photoref (users, contacts, ...) */
html body div.divphotoref img.photoref {
	display: block !important;
	width: 72px !important; height: 72px !important; max-width: none !important;
	padding: 0 !important; margin: 0 !important;
	object-fit: cover;
	background: transparent !important;
	border: 0 !important;
	border-radius: 18px !important;
	box-shadow: 0 2px 10px rgba(15,23,42,.10), 0 1px 3px rgba(15,23,42,.06) !important;
}
/* Default silhouette (no uploaded photo): smaller inside its tile */
html body div.divphotoref img.photoref[src*="/theme/common/user_"] {
	box-sizing: border-box;
	padding: 14px !important;
	object-fit: contain;
	background: var(--m-surface) !important;
}

/* ---------- Record view (card): clear label / value boundary and two separated panels ---------- */
/* Label cell: tinted background and a vertical divider, value cell stays white */
html body table.tableforfield > tbody > tr > td:first-child:not([colspan]) {
	background: var(--m-surface-2);
	border-right: 1px solid var(--m-border) !important;
}
html body table.tableforfield > tbody > tr > td:nth-child(2) { padding-left: 16px !important; }
html body table.tableforfield { border: 1px solid var(--m-border) !important; border-radius: var(--m-radius); overflow: hidden; }

/* Left / right halves: side by side with a gap instead of touching each other */
html body div.fichecenter:has(> div.fichehalfleft) { display: flex; flex-wrap: wrap; gap: 24px; align-items: stretch; }
html body div.fichecenter > div.fichehalfleft, html body div.fichecenter > div.fichehalfright {
	float: none !important; flex: 1 1 380px; min-width: 0; width: auto !important; margin: 0 !important; padding: 0 !important;
}
html body div.fichecenter > div.fichecenterbis, html body div.fichecenter > div.clearboth { flex-basis: 100%; }
/* Stronger boundary */
html body table.tableforfield { border-color: var(--m-border-strong) !important; background: var(--m-surface); }
html body table.tableforfield > tbody > tr > td:first-child:not([colspan]) {
	background: color-mix(in srgb, var(--m-accent) 6%, var(--m-surface-2)) !important;
	border-right: 1px solid var(--m-border-strong) !important;
}
html body table.tableforfield > tbody > tr > td { border-bottom: 1px solid var(--m-border) !important; }
html body table.tableforfield > tbody > tr:last-child > td { border-bottom: 0 !important; }

/* ---------- Record view, final: no painted columns, no lines. Soft rows with hover (option B) ---------- */
html body table.tableforfield {
	border: 0 !important; border-radius: 0; overflow: visible; background: transparent !important;
	border-collapse: separate; border-spacing: 0 2px;
}
html body table.tableforfield > tbody > tr > td,
html body table.tableforfield > tbody > tr > td:first-child:not([colspan]) {
	background: transparent !important;
	border: 0 !important;
	padding-top: 9px !important; padding-bottom: 9px !important;
}
html body table.tableforfield > tbody > tr > td:first-child { padding-left: 12px !important; border-radius: 8px 0 0 8px; }
html body table.tableforfield > tbody > tr > td:last-child { border-radius: 0 8px 8px 0; }
html body table.tableforfield > tbody > tr > td:nth-child(2) { padding-left: 16px !important; }
html body table.tableforfield > tbody > tr:not(.liste_titre):hover > td { background: var(--m-surface-2) !important; }

/* Each half of the record view is a bordered panel */
html body div.fichecenter > div.fichehalfleft, html body div.fichecenter > div.fichehalfright {
	border: 1px solid var(--m-border-strong);
	border-radius: var(--m-radius);
	padding: 8px 10px !important;
	background: var(--m-surface);
}
html body div.fichehalfleft > div.underbanner, html body div.fichehalfright > div.underbanner { display: none; }

/* ---------- Titles: no all-caps, a clear size scale ---------- */
html body div.titre { text-transform: none !important; letter-spacing: -0.01em; color: var(--m-ink) !important; font-weight: 600; font-size: 15px; }
html body table.table-fiche-title .col-title div.titre { font-size: 22px; font-weight: 650; letter-spacing: -0.02em; line-height: 1.25; }
html body table.table-fiche-title .col-title div.titre span.opacitymedium, html body div.titre .opacitymedium { font-weight: 500; font-size: .8em; }

/* ---------- Tabs: darker inactive text, thick rounded underline on the active tab ---------- */
html body div.tabs a.tab, html body div.tabs a.tab:link, html body div.tabs a.tab:visited,
html body div.tabs div.tabunactive > a.tab, html body a.tab.tabunactive, html body a.tabunactive {
	color: var(--m-ink-2) !important;
	position: relative;
}
html body div.tabs a.tab:hover, html body div.tabs div.tabunactive > a.tab:hover { color: var(--m-ink) !important; }
html body div.tabs div.tabactive > a.tab, html body div.tabs div.tabactive > a.tab:link, html body div.tabs div.tabactive > a.tab:visited,
html body div.tabs div.tabactive > a.tab:hover, html body div.tabs div.tabsElemActive a.tab, html body a.tab.tabactive, html body a.tabactive {
	color: var(--m-accent-strong) !important;
	font-weight: 600;
	border-bottom-color: transparent !important;
	position: relative;
}
html body div.tabs div.tabactive > a.tab::after, html body div.tabs div.tabsElemActive a.tab::after {
	content: '';
	position: absolute; left: 0; right: 0; bottom: -2px;
	height: 4px; border-radius: 4px 4px 0 0;
	background: var(--m-accent);
}
/* Underlines touch each other: no gap between tabs, hover bar has the same size and position as the active one */
html body div.tabs { gap: 0 !important; }
html body div.tabs a.tab:hover, html body div.tabs div.tabunactive > a.tab:hover { border-bottom-color: transparent !important; }
html body div.tabs div.tabunactive > a.tab::after {
	content: ''; position: absolute; left: 0; right: 0; bottom: -2px;
	height: 4px; border-radius: 4px 4px 0 0; background: transparent;
	transition: background .15s;
}
html body div.tabs div.tabunactive > a.tab:hover::after { background: var(--m-border-strong); }

/* ---------- Left menu: collapsible groups with a chevron (see modern.js) ---------- */
html body div.vmenu div.menu_titre.m-has-children { position: relative; }
html body div.vmenu div.menu_titre.m-has-children > a.vmenu, html body div.vmenu div.menu_titre.m-has-children > span.vmenu { padding-right: 34px; }
html body div.vmenu button.m-chev {
	position: absolute; right: 6px; top: 50%; transform: translateY(-50%);
	width: 26px; height: 26px; padding: 0; border: 0; border-radius: 6px;
	background: transparent; color: var(--m-ink-2); cursor: pointer;
	display: inline-flex; align-items: center; justify-content: center;
}
html body div.vmenu button.m-chev:hover { background: var(--m-accent-soft); color: var(--m-accent-strong); }
html body div.vmenu button.m-chev .fas { font-size: 11px; transition: transform .18s ease; }
html body div.vmenu div.menu_titre.m-collapsed button.m-chev .fas { transform: rotate(-90deg); }
html body div.vmenu .m-group-hidden { display: none !important; }

/* Left menu content must fit its panel (it was 280px wide and clipped on the right) */
html body .side-nav #id-left, html body #id-left { display: block !important; width: 100% !important; min-width: 0 !important; max-width: 100% !important; box-sizing: border-box; }
html body div.vmenu { width: 100% !important; box-sizing: border-box; }
html body div.vmenu div.blockvmenupair, html body div.vmenu div.blockvmenuimpair { width: auto !important; box-sizing: border-box; }
html body div.vmenu div.menu_contenu a.vsmenu, html body div.vmenu div.menu_titre a.vmenu { white-space: normal; overflow-wrap: anywhere; }

/* Header rows keep the theme border colour whatever the base sheet says (it used white, wrong in dark mode) */
html body table tr.liste_titre > th, html body table tr.liste_titre > td, html body table th.liste_titre { border-bottom-color: var(--m-border) !important; }

/* ============================================================================== */
/* APP LAYOUT (desktop): full height sidebar, top bar beside it                   */
/* Open: full menu. Closed: thin icon rail. Hover on the toggle: menu over page.  */
/* Behaviour (hover, saved state, rail tooltips) is in modern.js                  */
/* ============================================================================== */
<?php if (GETPOST('optioncss', 'aZ09') != 'print') { ?>
/* ---------- Top bar: login block (print, help, search, user...) on the right ---------- */
@media screen and (min-width: 769px) {
	html body #id-top.side-nav-vert { margin-left: 0; margin-right: 0; }

	html body #id-top div.login_block, html body.sidebar-collapse #id-top div.login_block {
		position: fixed; top: 0; right: 0; left: auto;
		display: flex; align-items: center; gap: 4px;
		width: auto; height: var(--m-top-h); padding: 0 8px 0 0;
		background: transparent; border: 0;
	}
	html body #id-top div.login_block_other, html body.sidebar-collapse #id-top div.login_block_other {
		order: 1; display: flex; align-items: center; clear: none;
		margin: 0; padding: 0; max-width: none;
	}
	html body #id-top div.login_block_tools { order: 2; display: flex; align-items: center; padding: 0; }
	html body #id-top div.login_block_user { order: 3; display: flex; align-items: center; clear: none; }
	html body #id-top div.login_block_tools > div { position: relative; top: auto; right: auto !important; display: flex !important; align-items: center; }
	html body #id-top div.login_block_user .login_block_elem_name { width: auto; margin: 0; height: auto; }
	html body #id-top div#topmenu-login-dropdown { position: relative; top: auto; right: auto; height: var(--m-top-h); line-height: 49px; }
	html body #id-top .login_block_other .login_block_elem { float: none; display: inline-block; }
	html body #id-top div.login_block span.aversion { color: var(--m-bar-text-dim); filter: none; font-size: 11px; }
	/* help, print and bug icons: light, like the rest of the bar */
	html body #id-top div.login_block_other .atoplogin { color: var(--m-bar-text-dim) !important; }

	/* room kept for the block so the top menu does not slide under it */
	html body #id-top ul.tmenu { margin-right: 330px; }
}
@media screen and (min-width: 769px) and (max-width: 1500px) {
	html body #id-top div.login_block span.aversion, html body #id-top .atoploginusername { display: none !important; }
	html body #id-top ul.tmenu { margin-right: 210px; }
}
<?php } ?>

<?php if (GETPOST('optioncss', 'aZ09') != 'print' && !in_array($conf->browser->layout, array('phone', 'tablet'))) { ?>
@media screen and (min-width: 769px) {
	/* ---------- Sidebar column: the head strip (behind the toggle) + the scrolling menu ---------- */
	html body:has(.side-nav)::before {
		content: ""; position: fixed; top: 0; left: 0; z-index: 90;
		box-sizing: border-box; width: var(--m-side-w); height: var(--m-top-h);
		background: var(--m-surface); border-right: 1px solid var(--m-border);
	}
	html body .side-nav { top: var(--m-top-h); }
	html body:has(.side-nav) #id-top.side-nav-vert { margin-left: var(--m-side-w); }

	/* Toggle icon: moved from the top bar to the head of the sidebar */
	html body:has(.side-nav) #id-top li#mainmenutd_menu {
		position: fixed; top: 0; left: 0; z-index: 2;
		display: flex; align-items: center; justify-content: center;
		width: var(--m-rail-w); height: var(--m-top-h);
		background: transparent !important; box-shadow: none !important;
	}
	html body:has(.side-nav) #id-top li#mainmenutd_menu :is(a, span) { color: var(--m-ink-2) !important; }
	html body:has(.side-nav) #id-top li#mainmenutd_menu:hover :is(a, span) { color: var(--m-accent) !important; }

	/* ---------- Closed: narrow column ---------- */
	html body.sidebar-collapse:has(.side-nav)::before { width: var(--m-rail-w); }
	html body.sidebar-collapse:has(.side-nav) #id-top.side-nav-vert { margin-left: var(--m-rail-w); }
	html body.sidebar-collapse:has(.side-nav) #id-right { padding-left: calc(var(--m-rail-w) + 9px); }
	html body.sidebar-collapse .side-nav { display: block; width: var(--m-rail-w); }

	/* ---------- Closed and not previewed: one icon per menu section ---------- */
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu { padding: 0 8px; }
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu :is(.menu_contenu, button.m-chev, .blockvmenubookmarks),
	html body.sidebar-collapse:not(.m-menu-peek) .side-nav :is(#blockvmenuhelp, .blockvmenuhelp) { display: none !important; }
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre { margin: 4px 0; padding: 0; }
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre :is(a.vmenu, span.vmenu) {
		display: flex; align-items: center; justify-content: center;
		height: 40px; padding: 0 !important; font-size: 0 !important; overflow: hidden;
	}
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu [class*="fa-"] { margin: 0; padding: 0; width: auto; font-size: 17px; }
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu img { margin: 0; width: 18px; }
	/* default icon for a section that has none */
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu:not(:has([class*="fa-"], img))::before {
		content: "\f07b"; font: 900 17px "Font Awesome 5 Free";
	}
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu:hover { background: var(--m-accent-soft) !important; }
	/* current section */
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu.m-current-parent { background: var(--m-bar) !important; }
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu.m-current-parent :is(span, i),
	html body.sidebar-collapse:not(.m-menu-peek) div.vmenu div.menu_titre .vmenu.m-current-parent::before { color: var(--m-side-active-text) !important; }
	/* search box of the left menu: reduced to its magnifier */
	html body.sidebar-collapse:not(.m-menu-peek) .blockvmenusearch :is(.select2-container, .select2-selection) { width: 40px !important; }
	html body.sidebar-collapse:not(.m-menu-peek) .blockvmenusearch .select2-selection__rendered { padding: 0 !important; display: flex; align-items: center; justify-content: center; height: 100% !important; }
	html body.sidebar-collapse:not(.m-menu-peek) .blockvmenusearch .select2-selection__arrow { display: none; }
	html body.sidebar-collapse:not(.m-menu-peek) .blockvmenusearch .select2-selection__placeholder { font-size: 0; }
	html body.sidebar-collapse:not(.m-menu-peek) .blockvmenusearch .select2-selection__placeholder .fa { margin: 0; padding: 0; font-size: 16px; color: var(--m-ink-2) !important; }

	/* ---------- Hover preview: full menu drawn over the page, the content does not move ---------- */
	html body.sidebar-collapse.m-menu-peek .side-nav {
		width: var(--m-side-w); z-index: 1001;
		box-shadow: 8px 0 24px rgba(15,23,42,.18) !important;
	}

	/* ---------- Section name shown beside a rail icon ---------- */
	.m-rail-tip {
		position: fixed; z-index: 1100; transform: translateY(-50%); pointer-events: none;
		padding: 6px 10px; border-radius: 6px; white-space: nowrap;
		background: var(--m-ink); color: var(--m-surface); font-size: 12.5px; font-weight: 500;
		box-shadow: 0 4px 12px rgba(15,23,42,.2);
	}
}
<?php } ?>

/* ============================================================================== */
/* LEFT MENU TOGGLE: sidebar panel icon in place of the hamburger                 */
/* ============================================================================== */
html body .menuhider span.fa-bars::before {
	content: "" !important;
	display: inline-block; width: 20px; height: 20px; vertical-align: middle;
	background-color: currentColor;
	-webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round'%3E%3Crect x='3' y='4' width='18' height='16' rx='3'/%3E%3Cpath d='M9.5 4v16'/%3E%3C/svg%3E") center / contain no-repeat;
	mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round'%3E%3Crect x='3' y='4' width='18' height='16' rx='3'/%3E%3Cpath d='M9.5 4v16'/%3E%3C/svg%3E") center / contain no-repeat;
}

/* ============================================================================== */
/* SIDEBAR COLORS: the --m-side-* variables are in modern.inc.css.php             */
/* ============================================================================== */
/* The menu rules read the theme variables: give them the sidebar values inside the panel */
html body .side-nav {
	--m-surface: var(--m-side-bg); --m-surface-2: var(--m-side-hover); --m-surface-3: var(--m-side-hover);
	--m-ink: var(--m-side-strong); --m-ink-2: var(--m-side-text); --m-muted: var(--m-side-muted);
	--m-border: var(--m-side-line); --m-border-strong: var(--m-side-line);
	--m-accent: var(--m-side-active); --m-accent-soft: var(--m-side-hover); --m-accent-strong: var(--m-side-active-text); --m-bar: var(--m-side-active);
	--colorbackvmenu1: var(--m-side-bg); --colortextbackvmenu: var(--m-side-text);
	background: var(--m-side-bg) !important; color: var(--m-side-text); scrollbar-color: var(--m-side-line) var(--m-side-bg);
}
html body .side-nav #id-left { background: transparent; }
html body .side-nav div.vmenu div.menu_titre :is(a.vmenu, span.vmenu) { color: var(--m-side-strong) !important; }
html body .side-nav div.vmenu div.menu_titre .vmenu :is(span, i)[class*="fa-"], html body .side-nav div.vmenu div.menu_contenu [class*="fa-"]:not(.fa-exclamation-triangle) { color: var(--m-side-icon) !important; }
html body .side-nav div.vmenu div.menu_titre a.vmenu.m-current-parent { background: var(--m-side-hover) !important; }
html body .side-nav :is(.help, .help a, .blockvmenuhelp, .blockvmenuhelp a) { color: var(--m-side-muted) !important; }
/* search and bookmark lists inside the panel */
html body .side-nav .select2-container--default .select2-selection--single { background: var(--m-side-card) !important; border-color: var(--m-side-card) !important; }
html body .side-nav .select2-selection :is(.select2-selection__rendered, .select2-selection__placeholder, .fa) { color: var(--m-side-text) !important; }

@media screen and (min-width: 769px) {
	html body:has(.side-nav)::before { background: var(--m-side-bg); border-right-color: var(--m-side-line); }
	html body .side-nav { border-right-color: var(--m-side-line); }
	html body:has(.side-nav) #id-top li#mainmenutd_menu :is(a, span) { color: var(--m-side-icon) !important; }
	html body:has(.side-nav) #id-top li#mainmenutd_menu:hover :is(a, span) { color: var(--m-side-strong) !important; }
	html body.sidebar-collapse:not(.m-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu.m-current-parent { background: var(--m-side-active) !important; }
	html body.sidebar-collapse:not(.m-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu.m-current-parent :is(span, i)[class*="fa-"] { color: var(--m-side-active-text) !important; }
	html body .m-rail-tip { background: var(--m-side-card); color: var(--m-side-strong); }
}


/* ---------- Hover preview: the menu grows over the page and the top bar, its texts slide in ---------- */
.m-peek-head { display: none; }
@media screen and (min-width: 769px) {
	html body .side-nav { transition: width .24s ease; transition-delay: 0s; }
	/* head of the preview, drawn over the left part of the top bar (element added by modern.js) */
	html body #id-top .m-peek-head {
		display: block; position: fixed; top: 0; left: 0; z-index: 1; visibility: hidden;
		width: var(--m-rail-w); height: var(--m-top-h); background: var(--m-side-bg);
		transition: width .24s ease, visibility 0s .24s;
	}
	html body.sidebar-collapse.m-menu-peek #id-top .m-peek-head {
		visibility: visible; width: var(--m-side-w); transition: width .24s ease;
		box-shadow: 8px 0 24px rgba(15,23,42,.18); clip-path: inset(0 -32px 0 0);
	}
	html body.sidebar-collapse.m-menu-peek .side-nav { clip-path: inset(0 -32px 0 0); }
	/* the menu keeps its full width while the panel grows, so no line wraps during the animation */
	html body.sidebar-collapse.m-menu-peek .side-nav #id-left { width: var(--m-side-w) !important; max-width: none !important; }
	html body.sidebar-collapse.m-menu-peek div.vmenu :is(.menu_titre, .menu_contenu) { animation: m-menu-text .26s ease .08s both; }
	html body.sidebar-collapse.m-menu-peek div.vmenu > :nth-child(2) :is(.menu_titre, .menu_contenu) { animation-delay: .12s; }
	html body.sidebar-collapse.m-menu-peek div.vmenu > :nth-child(3) :is(.menu_titre, .menu_contenu) { animation-delay: .16s; }
	html body.sidebar-collapse.m-menu-peek div.vmenu > :nth-child(n+4) :is(.menu_titre, .menu_contenu) { animation-delay: .2s; }
}
@keyframes m-menu-text {
	from { opacity: 0; transform: translateX(-12px); }
	to { opacity: 1; transform: none; }
}
@media (prefers-reduced-motion: reduce) {
	html body .side-nav, html body #id-top .m-peek-head { transition: none !important; }
	html body div.vmenu :is(.menu_titre, .menu_contenu) { animation: none !important; }
}

/* A section name that is itself the current page (for example the dashboard) */
html body .side-nav div.vmenu div.menu_titre a.vmenu.m-current { background: var(--m-side-active) !important; color: var(--m-side-active-text) !important; }
html body .side-nav div.vmenu div.menu_titre a.vmenu.m-current :is(span, i)[class*="fa-"] { color: var(--m-side-active-text) !important; }

/* Open menu (and hover preview): only the current entry is highlighted, not the name of its section.
   The icon bar keeps the highlight, as the entry itself is not visible there. */
html body:not(.sidebar-collapse) .side-nav div.vmenu div.menu_titre a.vmenu.m-current-parent:not(:hover),
html body.m-menu-peek .side-nav div.vmenu div.menu_titre a.vmenu.m-current-parent:not(:hover) { background: transparent !important; }
