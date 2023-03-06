<?php

include './lib/openai/src/OpenAi.php';
include './lib/openai/src/Url.php';
include './config.php';
use Orhanerday\OpenAi\OpenAi;

    $open_ai_key = OPEN_AI_SK;
    $open_ai = new OpenAi($open_ai_key);
    
    $rawmessage = $_POST['message'];
    $rawmessage = str_replace(' ', '%20', $rawmessage);

    $inp_lang = $_POST['inp-lang'];
    //        $inp_lang = 'pa';
    if ($inp_lang!='en'){
        //if language is other than english then translate
        //translate api call
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://lingva.ml/api/v1/'.$inp_lang.'/en/'.$rawmessage);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        $translation = json_decode($response);
        curl_close($ch);

        //use repsonse as prompt
        if (!isset($translation->error)){
            $translated = $translation->translation;
            if($translated!=''){
                autoComplete($open_ai,$translated,$inp_lang);
            }
        }else{
            echo json_encode(['response'=>"Error Occured: ".$translation->error." ".curl_error($ch)]);
            exit;
        }

    }
    else{
        //else proceed with the input message
        autoComplete($open_ai,$rawmessage);
    }
    function autoComplete($open_ai,$prompt,$lang=''){
        $complete = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 250,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        $complete = json_decode($complete);
        $search = trim($complete->choices[0]->text);
        $search = str_replace(' ', '%20', $search);
        $url = "https://lingva.ml/api/v1/en/".$lang."/".$search;
        //translate back to the user language
        if ($lang!=''){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "$url");
            curl_setopt($ch,CURLOPT_FAILONERROR,true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($ch);
            $translation = json_decode($response);

            curl_close($ch);
        //     //use repsonse as prompt
            if ($response == false) {
                echo json_encode(['response'=>"Error Occured: ".curl_errno($ch)." ".curl_error($ch)]);
                exit;
            }
            if (!isset($translation->error) && !is_null($translation)){
                $translated = $translation->translation;
                if($translated!=''){
                    echo json_encode(['response'=>$translated]);
                    exit;
                }
            }else{
                echo json_encode(['response'=>"Error Occured: ".$translation->error." ".curl_error($ch)]);
                exit;
        }
        }
    }