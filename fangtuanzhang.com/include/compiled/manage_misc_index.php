<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>首页</h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>今日数据</h3></div>
					<div style="margin:0 20px;">
						<p>今日注册用户数：<?php echo $user_today_count; ?></p>
						<p>今日团购订单数：<?php echo $order_today_count; ?>，支付订单：<?php echo $order_today_pay_count; ?>，未付订单：<?php echo $order_today_unpay_count; ?></p>
						<p>今日在线支付：<?php echo $income_pay; ?></p>
						<p>今日在线充值：<?php echo $income_charge; ?></p>
						<p>今日线下充值：<?php echo $income_store; ?></p>
						<p>今日用户提现：<?php echo $income_withdraw; ?></p>
					</div>
					<div class="wholetip clear"><h3>统计数据</h3></div>
					<div style="margin:0 20px;">
						<p>团购项目数：<?php echo $team_count; ?></p>
						<p>用户注册数：<?php echo $user_count; ?></p>
						<p>团购订单数：<?php echo $order_count; ?></p>
						<p>邮件订阅数：<?php echo $subscribe_count; ?></p>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
