<?php

    class BookModel implements Stringable{
        public int $ID;
        public string $Name;
        public string $Writer;
        public string $Cover;
        public string $Description;
        public string $NumberOfPages;
        public string $Publisher;
        public bool $IsFree = true;
        public function __construct() {
        }

        //create book model from code.
        public function Create(string $Name, string $Writer, string $Cover, string $Description, string $NumberOfPages, string $Publisher): BookModel{
            $this->Name = $Name;
            $this->Writer = $Writer;
            $this->Cover = $Cover;
            $this->Description = $Description;
            $this->NumberOfPages = $NumberOfPages;
            $this->Publisher = $Publisher;
            return $this;
        }

        //fill object from array (for create from database)
        public function Fill(array $bookArray): BookModel{
            foreach ($bookArray as $key => $value) {
                //check if property exists
                if(property_exists($this, $key))
                    $this->{$key} = $value;
            }
            //return this class
            return $this;
        }
        
        //method from Stringable implements for to string "Name - Writer"
        public function __toString(): string
        {
            $durum = ($this->IsFree) ? "Sahipsiz" : "Sahipli";
            return "$this->Name - $this->Writer | $durum";
        }
    }

?>