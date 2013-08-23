<?php
foreach ($articles as $value) {

	$xmlStr="";
	$xmlStr.='<?xml version="1.0" encoding="UTF-8" standalone="yes" tstamp="1374847643"?>';
	$xmlStr.='<article rubrique="'.$value["Category"][0]["title"].'" ref="'.$value["Article"]["weight"].'" id="'.$value["Article"]["id"].'">';
	$xmlStr.='<text>';
		$xmlStr.='<titraille>';
			$xmlStr.='<surtitre>';
				$xmlStr.='<![CDATA['.$value["Article"]["surtitre"].']]>';
			$xmlStr.='</surtitre>';
			
			$xmlStr.='<titre_art>';
				$xmlStr.='<![CDATA['.$value["Article"]["title"].']]>';
			$xmlStr.='</titre_art>';
		$xmlStr.='</titraille>';
		$xmlStr.='<corps_art>';
			$xmlStr.=$value["Article"]["body"];
		$xmlStr.='</corps_art>';
	$xmlStr.="</text>";
	$xmlStr.="<image>";
		$xmlStr.='<fichier tstamp="1374847643" href="file://serveurdata/F/freego_dam/fileadmin/Images/000_was6819542.1fa00160234.original_medium.jpg"/>';
		$xmlStr.='<caption tstamp="1374847643">';
			$xmlStr.="<![CDATA[".$value["Media"][0]["caption"]."]]>";
		$xmlStr.="</caption>";
	$xmlStr.="</image>";
	$xmlStr.='</article>';

	
	echo $xmlStr;
	file_put_contents(WWW_ROOT.DS."Journal".DS."".$value["Category"][0]["title"]."".DS.$value["Article"]["weight"].".xml", $xmlStr); 
}
?>
