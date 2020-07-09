<?php

/**
* User: sahan
* Date: 8/23/15
* Time: 11:45 PM
*/

return [

'driver' => env('IMAGE_DRIVER', 'imagick'),
'upload_path' => env('IMAGE_UPLOAD_PATH'),

/**
* Image key to image thumbnail size mapping
* We use these thumbnail sizes when uploading image thumbnails
*/
1 => ['width' => 35, 'height' => 35],
2 => ['width' => 150, 'height' => 150],
3 => ['width' => 100, 'height' => 100],
4 => ['width' => 60, 'height' => 60],
5 => ['width' => 50, 'height' => 50],
6 => ['width' => 250, 'height' => 250],
7 => ['width' => 500, 'height' => 500],
8 => ['width' => 275, 'height' => 206],
9 => ['width' => 250, 'height' => 225],
10 => ['width' => 254, 'height' => 185],
11 => ['width' => 346, 'height' => 347],
12 => ['width' => 370, 'height' => 310],
13 => ['width' => 270, 'height' => 240],
14 => ['width' => 270, 'height' => 280],
];