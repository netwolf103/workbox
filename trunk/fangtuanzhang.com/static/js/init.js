// Easing equation, borrowed from jQuery easing plugin
// http://gsgd.co.uk/sandbox/jquery/easing/
jQuery.easing.easeOutQuart = function (x, t, b, c, d) {
	return -c * ((t=t/d-1)*t*t*t - 1) + b;
};

jQuery(function( $ ){

	
	
	/**
	 * The call below, is just to show that you are not restricted to prev/next buttons
	 * In this case, the plugin will react to a custom event on the container
	 * You can trigger the event from the outside.
	 */
	
	var $news = $('#scroll');//we'll re use it a lot, so better save it to a var.
	$news.serialScroll({
		items:'img',
		duration:700,
		force:true,
		axis:'x',
		prev:'a.prev',
		next:'a.next',
		constant:true,
		step:4,
		//interval:1, // yeah! I now added auto-scrolling
		onBefore:function( e, elem, $pane, $items, pos ){
			/**
			 * 'this' is the triggered element 
			 * e is the event object
			 * elem is the element we'll be scrolling to
			 * $pane is the element being scrolled
			 * $items is the items collection at this moment
			 * pos is the position of elem in the collection
			 * if it returns false, the event will be ignored
			 */
			 //those arguments with a $ are jqueryfied, elem isn't.
			e.preventDefault();
			if( this.blur )
				this.blur();
		},
		onAfter:function( elem ){
			//'this' is the element being scrolled ($pane) not jqueryfied
		}
	});	
});