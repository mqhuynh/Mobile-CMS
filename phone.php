<html>
<head>
	<title>Mobile View | Mobile CMS</title>
	<style type="text/css">
		.loader{text-align: center; padding-top:400px; }
		.iphone img{height: 900px; }
		.iphone {text-align: center; position: relative; display: none;}
		iframe{height: 606.5px; width: 340px; border: 0;}
		.frame{position: absolute; z-index: 10; top: 153.5px; display: none;}
	</style>
	<script src="lib/js/jquery-1.11.1.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="loader"><img src="img/ajax-loader.gif"/></div>
	<div class="iphone"><img src="img/iphone_new.png" /></div>
	<div class="frame"><iframe src="home.php"></iframe></div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var width = $(window).width();
		$(".frame").css({"left":(width/2)-171.5});
		setTimeout(function(){
			$(".loader").css({"display":"none"});
			$(".frame, .iphone").fadeIn(1000);
		},500);
	});
	$(window).bind("resize", function(){
		var width = $(window).width();
		$(".frame").css({"left":(width/2)-171.5, "display":"block"});
	});
</script>
</html>