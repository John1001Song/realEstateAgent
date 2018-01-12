<?php
$name=$_POST["name"];
$email=$_POST["email"];
$cellphone=$_POST["cellphone"];
$message=$_POST["message"];

echo mail("minglun77127@gmail.com", "from ".$name, $message, "From: minglun77128@gmail.com")?
json_encode(array("status"=>"success", "data"=>array("name"=>$name))): json_encode(array("status"=>"error"));

/*echo json_encode(array("status"=>"success", "data"=>array("name"=>$name)));*/