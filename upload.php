<?php

    $base = $_POST['base64'];
    $data = $base;
    $regex =  '~(?<=\["|",")[^"]*~';
    preg_match_all($regex, $data, $matches);

    $imgs = array_shift($matches);
    for($i=0; $i< count($imgs); $i++) {
        $base_to_php = preg_replace('#^data:image/\w+;base64,#i', '', $imgs[$i]);
        //print "<hr>";
        //print_r($base_to_php);

        $data = base64_decode($base_to_php);
        $filepath = uniqid(rand(), true) . ".jpeg";
        file_put_contents($filepath, $data);

        echo "Uploaded successfully!";

    }

 ?>
