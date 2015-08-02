$(document).ready(function(){
	$("#googleMap").css({
	'height':$(window).height()
	});


    $(window).bind("load resize",function(){
        var width = $(window).width();
        console.log(width);
        $("video").attr("width",width);
        $("video").attr("height",width*0.75);
        $("audio").css({"width":width-20});
        $("img").attr("width",width);
    });


    $("#topbar").click(function(){
        window.location.href = "home.php";
    });
});

function openMap(id){
	window.location.href = 'map.php?id='+id;
}
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};