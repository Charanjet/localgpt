<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
    $rawmessage = $_POST['message'];
    $rawmessage = str_replace(' ', '%20', $rawmessage);

    $inp_lang = $_POST['inp-lang'];
    //        $inp_lang = 'pa';
    if ($inp_lang!='en'){
        //if language is other than english then translate
        //translate api call
        // $translation = Http::get('https://lingva.ml/api/v1/'.$inp_lang.'/en/'.$rawmessage);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://lingva.ml/api/v1/'.$inp_lang.'/en/'.$rawmessage);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        $translation = json_decode($response);
        curl_close($ch);

        //use repsonse as prompt
        // $translated = $translation->json();
        if (!isset($translation->error)){
            $translated = $translation->translation;
    
            // if ($translation->status()==200)
            //     return $this->autoComplete($translated,$inp_lang);
        }else{
            echo "Error Occured: ".$translation->error;
        }

    }
    // else{
    //     //else proceed with the input message
    //     return $this->autoComplete($rawmessage);
    // }
