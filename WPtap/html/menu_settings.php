<?php
/**
 * WPtap menu set page.
 *
 * @package WPtap
 * @subpackage admin
 */
?>
<div class="wptap-setting-content" id="wptap-setting-menu">
	<h3>Menu Setting</h3>
	<table>
		<tr>
			<td>Include Rss?</td>
			<td width="50"></td>
			<td><input type="checkbox" name="include_rss" id="include-rss" <?php if(isset($wptap_setting['include_rss']) && $wptap_setting['include_rss'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Include E-Mail?</td>
			<td></td>
			<td><input type="checkbox" name="include_email" id="include-email" <?php if(isset($wptap_setting['include_email']) && $wptap_setting['include_email'] === 1) echo 'checked'; ?>></td>
		</tr>
		<tr>
			<td>Include Pages?</td>
			<td></td>
			<td><input type="checkbox" name="include_pages" id="include-pages" <?php if(isset($wptap_setting['include_pages']) && $wptap_setting['include_pages'] === 1) echo 'checked'; ?>></td>
		</tr>
	</table>
	<hr>
</div>