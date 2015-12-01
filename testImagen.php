<?php
                    
include_once('./include/thumb.php');
$mythumb = new thumb();
$mythumb->loadImage('uploads/book82.jpg');
//$mythumb->resize(100, 'width');
$mythumb->crop(200, 150, "top");
$mythumb->save("test.jpg");
$mythumb->show();
        
        