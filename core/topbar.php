<?php require_once('core/config.php');?>
<div data-role="header" id="topbar" style="text-align:center">
<?php
// display the topbar content as configured in config.php file.
if(isset($topbar_image)){
	echo '<img src="'.$topbar_image.'" style="width:100%" />';
}
else if(isset($topbar_text)){
	echo '<p>'.$topbar_text.'</p>';
}
?>
</div>