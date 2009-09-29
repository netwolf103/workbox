<?php
/**
 * WPtap header set page.
 *
 * @package WPtap
 * @subpackage admin
 */
?>

<?php $orders = isset($wptap_setting['menus']) ? array_flip($wptap_setting['menus']) : array(); ?>
<div class="wptap-setting-content" id="wptap-header-global">
	<h3>Header Setting</h3>
	<table style="text-align:left;">
		<tr>
			<th>Menu</th><th></th><th>Yes?</th><th></th><th>Order</th>
		</tr>
		<tr>
			<td colspan="5" height="10"></td>
		</tr>
		<tr>
			<td>Display Home?</td>
			<td width="50"></td>
			<td><input type="checkbox" name="enable_home" <?php if(isset($wptap_setting['enable_home']) && $wptap_setting['enable_home'] === 1) echo 'checked'; ?>></td>
			<td width="20"></td>
			<td></td>
		</tr>
		<tr>
			<td>Display Category?</td>
			<td width="50"></td>
			<td><input type="checkbox" name="enable_category" id="enable-category" <?php if(isset($wptap_setting['enable_category']) && $wptap_setting['enable_category'] === 1) echo 'checked'; ?>></td>
			<td></td>
			<td><input type="text" name="order_category" size="1" value="<?php if(isset($orders['enable_category'])) echo $orders['enable_category']; ?>"></td>
		</tr>
		<tr>
			<td>Display Pages?</td>
			<td></td>
			<td><input type="checkbox" name="enable_pages" <?php if(isset($wptap_setting['enable_pages']) && $wptap_setting['enable_pages'] === 1) echo 'checked'; ?>></td>
			<td></td>
			<td><input type="text" name="order_pages" value="<?php if(isset($orders['enable_pages'])) echo $orders['enable_pages']; ?>" size="1"></td>
		</tr>
		<tr>
			<td>Enable Search?</td>
			<td></td>
			<td><input type="checkbox" name="enable_search" <?php if(isset($wptap_setting['enable_search']) && $wptap_setting['enable_search'] === 1) echo 'checked'; ?>></td>
			<td></td>
			<td><input type="text" name="order_search" value="<?php if(isset($orders['enable_search'])) echo $orders['enable_search']; ?>" size="1"></td>
		</tr>
		<tr>
			<td>Enable Login/Register?</td>
			<td></td>
			<td><input type="checkbox" name="enable_login" <?php if(isset($wptap_setting['enable_login']) && $wptap_setting['enable_login'] === 1) echo 'checked'; ?>></td>
			<td></td>
			<td><input type="text" name="order_login" value="<?php if(isset($orders['enable_login'])) echo $orders['enable_login']; ?>" size="1"></td>
		</tr>
	</table>
	<hr>
</div>