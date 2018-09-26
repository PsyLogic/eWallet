<?php

class Controller{


    protected $info;
    protected $getData = array();

    public function __construct()
    {
        
    }

    public function getXML($url,$transaction_id){
        $this->info =  $this->cURL($url,$this->data($transaction_id));
        $this->info = $this->parseXML($this->info)[0];
        return $this;
    }

    public function getWallet(){
        array_push($this->getData, ['wallet' => $this->info->ewallet]);
        return $this;
    }

    public function getTransaction(){
        $transaction =  $this->info->transaction;
        unset($transaction->items);
        array_push($this->getData,['transaction' =>$transaction]);

        return $this;
    }

    public function getPayment(){
        array_push($this->getData,['Payment' =>$this->info->paymentdetails]);
        return $this;
    }

    public function getCustomer(){
        array_push($this->getData,['Customer' => $this->info->customer]);
        return $this;
    }

    public function getShoppingCart(){
        array_push($this->getData,['ShoppingCart' => $this->info->checkoutdata->children()[0]->items]);
        return $this;
    }

    public function get(){
        return json_encode($this->getData);
    }

    
    public function all(){
        $this->getWallet();
        $this->getTransaction();
        $this->getPayment();
        $this->getCustomer();
        $this->getShoppingCart();
        
        return $this->get();
    }
    
    
    private function data($transaction_id){
        return '<?xml version="1.0" encoding="UTF-8"?>  
        <status ua="custom-1.1">  
            <merchant>  
              <account>11018887</account>  
               <site_id>393</site_id>  
               <site_secure_code>970443</site_secure_code>  
           </merchant>  
           <transaction>  
               <id>'.$transaction_id.'</id> 
           </transaction>  
        </status>
        ';
    }

    private function parseXML($xml){
        return simplexml_load_string($xml);
    }

    private function cURL($url,$body){

        $ch = curl_init();
        $headers = array(
            "Content-type: text/xml",
            "Content-length: " . strlen($body),
            "Connection: close",
        );

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $data = curl_exec($ch);
        
        curl_close($ch);

        return $data;
    }
}