<?php require_once('core/config.php');?>
<div data-role="footer" data-position="fixed">
	<div class="ui-btn-left">
    	<a href="#" data-role="button" data-ajax="false" data-rel="back" data-icon="back">Back</a> <!-- back navigation button -->
  	</div>
	<h1>
		<?php
			// footer text as configured in config.php file.
			echo $footer_text; 
		?>
	</h1>
	<div class="ui-btn-right">
		<a href="main.php" data-ajax="false" data-role="button" data-icon="grid">Menu</a> <!-- homepage navigation button -->
	</div>
</div><!-- /footer -->
</body>
</html>
