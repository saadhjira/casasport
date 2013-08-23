<?php
$rq=$box->get('sitemap_sixmonths');

$results=$box->executeQuery($rq);

$xmlStr="";
$xmlStr.='<?xml version="1.0" encoding="UTF-8"?>';
$xmlStr.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach($results as $result){
              	
$xmlStr.='<url>';
$xmlStr.='<loc>';
$xmlStr.='http://www.wijhatnadar.com'.$this->Html->url($this->Article->paramsUrl($result)); 
$xmlStr.="</loc>";
$xmlStr.="</url>";	
} 

$xmlStr.='</urlset>';

echo $xmlStr;
 file_put_contents(WWW_ROOT.DS."sitemap".DS."sitemap-sixmonths.xml", $xmlStr); 
?>

