
<div class="drop-area dz-clickable">
	<div class="icon-download dz-message"></div>
	<p class="dz-clickable dz-message">Drop img here</p>
</div>
<div class="url-share">
	<label>Link to share</label>
	<input id="url-drop" />
	<span class="copyButton icon-clippy" data-clipboard-target="#url-drop" title="Copy"></span>
</div>

<h1>Your Photos</h1>
<p class ="photo">Placeholder Photo1 </p>
<p class ="photo">Placeholder Photo2 </p>

<ul class='custom-contextmenu'>
<li data-action = "download">Download</li>
<li data-action = "share">Share</li>
<li data-action = "delete">Delete</li>
</ul>

<?php
//	$imagepath = escapeshellarg($imagepath);
	// $imagepath = 'data/dog.jpg';
	// echo "<img src='/nextcloud/apps/photostorage/lib/darknet/".$imagepath."'>";
	// echo shell_exec('cd apps/photostorage/lib/darknet;./darknet detect cfg/yolov3.cfg yolov3.weights '.$imagepath.' | grep "%"');
	// echo "<img src='/nextcloud/apps/photostorage/lib/darknet/predictions.jpg'>";
	// echo shell_exec('cd apps/photostorage/lib/darknet;./darknet detector test cfg/combine9k.data cfg/yolo9000.cfg yolo9000.weights '.$imagepath.' | grep "%"');
	// echo "<br />";
	// echo "<img src='http://localhost/nextcloud/apps/photostorage/lib/darknet/predictions.jpg'>";

?>
