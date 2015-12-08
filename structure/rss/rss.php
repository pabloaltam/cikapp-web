<?php
include "./lastRSS.php";

$rss = new lastRSS;
$rss->cache_dir = './temp';
$rss->cache_time = 1200;
$rss->date_format = 'd/m/Y';

if ($rs = $rss->get('http://feeds.feedburner.com/jkanime')) {
// here we can work with RSS fields
}
else {
die ('Error: RSS file not found...');
}

// Muestra titulo, enlace, fecha/hora y descripcion
echo "<div class='rss02'><ul>\n";
foreach($rs['items'] as $item) {
    echo "\t<li><a href=\"$item[link]\">".$item['title']."</a><br><div class='fecha'>".$item['pubDate']."</div>".$item['description']."</li>\n";
}
echo "</ul>\n";
echo "</div>";

?>