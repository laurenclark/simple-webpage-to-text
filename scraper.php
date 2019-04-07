<?php

    echo "Compiling...\n";

    function curl_get_file_contents($URL){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $document = curl_exec($c);
        curl_close($c);
        
        $search = array('@<script[^>]*?>.*?</script>@si', // Strip out javascript
        '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
        '@<[\/\!]*?[^ <>]*?>@si', // Strip out HTML tags
        '@<![\s\S]*?–[ \t\n\r]*>@', // Strip multi-line comments including CDATA
        '/\s{2,}/',
    );

    $text = preg_replace($search, "\n", html_entity_decode($document));

    $pat[0] = "/^\s+/";
    $pat[2] = "/\s+\$/";
    $rep[0] = "";
    $rep[2] = " ";

    $text = preg_replace($pat, $rep, trim($text));

    return $text;

    if ($document) return $document;
        else return FALSE;
    }

    $urls = array(
        #list of urls...
        'http://google.com',
        'http://laurenclark.io'
        
    );

    foreach ($urls as $url) { 
        $fh = fopen('scraped_content.txt', 'a+');
        fwrite($fh, "\n************ " . " START " . ($url) . " ************");
        fwrite($fh, curl_get_file_contents($url));  
        fwrite($fh, "\n************ " . " END " . ($url) . " ************");
        echo "#";
    }

    echo "\nComplete.\n";

?>
