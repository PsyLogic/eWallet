<?php
require_once 'Controller.php';

$c = new Controller();

$result = $c->getXML("https://devapi.multisafepay.com/ewx/","othmane_1");

//  var_dump($result);
//  die();

echo $result->all();

