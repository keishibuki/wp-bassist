import 'viewport-extra';
import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

new Splide( '.splide', {
	type: 'fade',
	speed: 1500,
	interval: 7500,
	rewind: true,
	autoplay: true,
	arrows: false,
	pagination: false,
	drag: false,
	pauseOnHover: false,
	pauseOnFocus: false,
} ).mount();

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

/**
 * Scroll animation.
 */
const observer = new IntersectionObserver( ( entries ) => {
	Array.prototype.forEach.call( entries, ( entry ) => {
		if ( entry.isIntersecting ) {
			entry.target.classList.add( 'scrollIn' );
			entry.target.classList.remove( 'scroll' );
			observer.unobserve( entry.target );
		}
	} );
}, {
	rootMargin: '-50px',
} );

const scrolls = document.querySelectorAll( '.scroll, .fadeIn' );
scrolls.forEach( ( fadeIn ) => observer.observe( fadeIn ) );
