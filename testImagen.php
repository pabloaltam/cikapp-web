<?php
                    
include_once('./include/thumb.php');
$mythumb = new thumb();
$mythumb->loadImage('uploads/trabajo.png');
//$mythumb->resize(100, 'width');
$mythumb->crop(20, 20, "center");
$mythumb->save("test.png", 100);

$mythumb->show();
        
        