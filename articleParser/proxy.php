<!-- backend function to grab file contents of specified site (as noted by the get request's uri argument). 
This is used to get past CORS issues on the browser. If given time, would add more validation on this function 
to ensure that the sites we display are safe-->
<?php
    if(isset($_GET['uri'])){
        $URL = $_GET['uri'];
        $domain = file_get_contents($URL);
        echo $domain;
    }else{
        echo json_encode(array('error' => 'invalid url'));
    }
?>