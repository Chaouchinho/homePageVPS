<?php

    $url = $_GET['url'];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
    curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if( ($httpcode =='200')||($httpcode =='301') ||($httpcode =='302') )
    {
        echo 'OK';
        http_response_code(200);
        exit;
    }
    else
    {
        echo 'KO';
        http_response_code(500);
        exit;
    }
    

?>
