﻿//城市下拉构造函数
jQuery(function(){$("#changeCity").click(function(c){$("#allCity").slideToggle(300,function(){});c.stopPropagation();$(this).blur()});$("#allCity ul li:gt(59)").hide();$("#allCity").click(function(c){c.stopPropagation()});$(document).click(function(c){c.button!=2&&$("#allCity").slideUp(300)});$("#foldin").click(function(){$("#allCity").slideUp(300)});var a=$("#allCity ul li");$("#allCity .city-fitler a").click(function(){$("#allCity .city-fitler a").removeClass("cur");$(this).addClass("cur")});window.filterCity=
function(c){if(c==0){a.show();$("#showMore").hide();$("#allCity .city-fitler a").removeClass("cur");$("#allCity .city-fitler a.all").addClass("cur")}else if(c==1){a.show();$("#allCity ul li:gt(59)").hide();$("#showMore").show()}else{a.each(function(){$(this).attr("letter")==c?$(this).show():$(this).hide()});$("#showMore").hide()}}});