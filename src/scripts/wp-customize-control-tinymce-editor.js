( function( $ ) {


	$.fn.WPCustomizeTinymceEditor = function( args ) {


		const { __, _x, _n, _nx } = wp.i18n;
	

		const textdomain = 'WPCustomizeTinymceEditor';


		/**
			Запускает всё
		*/
		return this.each( function( index, element ) {
			var id = jQuery( element ).attr( 'id' ).replace( /customize-control-/i, '' );
			wp.editor.initialize( id, {
				tinymce: {
					wpautop: false,
					tadv_noautop: false,
					verify_html: true,
					cleanup_on_startup: false,
					cleanup: false,
					validate_children: false,
				},
				quicktags: true,
				mediaButtons: true,
			} );
		} );


	};


} )( jQuery );