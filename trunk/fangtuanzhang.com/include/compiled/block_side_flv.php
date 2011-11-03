<?php if($team['flv']){?>
<?php 
	$flvswf = preg_match('#swf$#i', $team['flv']); 
	$flvheight = $flvswf ? 210 : 173;
; ?>
<div class="sbox">
	<div id="team_<?php echo $team['id']; ?>_player" style="height:400px;width:500px;"><img src="<?php echo team_image($team['image']); ?>" height="400" width="500" /></div>
</div>
<script>
window.x_init_hook_player = function() {
<?php if($flvswf){?>
	var fo = new SWFObject("<?php echo $team['flv']; ?>", "flv_player", "100%", "100%", 7, "#FFFFFF");
<?php } else { ?>
	var fo = new SWFObject("<?php echo WEB_ROOT; ?>/static/img/player.swf", "flv_player", "100%", "100%", 7, "#FFFFFF");
	fo.addParam("flashvars", "file=<?php echo team_image($team['flv']); ?>&amp;stretching=fill&amp;image=<?php echo team_image($team['image']); ?>");
<?php }?>
	fo.addParam("wmode","transparent");
	fo.addParam("allowscriptaccess","always");
	fo.addParam("allowfullscreen","true");
	fo.addParam("quality","high");
	fo.write("team_<?php echo $team['id']; ?>_player");
}
</script>
<?php }?>
