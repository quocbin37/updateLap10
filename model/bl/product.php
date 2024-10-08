<?php
  Class Product {
    private $productCode,$productId,$productName,$listPrice,$categotyID;

    public function getProductCode(){
        return $this->productCode;
    }
    public function setProductCode($value){
        $this->productCode =$value;
    }
    public function getProductId(){
        return $this->productId;
    }
      public function setProductId($value) { 
        $this->productId = $value; 
    } 
    public function getProductName() { 
        return $this->productName; 
    } 
    public function setProductName($value) { 
        $this->productName = $value; 
    }
    public function getListPrice() { 
        return $this->listPrice; 
    } 
    public function setListPrice($value) { 
        $this->listPrice = $value; 
    }
    public function getcategotyID() { 
      return $this->categotyID; 
  } 
  public function setcategotyID($value) { 
      $this->categotyID = $value; 
  }
   

  }
?>