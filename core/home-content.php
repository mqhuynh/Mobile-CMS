<?php
// display the homepage content as configured in config.php file.
 if(isset($home_content_image)){
 	echo '<img width="90%" src="'.$home_content_image.'" />';
 } else if(isset($home_content_text)){
 	echo $home_content_text;
 }
?>
