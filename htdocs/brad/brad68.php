<?php
    abstract class Product {
        protected $name;
        protected $price;
        public function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }   

        public function getName() {return $this->name;}
        public function getPrice() {return $this->price;}
        abstract public function getDetails();
    }
    
    class book extends Product {
        private $author;
        
        public function __construct($name, $price,$author) {
            $this->name = $name;
            $this->price = $price;
            $this->author = $author;
            
        }
        public function getAuthor() {return $this->author;}
        public function getDetails() {return "Name:{$this->name};Price:{$this->price};Author:{$this->author};";}

    }

    class Seafood extends Product {
        private $kind;
        public function __construct($name, $price,$kind) {
            $this->name = $name;
            $this->price = $price;
            $this->kind = $kind;
            
        }
        public function getKind() {return $this->kind;}
        public function getDetails() {return "Name:{$this->name};Price:{$this->price};kind:{$this->kind};";}

    }

    //===============================================
    //介面 interface => 規格
    interface DiscountStrategy{
        public function setDiscount($price);
    }
    
    class FixedDiscount implements DiscountStrategy{
        private $amount;
        public function __construct($amount) {
            $this->amount = $amount;
        }
        
        public function setDiscount($price){
            return max(1,$price - $this->amount);
        }

    
    }
    class PercentageDiscount implements DiscountStrategy{
        private $percentage;
        public function __construct($percentage) {
            $this->percentage = $percentage;
        }
        
        public function setDiscount($price){
            return $price * $this->percentage / 100;
        }

    }

    class Cart {
        private $item = [];
        private $discountStrategy = null; //不打折 => null
        public function addItem(Product $product){
            $this->item[] = $product;
        }

        public function setDiscountStrategy(DiscountStrategy $strategy){
            $this->discountStrategy = $strategy;
        }

        public function calTotal(){
            $total = 0;
            foreach($this->item as $item){
               $price = $item->getPrice();
               if($this->discountStrategy != null){
                   $price = $this->discountStrategy->setDiscount($price);
               }
               $total += $price;
            }

            return $total;
        }

        public function listItems(){
            foreach($this->item as $item){
                echo "{$item->getDetails()}<br>";
            }
        }
    }


    $book1 = new Book('PHP大全',300,"Brad");
    $book2 = new Book('MySQL大全',400,"Pig");
    $fish = new Seafood('fush',100,'fish1');

    $cart = new Cart();
    $cart->addItem($book1);
    $cart->addItem($book2);
    $cart->addItem($fish);
    

    $cart->listItems();
    echo "price1:{$cart->calTotal()}<br>";
    
    
    $cart->setDiscountStrategy(new FixedDiscount(10));
    echo "price2:{$cart->calTotal()}<br>";
    
    $cart->setDiscountStrategy(new PercentageDiscount(90));
    echo "price3:{$cart->calTotal()}<br>";
?>