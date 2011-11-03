</div>
<div id="quickNav" class="quick-nav">
<ul>
<li class="line"></li>
<li class="all"><a href="/" class="cur">全部</a></li>

<!--li class="new"><a href="/xian?catalogId=-1" class="">最新</a></li-->
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=2">城东</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/yule.png');" href="/index.php?gid=3">城西</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=4">城南</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=5">城北</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=6">城内</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/shenghuo.png');" href="/index.php?gid=7">高新</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/wanggou.png');" href="/index.php?gid=8">曲江</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=9">浐灞</a>
</li>
<li>
<a class="" style="background-image:url('/static/icon/meishi.png');" href="/index.php?gid=10">经开</a>
</li>
<li>
<a style="background-image:url('/static/icon/lvyou.png');" href="/index.php?gid=11">大兴<span style="font-size:9px">新区</span></a>
</li>
<li>
<a style="background-image:url('/static/icon/other.png');" href="/index.php?gid=12">西咸<span style="font-size:9px">新区</span></a>
</li>

<li class="backtop"><a href="#">TOP</a></li>
</ul>
</div>
<script type="text/javascript">
jQuery(function(){
$('#quickNav').addClass('qn-big');
function adjust(){
if ($(window).width() > 1024 + 60) {
$('#quickNav').removeClass('qn-slow');
}
else {
$('#quickNav').addClass('qn-slow');
}
}
$(window).resize(function(){
adjust()
})
adjust()
})
</script>
</body>
</html>
