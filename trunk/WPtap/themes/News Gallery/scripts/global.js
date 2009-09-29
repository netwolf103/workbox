
/*

function id(idstr){
	return document.getElementById(idstr)||"";
}

function switch_display(element)
{
	if(element)
	{
		if(element.style.display=="none"||element.style.display=="")
		{
			element.style.display="block";
		}else{	
			element.style.display="none";
			
		}
	}
	return false;
}

function switch_class(element,defaultClass,switchClass)
{
	classname=element.className;
	if(classname==defaultClass)
	{
		element.className=defaultClass+" "+switchClass;
	}else
	{
		element.className=defaultClass;
	}
}

function bind_click(element1,element2)
{
	element1.onclick=function ()
	{
		switch_display(element2);
		switch_class(element1,'extra','selected');
		return true;
	}
}

function getElementsByClassName(className, parentElement)
{
	var elems = (parentElement||document.body).getElementsByTagName("*");
	var result=[];
	for (var i=0; j=elems[i]; i++){
		if ((" "+j.className+" ").indexOf(" "+className+" ")!=-1)
		{
			result.push(j);
		}
	}
	return result;
} 


function move_element(i,element)
{
	element.style.left='\-'+i+'px';
}


function m_roll(from,to,element)
{
	var i=from;
	for(i=from;i<=to;i++)
	{
		setTimeout(function (){},6000);
		move_element(i,element);
		if(i==to){ break;}
	}	
}

current=0;

function roll(d)
{
	var lis=id('roll').getElementsByTagName('LI');
	var li_width=298;
	var ul=id('roll').getElementsByTagName('UL')[0];
	if(d=='left')
	{
		var i=0;
		current=current+1;
		if(current>=(lis.length-1)) current=lis.length-1;
		//for(i=0;i<lis.length;i++)
		//{
			//lis[i].style.left='-'+(current*li_width)+'px';
			//alert(-current*li_width);
		//}
		id('roll').getElementsByTagName('UL')[0].style.left='-'+(current*li_width)+'px';
		
		//m_roll(302,604,ul);
	}
	
	if(d=='right')
	{
		var i=0;
		current=current-1;
		if(current<=0) current = 0;
		//for(i=0;i<lis.length;i++)
		//{
			id('roll').getElementsByTagName('UL')[0].style.left='-'+(current*li_width)+'px';
		//}
	}
}
















window.onload=function (){
	
	//search 
	if(id('search'))
	{
		id('search').onclick=function ()
		{
			switch_display(id('searchform'));
		}
	}
	
	//categories
	if(id('categories'))
	{
		id('categories').onclick=function ()
		{
			switch_display(id('categoriesbox'));
		}
	}
	
	//login
	if(id('login'))
	{
		id('login').onclick=function ()
		{
			switch_display(id('loginform'));
		}
	}
	
	//menu
	if(id('menu'))
	{
		id('menu').onclick=function ()
		{
			switch_display(id('menubox'));
		}
	}
	
	//menu
	if(id('pages'))
	{
		id('pages').onclick=function ()
		{
			switch_display(id('pagesbox'));
		}
	}
	
	
	//article extenstion
	var elements=getElementsByClassName('article');
	var j=elements.length;
	for(var i=0;i<elements.length;i++)
	{
		var element_a=getElementsByClassName('extra',elements[i])[0];
		var element_entry = getElementsByClassName('entry',elements[i])[0];
		bind_click(element_a,element_entry);
	}
	
	if(id('roll-left'))
	{
		id('roll-left').onclick=function ()
		{
			roll('left');
		}
	}
	if(id('roll-right'))
	{
		id('roll-right').onclick=function ()
		{
			roll('right');
		}
	}
}
*/



jQuery(document).ready(function($) {
	
	//slideshow
	$('#featured-slideshow').cycle({
		fx: 'fade',
		speed: 250,
		next: '#controls .next',
		prev: '#controls .prev',
		timeout: 6000,
		width:"100%"
	});
	
	//navigation
	$('#search').click(function (){ $('#searchform').toggle();return false;});
	$('#login').click(function (){ $('#loginform').toggle();return false;});
	$('#pages').click(function (){ $('#pagesbox').toggle();return false;});
	$('#categories').click(function (){ $('#categoriesbox').toggle();return false;});
	
	//bookmark-it
	$('.bookmark-it').click(function (){ $('#sbookmarks').toggle();return false;});
	
	//article extra
	$('.article').each(function (){
		var ele=$(this);
		ele.find('.extra').click(function(){
			$(this).toggleClass('selected');
			ele.find('.entry').toggle();
			return false;
		} );
	});
});
