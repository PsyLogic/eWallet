<?php

class Controller{


    protected $info;
    protected $getData = array();

    public function __construct()
    {
        
    }

    /**
     * Get Parsed  XML
     *
     * @param String $url
     * @param String $transaction_id
     * @return void
     */
    public function getXML($url,$transaction_id){
        $this->info =  $this->cURL($url,$this->data($transaction_id));
        $this->info = $this->parseXML($this->info)[0];
        return $this;
    }

    /**
     * Get Wallet Property
     *
     * @return Object
     */
    public function getWallet(){
        array_push($this->getData, ['Wallet' => $this->info->ewallet]);
        return $this;
    }

    /**
     * Get Transaction property
     *
     * @return Object
     */
    public function getTransaction(){
        $transaction =  $this->info->transaction;
        unset($transaction->items);
        array_push($this->getData,['Transaction' =>$transaction]);

        return $this;
    }

    /**
     * Get Payment Property
     *
     * @return Object
     */
    public function getPayment(){
        array_push($this->getData,['Payment' =>$this->info->paymentdetails]);
        return $this;
    }

    /**
     * Get Customer Property
     *
     * @return Object
     */
    public function getCustomer(){
        array_push($this->getData,['Customer' => $this->info->customer]);
        return $this;
    }

    /**
     * Get Shppoing Cart Items
     *
     * @return Object
     */
    public function getShoppingCart(){
        array_push($this->getData,['ShoppingCart' => $this->info->checkoutdata->children()[0]->items]);
        return $this;
    }

    /**
     * Get Fetched Data
     *
     * @return Collection
     */
    public function get(){
        return json_encode($this->getData);
    }

    
    /**
     * Get all Properties
     *
     * @return Collection
     */
    public function all(){
        $this->getWallet();
        $this->getTransaction();
        $this->getPayment();
        $this->getCustomer();
        $this->getShoppingCart();
        
        return $this->get();
    }
    
    /**
     * Default Data
     *
     * @param String $transaction_id
     * @return String
     */
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

    /**
     * Parse XML Content
     *
     * @param String $xml
     * @return SimpleXMLElement
     */
    private function parseXML($xml){
        return simplexml_load_string($xml);
    }

    /**
     * Send Request to Server
     *
     * @param String $url
     * @param String $body
     * @return String
     */
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