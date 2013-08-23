<?php
$xmlStr="";
$xmlStr.='<?xml version="1.0" encoding="UTF-8"?>';
$xmlStr.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach($results as $result){
         if($result['Menu']['id']!=1)  {        
$xmlStr.='<url>';
$xmlStr.='<loc>';
$xmlStr.='http://www.wijhatnadar.com/'. $result['Menu']['permalink'].".html"; 
$xmlStr.="</loc>";
$xmlStr.='<changefreq>';
$xmlStr.=$result['Menu']['changefreq'];
$xmlStr.="</changefreq>";
$xmlStr.="<priority>";
$xmlStr.=$result['Menu']['priority'];
$xmlStr.="</priority>";
$xmlStr.="</url>";	

}
}
$xmlStr.='</urlset>';

echo $xmlStr;
 file_put_contents(WWW_ROOT.DS."sitemap".DS."sitemap-mn.xml", $xmlStr); 
?>

