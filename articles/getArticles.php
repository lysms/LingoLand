<?php
    if(isset($_GET["language"]) and isset($_GET["keyword"])){
        $url = 'https://api.gdeltproject.org/api/v1/search_ftxtsearch/search_ftxtsearch';
        $query = "?query=sourcelang:".$_GET["language"]."&output=urllist&dropdup=true";
        $url = $url.$query; 
        echo $_GET["language"]."\n" ;
        echo $_GET["keyword"]."\n";

        header('Content-Type: text/html');                                                                                                                
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);    
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
            'Accept: text/html',
            'Content-Type: text/html')                                                           
        );             

        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }                                                                                                      
        $errors = curl_error($ch);                                                                                                            
        $result = curl_exec($ch);
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);  
        // var_dump($errors);
        //print_r(json_decode($result, true));
        echo $result;
    } else {
        echo json_encode(array('error' => 'missing language or keyword from query'));
    }
?>