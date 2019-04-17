/**
 * ------------------------------------
 * Neville Extensions Admin Scripts
 * ------------------------------------
 */
var $ = window.jQuery;

window.NEVILLEXAdmin = {
	/**
	 * Initiazlie
	 *
	 * @since 1.0.0
	 * @return {Void}
	 */
	init : function() {
		var self = this;

		self.titleDesign();
	},

	/**
	 * Title Design Module initialize
	 * @return {Void}
	 */
	titleDesign : function() {
		var tde   = $( '#nevillex-tde' ),
		    title = $( '#title' );

		/* Do nothing if we can't find this id */
		if( ! tde.length ) return;

		/* Disable the "Enter" button and make sure the textarea isn't multiline */
		tde.bind( 'keypress', function( e ) {
			if ( ( e.keyCode || e.which ) === 13 ) {
				e.preventDefault();
			}
		});

		/* Add the text from `title` field into our input */
		title.bind( 'input', function( e ) {
			var current = $( this ).val();
			tde.val( current );
		});
	},
}

$( document ).ready( function ( $ ) {
	var nevillexadmin = window.NEVILLEXAdmin;

	/**
	 * Initialise Neville Extensions Admin
	 */
	nevillexadmin.init();
});
