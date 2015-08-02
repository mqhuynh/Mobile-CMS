<script src="lib/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="lib/js/custom.js"></script>
<script>
	// Opens normal view if the client device is mobile.
	if(isMobile.any()){
		window.location.href = "home.php";
	}

	//If not, open emulated mobile view.
	else{
		window.location.href = "phone.php";
	}
</script>