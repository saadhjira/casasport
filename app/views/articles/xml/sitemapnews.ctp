<?php
$rq=$box->get('sitemap_gnews');

$results=$box->executeQuery($rq);

$xmlStr="";
$xmlStr.='<?xml version="1.0" encoding="UTF-8"?>';
$xmlStr.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
$xmlStr.=' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

foreach($results as $result){
              	
$xmlStr.='<url>';
$xmlStr.='<loc>';
$xmlStr.='http://www.wijhatnadar.com/articles/'. date("Y", strtotime($result['Article']['dated_at']))."/".date("m", strtotime($result['Article']['dated_at']))."/".date("d", strtotime($result['Article']['dated_at']))."/".$result['Article']['id'].".html"; 
$xmlStr.="</loc>";
$xmlStr.=" <news:news>";
$xmlStr.=" <news:publication>";
$xmlStr.=" <news:name>wijhatnadar.com</news:name>";
$xmlStr.=" <news:language>ar</news:language>";
$xmlStr.=" </news:publication>";
$xmlStr.=" <news:publication_date>".date("Y-m-d", strtotime($result['Article']['dated_at']))."</news:publication_date>";
$xmlStr.=" <news:title>".$result['Article']['title']."</news:title>";
$xmlStr.=" <news:keywords>Presse Marocaine, News</news:keywords>";
$xmlStr.="</news:news>";
$xmlStr.="</url>";	
} 

$xmlStr.='</urlset>';

echo $xmlStr;
 file_put_contents(WWW_ROOT.DS."sitemap".DS."sitemap-news.xml", $xmlStr); 
?>




  
