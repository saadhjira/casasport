<?php
foreach ($articles as $value) {
	print_r($value);
	$xmlStr="";
	$xmlStr.='<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
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
		$xmlStr.='<fichier href="/Users/sadjira/Desktop/testFolder/Journal/photo/'.$value["Media"][0]["media_file_name"].'"/>';
		$xmlStr.='<caption>';
			$xmlStr.="<![CDATA[".$value["Media"][0]["caption"]."]]>";
		$xmlStr.="</caption>";
	$xmlStr.="</image>";
	$xmlStr.='</article>';

	file_put_contents("/Users/sadjira/Desktop/testFolder/Journal".DS."".$value["Category"][0]["title"]."".DS.$value["Article"]["weight"].".xml", $xmlStr); 
}
?>
