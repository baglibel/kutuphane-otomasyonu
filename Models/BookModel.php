<?php

    class BookModel{
        public $ID;
        public $Name;
        public $Writer;
        public $Cover;
        public $Description;
        public $NumberOfPages;
        public $Publisher;
        public $IsFree = true;
        public function __construct() {
        }

        //create book model from code.
        public function Create(string $Name, string $Writer, string $Cover, string $Description, string $NumberOfPages, string $Publisher){
            $this->Name = $Name;
            $this->Writer = $Writer;
            $this->Cover = $Cover;
            $this->Description = $Description;
            $this->NumberOfPages = $NumberOfPages;
            $this->Publisher = $Publisher;
        }

        //fill object from array (for create from database)
        public function Fill(array $bookArray){
            foreach ($bookArray as $key => $value) {
                //check if property exists
                if(property_exists($this, $key)){
                    $this->{$key} = $value;
                }
            }
            //return this class
            return $this;
        }
    }

?>