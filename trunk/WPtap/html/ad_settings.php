<?php
/**
 * WPtap advertisement set page.
 * 
 * @package WPtap
 * @subpackage admin
 */
?>

<div class="wptap-setting-content" id="ad-setting-content">
	<h3>Advertisement Setting</h3>
	<table>
		<tr>
			<td>Enable ADs?</td>
			<td width="50"></td>
			<td><input type="checkbox" name="enable_ad" id="enable-ad" <?php if(isset($wptap_setting['enable_ad']) && $wptap_setting['enable_ad']==1) echo 'checked'; ?>></td>
		</tr>
		<!--<tr>
			<td>AD Position on Home Page?</td>
			<td></td>
			<td>
				<input type="radio" name="ad_position" value="top" <?php if(isset($wptap_setting['ad_position']) && $wptap_setting['ad_position'] == 'top') echo 'checked'; ?>> Top
				<input type="radio" name="ad_position" value="bottom" <?php if(isset($wptap_setting['ad_position']) && $wptap_setting['ad_position'] == 'bottom') echo 'checked'; ?>> Bootom
			</td>
		</tr>-->
		<tr>
			<td>AD Position in Posts?</td>
			<td></td>
			<td>
				<input type="radio" name="ad_post_position" value="top" <?php if(isset($wptap_setting['ad_post_position']) && $wptap_setting['ad_post_position'] == 'top') echo 'checked'; ?>> Top
				<input type="radio" name="ad_post_position" value="bottom" <?php if(isset($wptap_setting['ad_post_position']) && $wptap_setting['ad_post_position'] == 'bottom') echo 'checked'; ?>> Bootom
			</td>
		</tr>
		<tr>
			<td>ADs Program</td>
			<td></td>
			<td>
				<select name="ad_class" id="ad-class">
					<option value="google" <?php if(isset($wptap_setting['ad_class']) && $wptap_setting['ad_class'] == 'google') {echo 'selected';} ?>>Google</option>
					<option value="admob" <?php if(isset($wptap_setting['ad_class']) && $wptap_setting['ad_class'] == 'admob') {echo 'selected';} ?>>Admob</option>
					<option value="other" <?php if(isset($wptap_setting['ad_class']) && $wptap_setting['ad_class'] == 'other') {echo 'selected';} ?>>Other</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>ADs Type?</td><td></td><td><input type="radio" name="ad_type" value="1" <?php if(isset($wptap_setting['ad_type']) && $wptap_setting['ad_type'] == 1) echo 'checked'; ?>> Code <input type="radio" name="ad_type" value="2" <?php if(isset($wptap_setting['ad_type']) && $wptap_setting['ad_type'] == 2) echo 'checked'; ?>> ID</td>
		</tr>
		<tr>
			<td colspan="3" style="font-style:italic;">Please enter your publisher ID or Scripts.</td>

		</tr>
		<tr>
			<td>Publisher ID</td>
			<td></td>
			<td><input type="text" name="ad_id" id="ad-id" value="<?php if(isset($wptap_setting['ad_id'])) echo $wptap_setting['ad_id']; ?>"></td>
		</tr>
		<tr>
			<td>(Or) AD Script</td>
			<td></td>
			<td><textarea name="ad_code" id="ad-code" cols="50" rows="7"><?php if(isset($wptap_setting['ad_code']))echo stripslashes($wptap_setting['ad_code']); ?></textarea></td>
		</tr>
	</table>
</div>