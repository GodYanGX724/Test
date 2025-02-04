<?php


    $obj = new CAnimal();
    $obj->makeNoise();
    // $obj->_weight = -5;
    echo $obj->getWeight(),"<br>";
    $obj->setWeight(10);
    echo $obj->getWeight(),"<br>";
    // $obj->__destruct() ;
    $obj = null;

    $obj2 = new CDog(0,500);
    $obj2->makeNoise();
    echo $obj2->getPrice(),"<br>";
    
    $obj2->setPrice(300);
    echo $obj2->getPrice(),"<br>";


    class CAnimal {

        function __construct($weightValue = 0) {
            echo"Object create<br>";
        }

        // function __destruct(){
        //     echo "Object destroyed. XXXX<br>";
        // }

        private $_weight = 1;
        // public $_weight = 1;
        public function makeNoise() {
            echo "Animal: ...<br>";
        }

        public function setWeight($value) {
            if ($value >= 0) {
                $this->_weight = $value;
            }
        }

        public function getWeight(){
            return $this->_weight;
        }
    }

    class CDog extends CAnimal {


        function __construct($weightValue = 0,$priceValue = 0) {
            parent::__construct($weightValue);
            $this->setPrice($priceValue);
        }
        private $_price = 0;

        public function setPrice($value){
            $this->_price = $value;
        }
        public function getPrice(){
            return $this->_price;
        }

        public function getWeight(){
            return $this->_weight;
        }

        public function makeNoise() {
            parent::makeNoise();
            echo"Dog: Wan! Wan! <br>";
        }
    }
?>

