(function($){
	$.fn.tab = function(contents) {
		var tabs = $(this);
		var contents = $(contents);

		tabs.each(function(i){
			$(this).click(function(){
				tabs.each(function(){
					$(this).removeClass("current");
				});
					
				$(this).addClass("current");

				contents.each(function(){
					$(this).css('display', 'none');
				});

				$(contents[i]).css('display', 'block');
			});
		});
	};
})(jQuery);