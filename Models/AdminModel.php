<?php

    class AdminModel implements Stringable{
        public int $ID;
        public string $Username;
        public string $Password;
        public string $Name;
        public string $Surname;
        public string $Email;
        public Rank $Rank;

        public function __construct() {
        }

        //create admin model from code.
        function Create(string $Username, string $Password, string $Name, string $Surname, string $Email, int $Rank): AdminModel{
            $this->Username = $Username;
            $this->Password = $Password;
            $this->Name = $Name;
            $this->Surname = $Surname;
            $this->Email = $Email;
            $this->Rank = $Rank;
            return $this;
        }

        //fill object from array (for create from database)
        function Fill(array $array): AdminModel{
            foreach ($array as $key => $value){
                if(property_exists($this, $key))            
                if ($key == "Rank"){
                    $this->Rank = Rank::from($value);
                }else{
                    $this->{$key} = $value;       
                }
            }
            //return this class
            return $this;
        }
        
        //method from Stringable implements for to string "Name Surname @Username"
        public function __toString(): string
        {
            $rank = $this->Rank->name;
            return "$this->Name $this->Surname @$this->Username";
        }
    }
    enum Rank: int {
        case Yönetici = 1;
        case Moderatör = 0;
    }
?>