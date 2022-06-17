window.addEventListener( 'load', function() {
	const activeClass = 'open-drawer';
	const body = document.querySelector( 'body' );
	const mainNavigation = document.querySelector( '#primary-menu' );
	const primaryButton = document.querySelector( '#primary-menu-toggle' );

	primaryButton
		.addEventListener( 'click', function( e ) {
			e.preventDefault();
			console.log( 'aaaaaaaaaa' );
			e.target.classList.toggle( activeClass );
			mainNavigation.classList.toggle( activeClass );
			body.classList.toggle( activeClass );
		} );
} );
