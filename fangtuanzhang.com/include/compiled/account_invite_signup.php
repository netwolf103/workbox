<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="referrals">
    <div id="content">
        <div class="box clear">
                    <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>邀请有奖</h2></div>
                <div class="sect">
                <p class="intro">当好友接受您的邀请，在<?php echo $INI['system']['sitename']; ?>上首次成功购买，系统返还 <?php echo $INI['system']['invitecredit']; ?> 元到您的<?php echo $INI['system']['sitename']; ?>电子账户，下次团购时可直接用于支付。没有数量限制，邀请越多，返利越多。</p>
                            <p class="login">请先 <a href="/account/login.php?r=<?php echo $currefer; ?>">登录</a> 或者 <a href="/account/signup.php">注册</a>，获取您的专用邀请链接。</p>
        				                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
		<?php include template("block_side_invitetip");?>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
