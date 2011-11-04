(function($){

	$(document).ready(function(){

		/* 首页弹出效果
		**************************************************************/
		var setGrid = function () {
			return $("#grid-wrapper").vgrid({
				easeing: "easeOutQuint",
				time: 800,
				delay: 60,
				forceAnim: 1
			});
		};
		setTimeout(setGrid, 300);


	});

})(jQuery);