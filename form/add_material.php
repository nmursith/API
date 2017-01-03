<?php
include_once './utilities/Stock.class.php';

$barcode = isset($_POST['barcode'])?$_POST['barcode']:"";
$name = isset($_POST['name'])?$_POST['name']:"";
$color = isset($_POST['color'])?$_POST['color']:"";
$price_pkg = isset($_POST['price_pkg'])?$_POST['price_pkg']:"";
$yarn_count = isset($_POST['yarn_count'])?$_POST['yarn_count']:"";
$strength = isset($_POST['strength'])?$_POST['strength']:"";
$absorbency = isset($_POST['absorbency'])?$_POST['absorbency']:"";

Stock::add($barcode, $name,$color,$price_pkg,$yarn_count,$strength, $absorbency)


?>