window.addEventListener( 'load', function() {
	const activeClass = 'open-drawer';
	const body = document.querySelector( 'body' );
	const mainNavigation = document.querySelector( '#primary-menu' );
	const primaryButtons = document.querySelectorAll( '.primary-menu-toggle' );

	primaryButtons.forEach( ( button ) => {
		button.addEventListener( 'click', function( e ) {
			e.preventDefault();
			primaryButtons.forEach( ( pb ) => {
				pb.classList.toggle( activeClass );
			} );
			mainNavigation.classList.toggle( activeClass );
			body.classList.toggle( activeClass );
		} );
	} );
} );
