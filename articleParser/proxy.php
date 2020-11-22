<?php
    if(isset($_GET['uri'])){
        $URL = $_GET['uri'];
        $domain = file_get_contents($URL);
        echo $domain;
    }else{
        echo json_encode(array('error' => 'invalid url'));
    }
?>