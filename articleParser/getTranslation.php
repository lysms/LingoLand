<?php
    include './secret.php';
    if(isset($_GET["text"]) and isset($_GET["model_id"])){
        $url = 'https://api.au-syd.language-translator.watson.cloud.ibm.com/instances/2339c367-dbe9-4f5b-9747-db8b1ea37e00';
        $url = $url.'/v3/translate?version=2018-05-01';
        $data = array('text' => $_GET["text"], 'model_id' => $_GET["model_id"]);
        
        $data_string = json_encode($data);                                                                                   
        $api_key = "apikey";   
        header('Content-Type: application/json');                                                                                                                
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);    
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        curl_setopt($ch, CURLOPT_POST, true);                                                                   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
        curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
            'Accept: application/json',
            'Content-Type: application/json')                                                           
        );             

        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }                                                                                                      
        $errors = curl_error($ch);                                                                                                            
        $result = curl_exec($ch);
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);  
        //echo $returnCode;
        //var_dump($errors);
        //print_r(json_decode($result, true));
        echo $result;
    } else {
        echo json_encode(array('error' => 'missing text or model id from query'));
    }
?>