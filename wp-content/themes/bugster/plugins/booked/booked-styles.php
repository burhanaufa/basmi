<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'bugster_booked_get_css' ) ) {
	add_filter( 'bugster_filter_get_css', 'bugster_booked_get_css', 10, 2 );
	function bugster_booked_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button,
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Form fields */
#booked-page-form {
	color: {$colors['text']};
	border-color: {$colors['bd_color']};
}

#booked-profile-page .booked-profile-header {
	background-color: {$colors['bg_color']} !important;
	border-color: transparent !important;
	color: {$colors['text']};
}
#booked-profile-page .booked-user h3 {
	color: {$colors['text_dark']};
}
#booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

#booked-profile-page .booked-tabs {
	border-color: {$colors['alter_bd_color']} !important;
}

.booked-modal .bm-window p.booked-title-bar {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_dark']} !important;
}
.booked-modal .bm-window .close i {
	color: {$colors['extra_dark']};
}
.booked-modal .bm-window .close:hover i {
	color: {$colors['text_link']};
}
.booked-modal .bm-window .booked-scrollable {
	color: {$colors['extra_text']};
	background-color: {$colors['bd_color']} !important;
}
.booked-modal .bm-window .booked-scrollable em {
	color: {$colors['text_dark']};
}
.booked-modal .bm-window #customerChoices {
	background-color: {$colors['extra_bg_hover']};
	border-color: {$colors['extra_bd_hover']};
}
.booked-form .booked-appointments {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_hover']} !important;	
}
.booked-modal .bm-window p.appointment-title {
	color: {$colors['alter_dark']};	
}
body .booked-modal input[type=submit].button-primary {
	color: {$colors['text_dark']};
	background-color: {$colors['text_link']}
}
body .booked-modal input[type=submit].button-primary:hover {
	color: {$colors['extra_dark']};
	background-color: {$colors['text_dark']}!important;
}
body .booked-modal button.cancel {
	color: {$colors['extra_dark']}!important;
	background-color: {$colors['text_dark']}!important;
}
body .booked-modal button.cancel:hover {
	color: {$colors['text_dark']}!important;
	background-color: {$colors['text_link']}!important;
}

/* Profile page and tabs */
.booked-calendarSwitcher.calendar,
.booked-calendarSwitcher.calendar select,
#booked-profile-page .booked-tabs {
	background-color: {$colors['alter_bg_color']} !important;
}
#booked-profile-page .booked-tabs li a {
	background-color: {$colors['text_dark']};
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li a i {
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li.active a,
#booked-profile-page .booked-tabs li.active a:hover,
#booked-profile-page .booked-tabs li a:hover {
	color: {$colors['text_dark']} !important;
	background-color: {$colors['text_link']} !important;
}
#booked-profile-page .booked-tab-content {
	background-color: {$colors['bg_color']};
	border-color: {$colors['alter_bd_color']};
}

/* Calendar */
table.booked-calendar thead tr {
	background-color: {$colors['extra_bg_color']} !important;
}
table.booked-calendar thead tr th {
	color: {$colors['inverse_link']} !important;
}
table.booked-calendar thead th i {
	color: {$colors['inverse_link']} !important;
}
table.booked-calendar thead th a:hover i {
	color: {$colors['text_link']} !important;
}
table.booked-calendar thead th .monthName a {
	color: {$colors['inverse_link']};
}
table.booked-calendar thead th .monthName a:hover {
	color: {$colors['text_link']};
}

table.booked-calendar tbody tr {
	background-color: {$colors['alter_bg_color']} !important;
}
table.booked-calendar tbody tr td {
	color: {$colors['alter_text']} !important;
	border-color: {$colors['alter_bg_hover']} !important;
}
table.booked-calendar tbody tr td:hover {
	color: {$colors['alter_dark']} !important;
}
table.booked-calendar tbody tr td.today .date {
	color: {$colors['alter_dark']} !important;
	background-color: {$colors['alter_bg_hover']} !important;
}
table.booked-calendar tbody td.today .date span {
	border-color: {$colors['alter_link']};
}
table.booked-calendar tbody td.today:hover .date span {
	background-color: {$colors['text_link']} !important;
	color: {$colors['inverse_link']} !important;
}

.booked-calendar-wrap .booked-appt-list h2 {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot {
	border-color: {$colors['alter_bd_color']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot:hover {
	background-color: {$colors['alter_bg_hover']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title {
	color: {$colors['text_link']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .spots-available {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:hover span {
	color: {$colors['extra_dark']};
}
body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:not([disabled]):hover {
	background-color: {$colors['text_dark']}!important;
}
body #booked-profile-page .booked-profile-header .booked-logout-button {
	color: {$colors['text_dark']};
}
body #booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

CSS;
		}

		return $css;
	}
}

