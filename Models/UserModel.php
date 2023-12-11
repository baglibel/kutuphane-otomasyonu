<?php
    date_default_timezone_set('Europe/Istanbul');

    class UserModel implements Stringable{
        public int $ID;
        public string $Name;
        public string $Surname;
        public DateTime $RegistryDate;

        public function __construct() {
        }

        //create book model from code.
        function Create(string $Name, string $Surname): UserModel{
            $this->Name = $Name;
            $this->Surname = $Surname;
            return $this;
        }

        //fill object from array (for create from database)
        function Fill(array $array): UserModel{
            foreach ($array as $key => $value){
                if(property_exists($this, $key))            
                    if ($key == "RegistryDate")
                        $this->RegistryDate = (new DateTime())->createFromFormat("Y-m-d H:i:s", $value);
                    else
                        $this->{$key} = $value;       
            }
            //return this class
            return $this;
        }
        
        //method from Stringable implements for to string "Name Surname"
        public function __toString(): string
        {
            return "$this->Name $this->Surname";
        }
    }

?>