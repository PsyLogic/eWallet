<?php

if(isset($_GET['transaction_id'])){
   
    $transaction_id = $_GET['transaction_id'];
    
    require_once 'Controller.php';
    
    $c = new Controller();
    
    $result = $c->getXML("https://devapi.multisafepay.com/ewx/","othmane_1");
    
    //  var_dump($result);
    
    // echo $result->getPayment()->get();
    
    echo $result->all();

}else{
    header("HTTP/1.1 412 Precondition");
    echo json_encode(['message' => "Error, Unauthoraized Request"]);
    exit;
}

