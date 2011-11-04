<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="recent-deals" style="width:960px; padding-bottom:20px;">

   <div id="content" style="width:950px; ">
<div class="box">

 <div class="head"><h2>根据价格 <?php echo $Price_qu; ?> 筛选结果： </h2></div>

<ul class="Price-list">
<?php if(is_array($goods)){foreach($goods AS $index=>$one) { ?>
<div class="item odd">
<!--城市ico-->
<div class="cityIco1"><img src="/static/img/Ico/<?php echo $one['group_id']; ?>.png"/></div>
<!--城市end-->
<div style="height:50px;overflow:hidden;"><a href="/team.php?id=<?php echo $one['id']; ?>"><?php echo $one['title']; ?></a></div>
<div class="cover">
<?php if($detail[$team['id']]['is_today']){?>
<a class="new pngfix" title="点击查看详情" href="/team.php?id=<?php echo $one['id']; ?>" rel="nofollow"></a>
<?php }?>
<a title="<?php echo $one['title']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" rel="nofollow"><img src="<?php echo team_image($one['image']); ?>" width="290"  title="点击查看详情" alt=""></a>
</div>
					<div class="inner">
						<div class="deal-buy">
							<div class="deal-price-tag-open"></div>
							<div class="deal-price-tag"></div>
							<p class="deal-price"><strong><?php echo $currency; ?><?php echo moneyit($one['team_price']); ?></strong><span><a href="/team.php?id=<?php echo $team['id']; ?>" rel="nofollow"></a></span> </p>
						</div>
						<table class="discount"><tbody>
							
								<th style="font-size:11px">原均价</th>
								<td ><del><strong><?php echo $currency; ?><?php echo moneyit($one['market_price']); ?></strong></del></td>
							</tr>
							
                            <tr>
								<th style="font-size:11px">现起价</th>
								<td class="price"><strong><?php echo $currency; ?><?php echo moneyit($one['team_price']); ?></strong></td>

							<tr>
                            </tr>
                            	<tr height="10">
								<th>&nbsp;</th>
								<td>&nbsp;</td>
							</tr>
						</tbody></table>
						
						
					</div>
				</div>
					<?php }}?>
					</ul>
					<div class="clear"></div>
					<div style=" width:863px; margin-left:auto; margin-right:auto;"><?php echo $pagestring; ?></div>
				
           
            
        </div>
    </div>

</div>
    </div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
