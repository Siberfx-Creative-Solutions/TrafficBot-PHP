<?php
$url = urlDecode($_GET['url']);


echo '<br>
<iframe width="560" height="315" src="'.$url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay muted></iframe>';
?>
