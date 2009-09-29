<?php
/**
 * WPtap thumb picture set page.
 *
 * @package WPtap
 * @subpackage admin
 */
?>

<div class="wptap-setting-content" id="wptap-setting-thumb">
	<h3>Thumb Setting</h3>
	<table>
		<tr>
			<td>Thumb Width:</td>
			<td width="50"></td>
			<td><input type="text" name="thumb_width" value="<?=$wptap_setting['thumb_width']?>">px</td>
		</tr>
		<tr>
			<td>Thumb Height:</td>
			<td></td>
			<td><input type="text" name="thumb_height" value="<?=$wptap_setting['thumb_height']?>">px</td>
		</tr>
	</table>
	<hr>
</div>