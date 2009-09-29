<?php

function roamfox_related_posts()
{
	$array_tags=get_the_tags();
	$tags="";
	
	if(is_array($array_tags))
	{
		foreach($array_tags as $tag)
		{
			$tags[]=$tag->slug;	
				
		}
	}
	$not_in[]=get_the_ID();
	$param=array(
		'tag_slug__in' => $tags,
		'post__not_in' => $not_in
	);

	@query_posts($param);
	if(have_posts()){
?>
	<div id="related-posts">
		<h3>Related Posts:</h3>
		<ol>
<?php
		while(have_posts())
		{
			the_post();
			echo '<li><a href="';
			the_permalink();
			echo '">';
			the_title();
			echo '</a></li>';
		}
?>
		
	</div>
<?php
	}
	wp_reset_query();
}
?>