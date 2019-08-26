<?php

    // get base64 image data
    $base = $_POST['base64'];
    $data = $base;
    $regex =  '~(?<=\["|",")[^"]*~';
    preg_match_all($regex, $data, $matches);

    $imgs = array_shift($matches);

    for($i=0; $i< count($imgs); $i++) {

        // get image extension
        $pos  = strpos($imgs[$i], ';');
        $ext = explode(':image/', substr($imgs[$i], 0, $pos))[1];
        if($ext == 'jpeg') { $ext = 'jpg'; }

        // decode base64 data
        $base_to_php = preg_replace('#^data:image/\w+;base64,#i', '', $imgs[$i]);
        $data = base64_decode($base_to_php);
        $filepath = uniqid(rand(), true) . '.' . $ext;
        file_put_contents($filepath, $data);

    }

    echo "Uploaded successfully!";

 ?>
