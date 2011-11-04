<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="content" style="width:930px;">
    <form action="/team/buy.php?id=<?php echo $team['id']; ?>" method="post" class="validator">
	<input id="deal-per-number" value="<?php echo $team['per_number']; ?>" type="hidden" />
    <div id="deal-buy" class="box">
        <div class="box-top"></div>
        <div class="box-content">
            <div class="head"><h2>提交参团信息
          
            </h2></div>
            <div class="sect">
            

			<?php if($team['delivery']=='express'){?>
			<div class="expresstip"><?php echo nl2br(htmlspecialchars($team['express'])); ?></div>
			<div class="wholetip clear"><h3>快递信息</h3></div>
			<div class="field username">
				<label>收件人</label>
				<input type="text" size="30" name="realname" id="settings-realname" class="f-input" value="<?php echo $login_user['realname']; ?>" require="true" datatype="require" />
				<span class="hint">收件人请与有效证件姓名保持一致，便于收取物品</span>
			</div>
			<div class="field mobile">
				<label>手机号码</label>
				<input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" require="true" datatype="mobile" maxLength="11" /> <span class="inputtip">手机号码是我们联系您最重要的方式，请准确填写</span>
			</div>
				<div class="field username">
				<label>收件地址</label>
				<input type="text" size="30" name="address" id="settings-address" class="f-input" value="<?php echo $login_user['address']; ?>" require="true" datatype="require" />
				<span class="hint">为了能及时收到物品，请按照格式填写：_省_市_县（区）_</span>
			</div>
			<div class="field mobile">
				<label>邮政编码</label>
				<input type="text" size="30" name="zipcode" id="settings-mobile" class="number" value="<?php echo $login_user['zipcode']; ?>" require="true" datatype="zip" maxLength="6" />
			</div>
			<?php } else { ?>
			<div class="field mobile">
				<label>手机号码</label>
				<input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" require="require" datatype="mobile" maxLength="11" /><span class="inputtip">输入手机号码后，您的手机将会收到此项目的电子优惠券。（可为朋友代参）</span>
			</div>
			<?php }?>
			<div class="wholetip clear"><h3>附加信息</h3></div>
			
			<?php if(is_array($team['condbuy']) && !empty($team['condbuy'][0])){?>
			<div class="field mobile">
				<label>订购选择</label>
				<?php if(is_array($team['condbuy'])){foreach($team['condbuy'] AS $index=>$one) { ?>
				<select name="condbuy[]" class="f-input" style="width:auto;"><?php echo Utility::Option(array_combine($one, $one), 'condbuy'); ?></select> 
				<?php }}?>
			</div>
			<?php }?>
			<div class="field mobile" >
				<label>参团附言</label>
				<textarea name="remark" style="width:500px;height:80px;padding:2px;"><?php echo htmlspecialchars($order['remark']); ?></textarea>
			</div>
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
			<div style="width:700px; padding-left:50px;"><input type="submit" class="formbutton" name="buy" value="确认无误，参团"/></div>
            </div>
        </div>
        <div class="box-bottom"></div>
    </div>
    </form>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<script>
/*window.x_init_hook_dealbuy = function(){
	X.team.dealbuy_farefree(<?php echo abs(intval($order['quantity'])); ?>);
	X.team.dealbuy_totalprice();
};*/
</script>
<?php include template("footer");?>
