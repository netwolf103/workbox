<?php include template("html_header");?>

<div id="hdw">
	<div id="hd">
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="204"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="indexs"><a href="javascript:;" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.fangtuanzhang.com/')" >设为首页</a>
    <a href="javascript:;" onclick="window.external.addFavorite('http://www.fangtuanzhang.com/','房团长 - 在线团房网|西安房地产网|在线团购|西安房地产');">加入收藏</a></div></td>
      </tr>
      <tr>
        <td><a href="/index.php" class="link"><img src="/static/css/i/logo.gif" alt="<?php echo $INI['system']['sitename']; ?>" /></a></td>
      </tr>
    </table></td>
    <td width="413"></td>
    <td width="333"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="vcoupon"><a class="sms" onclick="X.miscajax('sms','subscribe');">&raquo; 短信订阅，免费！</a>&nbsp; <a class="sms" onclick="X.miscajax('sms','unsubscribe');">&raquo; 取消订阅</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
        		<div id="header-subscribe-body" class="subscribe">
		<form action="/subscribe.php" method="post" id="header-subscribe-form">
			<label for="header-subscribe-email" class="text">想知道明天的团购是什么吗？</label>
			<input type="hidden" name="city_id" value="<?php echo $city['id']; ?>" />
			<input id="header-subscribe-email" type="text" xtip="输入Email，订阅每日团购信息..." value="" class="f-text" name="email" />
			<input type="hidden" value="1" name="cityid" />
			<input type="submit" class="commit" value="订阅" />
		</form>
		</div>
        </td>
      </tr>
    </table></td>
  </tr>
</table>

       
		<ul id="menu"><?php include template("block_navigator");?></ul>
    

		<div class="logins">
		<?php if($login_user){?>
			<ul class="links">
				<li class="username">欢迎您，<?php echo mb_strimwidth($login_user['username'],0,10); ?>！</li>
				<li class="account"><a href="/order/index.php" id="myaccount" class="account">我的<?php echo $INI['system']['abbreviation']; ?></a></li>
				<li class="logout"><a href="/account/logout.php">退出</a></li>
			</ul>
		<?php } else { ?>
			<ul class="links">
				<li class="login"><a href="/account/login.php">登录</a></li>
				<li class="signup"><a href="/account/signup.php">注册</a></li>
			</ul>
		<?php }?>
			<div class="line islogin"></div>
		</div>
	<?php if($login_user){?>
		<ul id="myaccount-menu"><?php echo current_account(null); ?></ul>
	<?php }?>
	</div>
</div>


<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>

<div id="searchBar">
      <dl id="businessBar">
        <dd>
          <div class="business">
          <a>按价格筛选： </a>
          <a href="/team/Price_fl.php?Price=0" >4000元/㎡ 以下</a> 
          <a href="/team/Price_fl.php?Price=1" >4000-5000元/㎡ </a> 
          <a href="/team/Price_fl.php?Price=2" >5000-6000元/㎡ </a> 
          <a href="/team/Price_fl.php?Price=3" >6000-7000元/㎡ </a> 
          <a href="/team/Price_fl.php?Price=4" >7000-8000元/㎡ </a> 
          <a href="/team/Price_fl.php?Price=6" >9000-10000元/㎡ </a> 
          <a href="/team/Price_fl.php?Price=7" >10000元/㎡ 以上</a> 
          <a href="/team/Price_fl.php" >全部</a> 

          </div>
        </dd>
      </dl>
</div>
