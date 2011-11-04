<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="content">
    <div id="deal-buy" class="box">
        <div class="box-top"></div>
        <div class="box-content">
            <div class="head"><h2>您的参团信息
          
          </h2></div>
            <div class="sect">
                <table class="order-table" style="display:none">
                    <tr>
                        <th class="deal-buy-desc">项目名称</th>
                        <th class="deal-buy-quantity">数量</th>
                        <th class="deal-buy-multi"></th>
                        <th class="deal-buy-price">价格</th>
                        <th class="deal-buy-equal"></th>
                        <th class="deal-buy-total">总价</th>
                    </tr>
                    <tr>
                        <td class="deal-buy-desc"><?php echo $team['title']; ?></td>
                        <td class="deal-buy-quantity"><?php echo $order['quantity']; ?></td>
                        <td class="deal-buy-multi">x</td>
                        <td class="deal-buy-price" id="deal-buy-price"><span class="money"><?php echo $currency; ?><span><?php echo moneyit($order['price']); ?></td>
                        <td class="deal-buy-equal">=</td>
                        <td class="deal-buy-total" id="deal-buy-total"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['price']*$order['quantity']); ?></td>
                    </tr>
					<?php if($team['delivery']=='express'){?>
					<tr>
						<td class="deal-buy-desc">快递</td>
						<td class="deal-buy-quantity"></td>
						<td class="deal-buy-multi"></td>
						<td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><span id="deal-express-price"><?php echo $order['fare']; ?></span></td>
						<td class="deal-buy-equal">=</td>
						<td class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><span id="deal-express-total"><?php echo ($team['farefree']==0||$order['quantity']<$team['farefree'])?$order['fare']:0; ?></span></td>
					</tr>
					<?php }?>
					<?php if($order['card']>0){?>
				   <tr id="cardcode-row">
						<td class="deal-buy-desc">代金券：<span id="cardcode-row-n"><?php echo $order['card_id']; ?></span></td>
						<td class="deal-buy-quantity"></td>
						<td class="deal-buy-multi"></td>

						<td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['card']); ?></td>
						<td class="deal-buy-equal">=</td>
						<td class="deal-buy-total">-<span class="money">¥</span><span id="cardcode-row-t"><?php echo $order['card']; ?></span></td>
					</tr>
					<?php }?>

					<tr class="order-total">
                        <td class="deal-buy-desc"><strong>应付总额：</strong></td>
                        <td class="deal-buy-quantity"></td>
                        <td class="deal-buy-multi"></td>
                        <td class="deal-buy-price"></td>
                        <td class="deal-buy-equal">=</td>
                        <td class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><?php echo $order['origin']; ?></td>
                    </tr>
                </table>
				<div class="paytype">
                <form action="/order/pay.php" method="post" class="validator">
				<div class="order-check-form ">
					<div class="order-pay-credit" style="display:none">
						<h3>您的余额</h3>
						<p>账户余额：<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($login_user['money']); ?></strong> <?php if(false==$credityes){?>，您的余额不够完成本次付款，还需支付 <strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['origin']-$login_user['money']); ?></strong>。<?php if($creditonly){?>请赶紧去<a href="/credit/charge.php">充值</a>。<?php } else { ?>请选择支付方式：<?php }?><?php } else { ?>，您的余额足够本次购买，请直接确认订单，完成付款。<?php }?></p>
						<div class="other_pay"><?php echo $INI['other']['pay']; ?></div>
					</div>  

				<?php if(false==$creditonly && false==$credityes){?>
					<ul class="typelist">
					<?php if($INI['alipay']['mid']){?>
						<li><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">支付宝交易，推荐淘宝用户使用</label></li>
					<?php }?>
					<?php if($INI['tenpay']['mid']){?>
						<li><input id="check-tenpay" type="radio" name="paytype" value="tenpay" <?php echo $ordercheck['tenpay']; ?> /><label for="check-tenpay" class="tenpay">财付通交易，推荐拍拍用户使用</label></li>
					<?php }?>
					<?php if($INI['yeepay']['mid']){?>
						<li><input id="check-yeepay" type="radio" name="paytype" value="yeepay" <?php echo $ordercheck['yeepay']; ?> /><label for="check-yeepay" class="yeepay">易宝支付，人民币支付网关</label></li>
					<?php }?>
					<?php if($INI['bill']['mid']){?>
						<li><input id="check-bill" type="radio" name="paytype" value="bill" <?php echo $ordercheck['bill']; ?> /><label for="check-bill" class="bill">快钱交易，助您生活娱乐更加便捷</label></li>
					<?php }?>
					<?php if($INI['chinabank']['mid']){?>
						<li><input id="check-chinabank" type="radio" name="paytype" value="chinabank" <?php echo $ordercheck['chinabank']; ?> /><label for="check-chinabank" class="chinabank">网银支付交易，支持招商、工行、建行、中行等主流银行</label></li>
					<?php }?>
					<?php if($INI['paypal']['mid']){?>
						<li><input id="check-paypal" type="radio" name="paytype" value="paypal" <?php echo $ordercheck['paypal']; ?> /><label for="check-paypal" class="paypal">PayPal, Recommended</label></li>
					<?php }?>
					</ul>

		<?php if($INI['tenpay']['mid']&&'Y'==$INI['tenpay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($paybank)){foreach($paybank AS $one) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $one; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>

		<?php if($INI['yeepay']['mid']&&'Y'==$INI['yeepay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($yeepaybank)){foreach($yeepaybank AS $one=>$pid) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $pid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>

					<?php } else { ?>
					<input type="hidden" name="paytype" value="credit" />
					<?php }?>

					<?php if($credityes || false==$creditonly){?>
					<div class="clear"></div>
					<p class="check-act">
					<input type="hidden" name="order_id" value="<?php echo $order['id']; ?>" />
					<input type="hidden" name="team_id" value="<?php echo $order['team_id']; ?>" />
					<input type="hidden" name="cardcode" value="" />
					<input type="hidden" name="quantity" value="<?php echo $order['quantity']; ?>" />
					<input type="hidden" name="address" value="<?php echo $order['address']; ?>" />
					<input type="hidden" name="express" value="<?php echo $order['express']; ?>" />
					<input type="hidden" name="remark" value="<?php echo $order['remark']; ?>" />
					<input type="submit" value="确认无误，参团" class="formbutton" />
					<?php if(false==$credityes){?>
					<input type="button" value="确认订单，以后再付款" class="formbutton" onclick="location.href='index.php';" />
					<?php }?>
					<?php }?>
					</p>
					</div>
					</form>
					</div>
					</div>
					</div>
					<div class="box-bottom"></div>
					</div>
					</div>
					<div id="sidebar">
					<?php if(!$order['card_id']){?>
					<?php include template("block_side_card");?>
					<?php }?>
					</div>
					</div> <!-- bd end -->
					</div> <!-- bdw end -->

					<?php include template("footer");?>
