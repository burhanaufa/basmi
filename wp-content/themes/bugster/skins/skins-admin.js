/* global jQuery:false */
/* global BUGSTER_STORAGE:false */

jQuery( document ).ready(
	function() {
		"use strict";

		// Switch active skin
		jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_choose_skin' ).on(
			'click', function(e) {
				var link = jQuery( this );
				trx_addons_msgbox_confirm(
					BUGSTER_STORAGE['msg_switch_skin'],
					BUGSTER_STORAGE['msg_switch_skin_caption'],
					function(btn) {
						if ( btn != 1 ) return;
						jQuery.post(
							BUGSTER_STORAGE['ajax_url'], {
								'action': 'bugster_switch_skin',
								'skin': link.data( 'skin' ),
								'nonce': BUGSTER_STORAGE['ajax_nonce']
							},
							function(response){
								var rez = {};
								if (response == '' || response == 0) {
									rez = { error: BUGSTER_STORAGE['msg_ajax_error'] };
								} else {
									try {
										rez = JSON.parse( response );
									} catch (e) {
										rez = { error: BUGSTER_STORAGE['msg_ajax_error'] };
										console.log( response );
									}
								}
								// Show result
								if ( rez.error ) {
									trx_addons_msgbox_warning( rez.error );
								} else {
									trx_addons_msgbox_success( BUGSTER_STORAGE['msg_switch_skin_success'], BUGSTER_STORAGE['msg_switch_skin_success_caption'] );
								}
								// Reload current page after the skin is switched (if success)
								if (rez.error == '') {
									if ( location.hash != 'trx_addons_theme_panel_section_skins' ) {
										bugster_document_set_location( location.href.split('#')[0] + '#' + 'trx_addons_theme_panel_section_skins' );
									}
									location.reload( true );
								}
							}
						);
					}
				);
				e.preventDefault();
				return false;
			}
		);
	}
);
