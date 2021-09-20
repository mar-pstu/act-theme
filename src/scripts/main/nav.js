/* Навигационное меню */
jQuery( document ).ready( function () {

	jQuery( 'body' ).on( 'click', '#burger, #close, #bg', function() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#mobilenav' ).removeClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#mobilenav' ).addClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	} )

} );