<?php 
 $custom_errors=array("nickname"=>__("nickname_error",true),"body"=>__("body_error",true),"email"=>__("email_error",true));  
 if(!empty($returnData["errors"])){
 	foreach($returnData["errors"] as $key =>$value){
 		$returnData["errors"][$key]=$custom_errors[$key];
 	}
 }
 if(!empty($returnData["message"])){
 	$returnData["message"]=__("message_error",true);
 }
 echo json_encode($returnData);
 
 ?>