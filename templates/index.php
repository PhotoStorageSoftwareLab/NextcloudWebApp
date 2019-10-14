<?php

// Check if we are a user
OCP\User::checkLoggedIn();

style('photostorage', 'style');
script('photostorage', 'dist/dropzone');
script('photostorage', 'drop');
script('photostorage', 'nextcloudapi');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('navigation/index')); ?>
		<?php print_unescaped($this->inc('settings/index')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
            <?php print_unescaped($this->inc('content/index')); ?>
		</div>
	</div>
</div>

