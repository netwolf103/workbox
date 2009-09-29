<?php
/**
 * WPtap post set page.
 *
 * @package WPtap
 * @subpackage admin
 */
?>
<div class="wptap-setting-content" id="wptap-setting-post">
	<h3>Post Setting</h3>
	<table>
		<tr>
			<td>Show Author?</td>
			<td width="50"></td>
			<td><input type="checkbox"  name="show_author" <?php if(isset($wptap_setting['show_author']) && $wptap_setting['show_author'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Show Date?</td>
			<td width="50"></td>
			<td><input type="checkbox"  name="show_date" <?php if(isset($wptap_setting['show_date']) && $wptap_setting['show_date'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Show Categories?</td>
			<td></td>
			<td><input type="checkbox"  name="show_cat" <?php if(isset($wptap_setting['show_cat']) && $wptap_setting['show_cat'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Show Tags?</td>
			<td></td>
			<td><input type="checkbox"  name="show_tag" <?php if(isset($wptap_setting['show_tag']) && $wptap_setting['show_tag'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Show Thumbnail Picture?</td>
			<td></td>
			<td><input type="checkbox"  name="show_thumb" id="show-thumb" <?php if(isset($wptap_setting['show_thumb']) && $wptap_setting['show_thumb'] === 1) echo 'checked'; ?>></td>
		</tr>
		<!--<tr>
			<td style="padding-left:50px;">
				Picture Width: <input type="text" name="thumb_width" id="thumb-width" value="<?php if(isset($wptap_setting['thumb_width'])) echo $wptap_setting['thumb_width']; ?>" size="4">px <br />
				Picture Height: <input type="text" name="thumb_height" id="thumb-height" value="<?php if(isset($wptap_setting['thumb_height'])) echo $wptap_setting['thumb_height']; ?>" size="4">px			
			</td>
			<td></td>
			<td>
			</td>
		</tr>-->
		<tr>
			<td>Enable Comment?</td>
			<td></td>
			<td><input type="checkbox" name="enable_comment" <?php if(isset($wptap_setting['enable_comment']) && $wptap_setting['enable_comment'] === 1) echo 'checked'; ?>></td>
		</tr>
	</table>
	<hr>
</div>