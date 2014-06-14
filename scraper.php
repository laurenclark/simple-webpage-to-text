<?php

	echo "Compiling...\n";

function curl_get_file_contents($URL)
{



	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$document = curl_exec($c);
	curl_close($c);


    $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<![\s\S]*?–[ \t\n\r]*>@',         // Strip multi-line comments including CDATA
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

  	'http://www.gtduk.com/',
  	'http://www.gtduk.com/about-us.php',
  	'http://www.gtduk.com/case-studies/',
  	'http://www.gtduk.com/contact-us.php',
  	'http://www.gtduk.com/databases/',
  	'http://www.gtduk.com/databases/case-study-1.php',
  	'http://www.gtduk.com/databases/case-study-2.php',
  	'http://www.gtduk.com/databases/case-study-3.php',
  	'http://www.gtduk.com/databases/case-study-4.php',
  	'http://www.gtduk.com/databases/index.php',
  	'http://www.gtduk.com/identity/',
  	'http://www.gtduk.com/identity/branding.php',
  	'http://www.gtduk.com/identity/copywriting.php',
  	'http://www.gtduk.com/identity/logo-design.php',
  	'http://www.gtduk.com/identity/packaging.php',
  	'http://www.gtduk.com/multimedia/',
  	'http://www.gtduk.com/multimedia/video-packages.php',
  	'http://www.gtduk.com/multimedia/video-production.php',
  	'http://www.gtduk.com/news/missing-andy-app.php',
  	'http://www.gtduk.com/news/network-magazine-8th-birthday.php',
  	'http://www.gtduk.com/news/nexus-redesign.php',
  	'http://www.gtduk.com/online/',
  	'http://www.gtduk.com/online/app-design-development.php',
  	'http://www.gtduk.com/online/content-management-systems.php',
  	'http://www.gtduk.com/online/digital-marketing.php',
  	'http://www.gtduk.com/online/search-engine-optimisation.php',
  	'http://www.gtduk.com/online/website-design.php',
  	'http://www.gtduk.com/portfolio/',
  	'http://www.gtduk.com/portfolio/apps.php',
  	'http://www.gtduk.com/portfolio/index.php',
  	'http://www.gtduk.com/portfolio/multimedia.php',
  	'http://www.gtduk.com/portfolio/offline.php',
  	'http://www.gtduk.com/portfolio/online.php',
  	'http://www.gtduk.com/portfolio/printed.php',
  	'http://www.gtduk.com/printing/',
  	'http://www.gtduk.com/printing/brochures.php',
  	'http://www.gtduk.com/printing/promotional-materials.php',
  	'http://www.gtduk.com/printing/signs.php',
  	'http://www.gtduk.com/printing/stationery.php',
  	'http://www.gtduk.com/privacy-policy.php',
  	'http://www.gtduk.com/terms-conditionas.php',
  	'http://www.gtduk.com/testimonials.php'
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

