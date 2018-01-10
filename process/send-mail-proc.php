<?php
$name=$_POST["name"];
$email=$_POST["email"];
$cellphone=$_POST["cellphone"];
$message=$_POST["message"];

mail("minglun77127@gmail.com", "from ".$name, $message, "From: minglun77128@gmail.com");