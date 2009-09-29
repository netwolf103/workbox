<?php
/**
 * WPtap style set page.
 *
 * @package WPtap
 * @subpackage admin
 */
?>
<div class="wptap-setting-content" id="wptap-setting-style-color">
	<h3>Style Color Setting</h3>
	<table>
		<tr>
			<td>Header Background Color:</td>
			<td width="50"></td>
			<td><input type="text" name="header_background_color" id="header-background-color" size="7" value="<?php if(isset($wptap_setting['header_background_color'])) echo $wptap_setting['header_background_color']; ?>" class="setting-color"></td>
			<td></td>
			<td rowspan="5"><div id="picker"></div></td>
		</tr>
		<tr>
			<td>Header Font Color:</td>
			<td></td>
			<td><input type="text" name="header_font_color" id="header-font-color" size="7" value="<?php if(isset($wptap_setting['header_font_color'])) echo $wptap_setting['header_font_color']; ?>" class="setting-color"></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Footer Background Color:</td>
			<td></td>
			<td><input type="text" name="footer_background_color" size="7" value="<?php if(isset($wptap_setting['footer_background_color'])) echo $wptap_setting['footer_background_color']; ?>" class="setting-color"></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Footer Font Color:</td>
			<td></td>
			<td><input type="text" name="footer_font_color" size="7" value="<?php if(isset($wptap_setting['footer_font_color'])) echo $wptap_setting['footer_font_color']; ?>" class="setting-color"></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Page Background Color:</td>
			<td></td>
			<td>
				<input type="text" name="page_background_color" size="7" value="<?php if(isset($wptap_setting['page_background_color'])) echo $wptap_setting['page_background_color']; ?>" class="setting-color">
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Page Background Picture:</td>
			<td></td>
			<td>
				<input type="text" name="page_background_image" size="50" value="<?php if(isset($wptap_setting['page_background_image'])) echo $wptap_setting['page_background_image']; ?>">
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Post Background Color:</td>
			<td></td>
			<td><input type="text" name="post_background_color" size="7" value="<?php if(isset($wptap_setting['post_background_color'])) echo $wptap_setting['post_background_color']; ?>" class="setting-color"></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<hr>
</div>