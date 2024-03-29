<?php include template("header");?>
<script type="text/javascript" src="/static/js/vote.js"></script>
<div id="bdw" class="bdw">
<div id="bd" class="cf">

<div id="user-vote">
	<div id="content">
        <div class="box clear">
			<div class="box-top"></div>
			<div class="box-content">
				<div class="head">
					<h2>用户调查</h2>
				</div>
				<div class="sect">
					<p class="welcome">回答几个小问题，让<?php echo $INI['system']['abbreviation']; ?>更好的为您服务！</p>
					<form method="post" action="/vote/add.php" onsubmit="return vote_submit(this);">
						<ol class="vote-list">
							<?php if(!$question_list){?>
								暂无调查
							<?php }?>

<?php if(is_array($question_list)){foreach($question_list AS $num=>$question) { ?>
	<li id="vote-list-<?php echo $num; ?>">
		<h4 id="title<?php echo $question['id']; ?>"><?php echo $num+1; ?>、<?php echo $question['title']; ?></h4>
		<div class="choices">
			<?php if(is_array($question['options_list'])){foreach($question['options_list'] AS $index=>$options) { ?>
				<input type="<?php echo $question['type']; ?>" value="<?php echo $options['id']; ?>" id="label-<?php echo $question['id']; ?>-<?php echo $options['id']; ?>" name="vote<?php echo $question['id']; ?>[]" class="choice"/>
				<label class="text" for="label-<?php echo $question['id']; ?>-<?php echo $options['id']; ?>"><?php echo $options['name']; ?></label>
				<?php if($options['is_input']){?>
					<input type="text" class="f-text" name="input<?php echo $options['id']; ?>" id="input<?php echo $options['id']; ?>" onfocus="document.getElementById('label-<?php echo $question['id']; ?>-<?php echo $options['id']; ?>').checked = true;" onblur="document.getElementById('label-<?php echo $question['id']; ?>-<?php echo $options['id']; ?>').checked = this.value ? true : false;">
				<?php }?>
				<?php echo $options['is_br'] ? '<br>' : ''; ?>
			<?php }}?>
		</div>
	</li>
<?php }}?>





<?php if(0){?>

							<li  id="vote-list-1">
								<h4>1. 您最想团购的是？</h4>
								<div class="choices">
									<input class="choice" type="checkbox" id="label-1-1" sid="ct1" name="v1[]" value="1" /><label class="text" for="label-1-1">餐厅</label>
									<input class="choice" type="checkbox" id="label-1-2" sid="ct2" name="v1[]" value="2" /><label class="text" for="label-1-2">自助餐</label>
									<input class="choice" type="checkbox" id="label-1-3" sid="ct3" name="v1[]" value="3" /><label class="text" for="label-1-3">面包甜点</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-5" sid="ct5" name="v1[]" value="5" /><label class="text" for="label-1-5">电影票</label>
									<input class="choice" type="checkbox" id="label-1-6" sid="ct6" name="v1[]" value="6" /><label class="text" for="label-1-6">KTV</label>
									<input class="choice" type="checkbox" id="label-1-7" sid="ct7" name="v1[]" value="7" /><label class="text" for="label-1-7">演出</label>
									<input class="choice" type="checkbox" id="label-1-8" sid="ct8" name="v1[]" value="8" /><label class="text" for="label-1-8">咖啡厅</label>
									<input class="choice" type="checkbox" id="label-1-9" sid="ct9" name="v1[]" value="9" /><label class="text" for="label-1-9">酒吧</label>
									<input class="choice" type="checkbox" id="label-1-10" sid="ct10" name="v1[]" value="10" /><label class="text" for="label-1-10">游乐游艺</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-12" sid="ct12" name="v1[]" value="12" /><label class="text" for="label-1-12">美容SPA</label>
									<input class="choice" type="checkbox" id="label-1-13" sid="ct13" name="v1[]" value="13" /><label class="text" for="label-1-13">瑜伽/普拉提/舍宾/瘦身纤体</label>
									<input class="choice" type="checkbox" id="label-1-14" sid="ct14" name="v1[]" value="14" /><label class="text" for="label-1-14">美发</label>
									<input class="choice" type="checkbox" id="label-1-15" sid="ct15" name="v1[]" value="15" /><label class="text" for="label-1-15">美甲</label>
									<input class="choice" type="checkbox" id="label-1-16" sid="ct16" name="v1[]" value="16" /><label class="text" for="label-1-16">个性写真</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-18" sid="ct18" name="v1[]" value="18" /><label class="text" for="label-1-18">齿科/洗牙</label>
									<input class="choice" type="checkbox" id="label-1-19" sid="ct19" name="v1[]" value="19" /><label class="text" for="label-1-19">按摩/推拿</label>
									<input class="choice" type="checkbox" id="label-1-20" sid="ct20" name="v1[]" value="20" /><label class="text" for="label-1-20">足疗</label>
									<input class="choice" type="checkbox" id="label-1-21" sid="ct21" name="v1[]" value="21" /><label class="text" for="label-1-21">洗浴</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-23" sid="ct23" name="v1[]" value="23" /><label class="text" for="label-1-23">健身房</label>
									<input class="choice" type="checkbox" id="label-1-24" sid="ct24" name="v1[]" value="24" /><label class="text" for="label-1-24">高尔夫/网球/保龄球</label>
									<input class="choice" type="checkbox" id="label-1-25" sid="ct25" name="v1[]" value="25" /><label class="text" for="label-1-25">舞蹈</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-27" sid="ct27" name="v1[]" value="27" /><label class="text" for="label-1-27">干果零食</label>
									<input class="choice" type="checkbox" id="label-1-71" sid="ct71" name="v1[]" value="71" /><label class="text" for="label-1-71">服饰鞋包</label>
									<input class="choice" type="checkbox" id="label-1-72" sid="ct72" name="v1[]" value="72" /><label class="text" for="label-1-72">食品茶酒</label>
									<input class="choice" type="checkbox" id="label-1-73" sid="ct73" name="v1[]" value="73" /><label class="text" for="label-1-73">运动户外用品</label>
									<input class="choice" type="checkbox" id="label-1-74" sid="ct74" name="v1[]" value="74" /><label class="text" for="label-1-74">母婴儿童用品</label>
									<br />
									<input class="choice" type="checkbox" id="label-1-76" sid="ct76" name="v1[]" value="76" /><label class="text" for="label-1-76">其他（请填写，多个之间空格分隔）</label>
									<input type="text" class="f-text disabled" id="ct76" name="ct76" value="" disabled="disabled" />
								</div>
							</li>
							<li  id="vote-list-2">
								<h4>2. 您的性别：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-2-28" sid="cv2" name="v2" value="28" /><label class="text" for="label-2-28">男</label>
									<br />
									<input class="choice" type="radio" id="label-2-29" sid="cv2" name="v2" value="29" /><label class="text" for="label-2-29">女</label>
									<br />
								</div>
							</li>
							<li  id="vote-list-3">
								<h4>3. 您的年龄：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-3-30" sid="cv3" name="v3" value="30" /><label class="text" for="label-3-30"><18</label>
									<br />
									<input class="choice" type="radio" id="label-3-31" sid="cv3" name="v3" value="31" /><label class="text" for="label-3-31">19-22</label>
									<br />
									<input class="choice" type="radio" id="label-3-32" sid="cv3" name="v3" value="32" /><label class="text" for="label-3-32">23-25</label>
									<br />
									<input class="choice" type="radio" id="label-3-33" sid="cv3" name="v3" value="33" /><label class="text" for="label-3-33">26-30</label>
									<br />
									<input class="choice" type="radio" id="label-3-34" sid="cv3" name="v3" value="34" /><label class="text" for="label-3-34">31-35</label>
									<br />
									<input class="choice" type="radio" id="label-3-35" sid="cv3" name="v3" value="35" /><label class="text" for="label-3-35">36-40</label>
									<br />
									<input class="choice" type="radio" id="label-3-36" sid="cv3" name="v3" value="36" /><label class="text" for="label-3-36">>40</label><br />
								</div>
							</li>
							<li  id="vote-list-4">
								<h4>4. 婚姻状态：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-4-37" sid="cv4" name="v4" value="37" /><label class="text" for="label-4-37">单身</label>
									<br />
									<input class="choice" type="radio" id="label-4-38" sid="cv4" name="v4" value="38" /><label class="text" for="label-4-38">恋爱中</label>
									<br />
									<input class="choice" type="radio" id="label-4-39" sid="cv4" name="v4" value="39" /><label class="text" for="label-4-39">已婚</label>
									<br />
									<input class="choice" type="radio" id="label-4-40" sid="cv4" name="v4" value="40" /><label class="text" for="label-4-40">保密</label><br />
								</div>
							</li>
							<li  id="vote-list-5">
								<h4>5. 教育状况：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-5-41" sid="cv5" name="v5" value="41" /><label class="text" for="label-5-41">初中/小学</label>
									<br />
									<input class="choice" type="radio" id="label-5-42" sid="cv5" name="v5" value="42" /><label class="text" for="label-5-42">高中/中专</label>
									<br />
									<input class="choice" type="radio" id="label-5-43" sid="cv5" name="v5" value="43" /><label class="text" for="label-5-43">大学/专科</label>
									<br />
									<input class="choice" type="radio" id="label-5-44" sid="cv5" name="v5" value="44" /><label class="text" for="label-5-44">研究生以上</label><br />
								</div>
							</li>
							<li  id="vote-list-6">
								<h4>6. 职业：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-6-45" sid="cv6" name="v6" value="45" /><label class="text" for="label-6-45">国有/集体企业</label>
									<br />
									<input class="choice" type="radio" id="label-6-46" sid="cv6" name="v6" value="46" /><label class="text" for="label-6-46">私人/民营企业</label>
									<br />
									<input class="choice" type="radio" id="label-6-47" sid="cv6" name="v6" value="47" /><label class="text" for="label-6-47">外企</label>
									<br />
									<input class="choice" type="radio" id="label-6-48" sid="cv6" name="v6" value="48" /><label class="text" for="label-6-48">公务员</label>
									<br />
									<input class="choice" type="radio" id="label-6-49" sid="cv6" name="v6" value="49" /><label class="text" for="label-6-49">自由职业者</label>
									<br />
									<input class="choice" type="radio" id="label-6-50" sid="cv6" name="v6" value="50" /><label class="text" for="label-6-50">教师</label>
									<br />
									<input class="choice" type="radio" id="label-6-51" sid="cv6" name="v6" value="51" /><label class="text" for="label-6-51">学生</label>
									<br />
									<input class="choice" type="radio" id="label-6-70" sid="cv6" name="v6" value="70" /><label class="text" for="label-6-70">其他</label><input type="text" class="f-text disabled" id="cv6" cid="70" name="ct70" value="" disabled="disabled" /></div></li><li  id="vote-list-7">
								<h4>7. 平均每月收入：</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-7-52" sid="cv7" name="v7" value="52" /><label class="text" for="label-7-52"><2000</label>
									<br />
									<input class="choice" type="radio" id="label-7-53" sid="cv7" name="v7" value="53" /><label class="text" for="label-7-53">2000-3000</label>
									<br />
									<input class="choice" type="radio" id="label-7-54" sid="cv7" name="v7" value="54" /><label class="text" for="label-7-54">3000-5000</label>
									<br />
									<input class="choice" type="radio" id="label-7-55" sid="cv7" name="v7" value="55" /><label class="text" for="label-7-55">5000-8000</label>
									<br />
									<input class="choice" type="radio" id="label-7-56" sid="cv7" name="v7" value="56" /><label class="text" for="label-7-56">>8000</label>
									<br />
									<input class="choice" type="radio" id="label-7-57" sid="cv7" name="v7" value="57" /><label class="text" for="label-7-57">保密</label><br />
								</div>
							</li>
							<li  id="vote-list-8">
								<h4>8. 隔多久外出就餐、休闲娱乐一次？</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-8-58" sid="cv8" name="v8" value="58" /><label class="text" for="label-8-58">平均一月不到一次</label>
									<br />
									<input class="choice" type="radio" id="label-8-59" sid="cv8" name="v8" value="59" /><label class="text" for="label-8-59">一月一次</label>
									<br />
									<input class="choice" type="radio" id="label-8-60" sid="cv8" name="v8" value="60" /><label class="text" for="label-8-60">一月两次</label>
									<br />
									<input class="choice" type="radio" id="label-8-61" sid="cv8" name="v8" value="61" /><label class="text" for="label-8-61">一周一次</label>
									<br />
									<input class="choice" type="radio" id="label-8-62" sid="cv8" name="v8" value="62" /><label class="text" for="label-8-62">一周两次</label>
									<br />
									<input class="choice" type="radio" id="label-8-63" sid="cv8" name="v8" value="63" /><label class="text" for="label-8-63">一周三次或以上</label><br />
								</div>
							</li>
							<li  id="vote-list-11">
								<h4>9. 您是如何知道团团的？</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-11-77" sid="cv11" name="v11" value="77" /><label class="text" for="label-11-77">听朋友口头介绍</label>
									<br />
									<input class="choice" type="radio" id="label-11-78" sid="cv11" name="v11" value="78" /><label class="text" for="label-11-78">朋友用QQ/MSN发给我</label>
									<br />
									<input class="choice" type="radio" id="label-11-79" sid="cv11" name="v11" value="79" /><label class="text" for="label-11-79">看到媒体报道（杂志或网上转载的报道）</label>
									<br />
									<input class="choice" type="radio" id="label-11-80" sid="cv11" name="v11" value="80" /><label class="text" for="label-11-80">网络上看到网友的分享</label>
									<br />
									<input class="choice" type="radio" id="label-11-81" sid="cv11" name="v11" value="81" /><label class="text" for="label-11-81">其他（请填写）</label><input type="text" class="f-text disabled" id="cv11" cid="81" name="ct81" value="" disabled="disabled" /></div></li><li  id="vote-list-9">
								<h4>10. 您愿意我们进一步接触您么？（比如参加团团组织的活动等）</h4>
								<div class="choices">
									<input class="choice" type="radio" id="label-9-64" sid="cv9" name="v9" value="64" /><label class="text" for="label-9-64">愿意</label>
									<br />
									<input class="choice" type="radio" id="label-9-65" sid="cv9" name="v9" value="65" /><label class="text" for="label-9-65">不愿意</label><br /></div></li><li style="display:none;" id="vote-list-10">
								<h4>11. 如果愿意，请留下您的姓名和联系方式：</h4>
								<div class="choices"><table class="input-table"><tr><td class="label"><span>*</span> 姓名：</td><td><input type="text" class="f-text" name="ct66" value="" /><input type="hidden" name="v10[]" value="66" /></td></tr><tr><td class="label"><span>*</span> 电话：</td><td><input type="text" class="f-text" name="ct67" value="" /><input type="hidden" name="v10[]" value="67" /></td></tr><tr><td class="label">邮箱：</td><td><input type="text" class="f-text" name="ct68" value="" /><input type="hidden" name="v10[]" value="68" /></td></tr><tr><td class="label">QQ：</td><td><input type="text" class="f-text" name="ct69" value="" /><input type="hidden" name="v10[]" value="69" /></td></tr></table></div></li>
<?php }?>
						</ol>
						<div class="commit"><input type="submit" class="formbutton" name="submit" value="提交" /></div>
					</form>
				</div>
			</div>
			<div class="box-bottom"></div>
		</div>
	</div>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
