(function($){

	$(document).ready(function(){

		/* 首页弹出效果
		**************************************************************/
		var setGrid = function () {
			return $(".grid").vgrid({
				easeing: "easeOutQuint",
				time: 800,
				delay: 60,
				forceAnim: 1
			});
		};
		setTimeout(setGrid, 300);

		$(window).load(function(e){
			setTimeout(function(){ 
				$(".grid").css("height", "auto");
				$(".grid .grid-item").css("position", "static");
			}, 1000);
		})
	});

})(jQuery);