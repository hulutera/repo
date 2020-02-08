<?php 
class CarPrintout
{

    public $language;

    public function __construct($language){
        $this->language = $language;
    }

    public function name(){
        if($this->language == "en"){
            $this -> _name = "car";
        }
        else if($this->language == "am"){
            $this -> _name = "njnjnjn";
        }
    }

    public function make(){
        if($this->language == "en"){
            return "Make";
        }
        else if($this->language == "am"){
            return "ስሪት";
        }
    }

    public function type(){
        if($this->language == "en"){
            return "Type";
        }
        else if($this->language == "am"){
            return "አይነት";
        }
    }

    public function yearOfMake(){
        if($this->language == "en"){
            return "Year of Make";
        }
        else if($this->language == "am"){
            return "የተሰራበት ዓመት";
        }
    }

    public function fuel(){
        if($this->language == "en"){
            return "Fuel";
        }
        else if($this->language == "am"){
            return "ነዳጅ";
        }
    }

    public function numbOfSeat(){
        if($this->language == "en"){
            return "Nr of Seats";
        }
        else if($this->language == "am"){
            return "የወንበር ቁጥር";
        }
    }

    public function color(){
        if (($this->language) == "en"){
            return "Color";
        }
        else if (($this->language) == "am"){
            return "ከለር";
        }
    }


    public function gear(){
        if(($this->language) == "en"){
            return "Gear";
        }
        else if(($this->language) == "am"){
            return "ማርሽ";
        }
    }

    public function extraInfo(){
        if(($this->language) == "en"){
            return "Extra Info";
        }
        else if(($this->language) == "am"){
            return "ተጨማሪ መረጃ";
        }
    }

    public function price(){
        if(($this->language) == "en"){
            return "Price";
        }
        else if(($this->language) == "am"){
            return "ዋጋ";
        } 
    }

    public function negotiable(){
        if(($this->language) == "en"){
            return "Negotiable";
        }
        else if(($this->language) == "am"){
            return "መደራደር ይቻላል";
        }
    } 

    public function noPriceInfo(){
        if(($this->language) == "en"){
            return "price information not available";
        }
        else if(($this->language) == "am"){
            return "መደራደር ይቻላል";
        }
    }

    public function rent(){
        if(($this->language) == "en"){
            return "Rent";
        }
        else if(($this->language) == "am"){
            return "ኪራይ";
        }
    }

    public function sell(){
        if(($this->language) == "en"){
            return "Sell";
        }
        else if(($this->language) == "am"){
            return "ችያጭ";
        }
    }

    public function showDetail(){
        if(($this->language) == "en"){
            return "Show Detail";
        }
        else if(($this->language) == "am"){
            return "ተጨማሪ አሳይ";
        }
    }

    public function hideDetail(){
        if(($this->language) == "en"){
            return "Hide Detail";
        }
        else if(($this->language) == "am"){
            return "ዝርዝር ሸፍን";
        }
    }

    public function contact(){
        if(($this->language) == "en"){
            return "Contact";
        }
        else if(($this->language) == "am"){
            return "መገናኛ መንገድ";
        }
    }

    public function sendMsg(){
        if(($this->language) == "en"){
            return "Send a message";
        }
        else if(($this->language) == "am"){
            return "መልእክት ለባለንብረቱ ይላኩ";
        }
    }

    public function reportAbuse(){
        if(($this->language) == "en"){
            return "Report Abuse";
        }
        else if(($this->language) == "am"){
            return "ያልተገባ መረጃ ከሆነ ጥቆማ ያድርጉ";
        }
    }

}

class ComputerPrintout
{

}

class ElectronicsPrintout
{

}

class FurniturePrintout
{

}

class HousePrintout
{

}

class HouseholdPrintout
{

}

class OthersPrintout
{

}

class CommonItemPrintout
{

}

class ErrorsPrintout
{

}


?>