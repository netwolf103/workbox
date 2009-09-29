(function($){
	$.fn.selectIcon = function(icons, siteIcon) {
		var current = this;

		$(icons).each(function(){
			$(this).mouseover(function(){
				$(this).css('cursor', 'pointer');
			});

			$(this).click(function(){
				$(siteIcon).val($(this).attr('alt'));
				current.attr('src', $(this).attr('src'));
			});
		});
	}
})(jQuery);


(function($){
	$.fn.enable = function(domElem) {
		if(!$(this).attr('checked')) {
			$(domElem).each(function(){
				$(this).attr({disabled:true});
			});
		}

		$(this).change(function(){
			if($(this).attr('checked')) {
				$(domElem).each(function(){
					$(this).attr({disabled:false});
				});
			} else {
				$(domElem).each(function(){
					$(this).attr({disabled:true});
				});
			}
		});
	}
})(jQuery);

(function($){
	$.fn.wptap_ajax = function(form) {
		$(this).click(function(){
			var data = '';

			$(form).each(function(){
				if($(this).attr('type')) {
					switch($(this).attr('type')) {
						case 'radio':
						case 'checkbox':
							if($(this).attr('checked')) {
								data += $(this).attr('name') + ":\"" + $(this).val() + "\",";
							}
						break;

						default:
							data += $(this).attr('name') + ":\"" + $(this).val() + "\",";
						break;
					}
				}
			});

			data = data.substr(0, data.length-1);alert(data);
			data = eval("({" + data + "})");

			url = '/wordpress/wp-admin/admin.php?page=wptap-options';

			$.ajax({
				type:'POST',
				url:url,
				data:data,
				success:function(msg){
					alert('success');
				}
			});
		});
	}
})(jQuery);

jQuery(document).ready(function($){
	$("div#wptap-tab ul li").tab("div.wptap-setting-content"); // Tab

	$('#current-icon').selectIcon("img[id^='icon-']", "#site-icon"); // Icons

	$('#enable-ad').enable($("input[name^='ad_'], #ad-class, #ad-code")); // AD

	$("input[id='show-slider']").enable($("input[id='slider-number'], select[name='cat_id']")); // Slider Picture Number 

	$("input[id='show-thumb']").enable($("input[id='thumb-width'], input[id='thumb-height']")); // show thumb

	//var picker = $.farbtastic('#picker');
	//$('.setting-color').each(function() { picker.linkTo(this); }).focus(function() {picker.linkTo(this);}); // Palette

	//$('#wptap-submit').wptap_ajax($('#wptap-form input, #wptap-form select, #wptap-form radio')); // Ajax
});