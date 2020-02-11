<?php 

class CommonItemPrintout
{
    public $language;

    public function __construct($language){
        $this->language = $language;
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

    public function perHour(){
        if(($this->language) == "en"){
            return "per hour";
        }
        else if(($this->language) == "am"){
            return "በሰዓት";
        }
    }

    public function perDay(){
        if(($this->language) == "en"){
            return "per day";
        }
        else if(($this->language) == "am"){
            return "በቀን";
        }
    }

    public function perMonth(){
        if(($this->language) == "en"){
            return "per month";
        }
        else if(($this->language) == "am"){
            return "በወር";
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

    public function contactMethod($cm){
        if(($this->language) == "en"){
            return $cm;
        }
        else if(($this->language) == "am"){
            switch ($cm) {
                case "contact method":
                    return "የመገናኛ መንገድ";
                    break;
                case "e-mail":
                    return "በኢሜይል";
                    break;
                case "Phone":
                    return "በስልክ";
                    break;
                case "Both":
                    return "በሁለቱም";
                    break;
            }
        }
    }

    public function pic($pic){
        if(($this->language) == "en"){
            return $pic;
        }
        else if(($this->language) == "am"){
            switch ($pic) {
                case "Picture":
                    return "ፎቶ";
                    break;
                case "Item Pictures":
                    return "የንብረቱ ፎቶ";
                    break;
                case "exceeds size 5MB":
                    return "ፎቶዉ መጠኑ ከ 5MB መብለጥ የለበትም";
                    break;
                case "is not of type jpeg ,bmp,gif,jpg or png":
                    return "ከሚከተሉት ውስጥ የለም jpeg ,bmp,gif,jpg ወይም png";
                    break;
            }
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

    public function title(){
        if(($this->language) == "en"){
            return "Title";
        }
        else if(($this->language) == "am"){
            return "ርዕስ";
        }
    }

    public function des(){
        if(($this->language) == "en"){
            return "Description";
        }
        else if(($this->language) == "am"){
            return "ገለጻ";
        }
    }

    public function requireTxt($var){
        if(($this->language) == "en"){
            return $var.' is required';
        }
        else if(($this->language) == "am"){
            switch ($var){
                case "Model":
                    $txt = "ሞዴል";
                    break;
                case "Make":
                    $txt = "መኪና አምራች";
                    break;
                case "Color":
                    $txt = "ቀለም";
                    break;
                case "Rent price":
                    $txt = "የኪራይ ዋጋ";
                    break;
                case "Rent price":
                    $txt = "የሽያጭ ዋጋ";
                    break;
                case "Rate":
                    $txt = "ተመን";
                    break;
                case "Car type":
                    $txt = "የመኪና ዓይነት";
                    break;
                case "Gear type":
                    $txt = "የማርሽ ዓይነት";
                    break; 
                case "Fuel type":
                    $txt = "የነዳጅ ዓይነት";
                    break; 
                case "Year of Manufactured":
                    $txt = "የተመረተበተ ዓመት";
                    break;
                case "City":
                    $txt = "ከተማ";
                    break; 
                case "Subcity":
                    $txt = "ክፍለ ከተማ";
                    break; 
                case "Currency":
                    $txt = "ገንዘብ";
                    break;
                case "Sell or Rent or negotiable price":
                    $txt = "ግዢ ወይም ኪራይ ወይም በደርድር";
                    break;
                case "Contact method":
                    $txt = "የመገናኛ መንገድ";
                    break;
                case "Title":
                    $txt = "ርእስ";
                    break;
            }

            return $txt . ' አስፈላጊ ነው';
        }
    }
  
    public function city($city){
        if(($this->language) == "en"){
            return $city;
        }
        else if(($this->language) == "am"){
            switch ($city) {
                case "City":
                    return "ከተማ";
                    break;
                case "Addis Ababa":
                    return "አዲስ አበባ";
                    break;
                case "Dire Dawa":
                    return "ድሬ ዳዋ";
                    break;
                case "Adama":
                    return "አዳማ";
                    break;
                case "Bahir Dar":
                    return "ባሕር ዳር";
                    break;
                case "Mekele":
                    return "መቀሌ";
                    break;
                case "Awassa":
                    return "አዋሳ";
                    break;
                case "Asaita":
                    return "አሳይታ";
                    break;
                case "Debre Brhane":
                    return "ደብረ ብርሃን";
                    break;
                case "Dessie":
                    return "ደሴ";
                    break;
                case "Gondar":
                    return "ጎንደር";
                    break;
                case "Gambela":
                    return "ጋንቤላ";
                    break;
                case "Harar":
                    return "ሐረር";
                    break;
                case "Asella":
                    return "አሰላ";
                    break;
                case "Bishoftu":
                    return "ቢሾፍቱ";
                    break;
                case "Jimma":
                    return "ጅማ";
                    break;
                case "Nekemte":
                    return "ነቀምት";
                    break;
                case "Shashemene":
                    return "ሻሸመኔ";
                    break;
                case "Arba Minch":
                    return "አርባ ምንጭ";
                    break;
                case "Dila":
                    return "ዲላ";
                    break;
                case "Hosaena":
                    return "ሆሳና";
                    break;
                case "Wolayita Sodo":
                    return "ወላይታ ሶዶ";
                    break;
                case "Jijiga":
                    return "ጅጅጋ";
                    break;
                case "Axum":
                    return "አክሱም";
                    break;
                case "Other":
                    return "ሌሎች";
                    break;
                case "Subcity":
                    return "ክፍለ ከተማ";
                    break;
                case "Axum":
                    return "አክሱም";
                    break;
                case "Other":
                    return "ሌሎች";
                    break;
                case "Addis ketema":
                    return "አዲስ ከተማ";
                    break;
                case "Akaki Kality":
                    return "አቃቂ ቃሊቲ";
                    break;
                case "Arada":
                    return "አራዳ";
                    break;
                case "Bole":
                    return "ቦሌ";
                    break;
                case "Gullele":
                    return "ጉለሌ";
                    break;
                case "Kirkos":
                    return "ቂርቆስ";
                    break;
                case "Kolfe Keraniyo":
                    return "ኮልፌ ቀራንዮ";
                    break;
                case "Lideta":
                    return "ልደታ";
                    break; 
                case "Nifassilk Lafto":
                    return "ነፋስ ስልክ ላፍቶ";
                    break;
                case "Yeka":
                    return "የካ";
                    break;
            }
        }
    }

    public function choiceTxt($var){
        if(($this->language) == "en"){
            return 'Choose ' . $var;
        }
        else if(($this->language) == "am"){
            switch ($var){
                case "type":
                    $txt = "አይነት";
                    break;
                case "City":
                    $txt = "ከተማ";
                    break;
                case "Subcity":
                    $txt = "ክፍለ ከተማ";
                    break;
                
                   
            }

            return $txt . ' ይምረጡ';
        }
    }

    public function curr($curr){
        if(($this->language) == "en"){
            return $curr;
        }
        else if(($this->language) == "am"){
            switch ($curr){
                case "Currency":
                    return "ገንዘብ";
                    break;
                case "BIRR":
                    return "ብር";
                    break;
                case "USD":
                    return "የአሜሪካን ዶላር";
                    break;                  
            }
        }
    }


}

class CarPrintout extends CommonItemPrintout
{

    public function name(){
        if($this->language == "en"){
            $this -> _name = "car";
        }
        else if($this->language == "am"){
            $this -> _name = "መኪና";
        }
    }

    public function make(){
        if($this->language == "en"){
            return "Make";
        }
        else if($this->language == "am"){
            return "አምራች ድርጅት";
        }
    }

    public function milage($dis){
        if($this->language == "en"){
            return $dis;
        }
        else if($this->language == "am"){
            switch ($dis) {
                case "Milage":
                    return "የተጓዘው መጠን";
                    break;
                case "Km":
                    return "ኪሜ";
                    break;
            }
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

    public function year($year){
        if($this->language == "en"){
            return $year;
        }
        else if($this->language == "am"){
            switch ($year) {
                case "Before 50s":
                    return "ከሀምሳዎቹ በፊት";
                    break;
                case "In 50s":
                    return "ሀምሳዎቹ ውስጥ";
                    break;
                case "In 60s":
                    return "ስልሳዎቹ ውስጥ"; 
                    break;
                case "In 70s":
                    return "ሰባዎቹ ውስጥ";
                    break;
            }
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

    public function fuelType($type){
        if(($this->language) == "en"){
            return $type;
        }
        else if(($this->language) == "am"){
            switch ($type) {
                case "Bensine":
                    return "ቤንዚን";
                    break;
                case "Diesel":
                    return "ናፍጣ";
                    break;
                case "Bio-Gas":
                    return "ባዮ";
                    break;
            }
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

    public function seat(){
        if($this->language == "en"){
            return "Seats";
        }
        else if($this->language == "am"){
            return "ወንበር";
        }
    }

    public function color(){
        if (($this->language) == "en"){
            return "Color";
        }
        else if (($this->language) == "am"){
            return "ቀለም";
        }
    }

    public function getColor($color){
        if (($this->language) == "en"){
            return $color; 
        }
        else if (($this->language) == "am"){
            switch ($color) {
                case "Red":
                    return "ቀይ";
                    break;
                case "Green":
                    return "አረጓዴ";
                    break;
                case "Blue":
                    return "ሰማያዊ";
                    break;
                case "Yellow":
                    return "ቢጫ";
                    break;
                case "Black":
                    return "ጥቁር";
                    break;
                case "White":
                    return "ነጭ";
                    break;
                case "Gray":
                    return "አይጥማ";
                    break;
                case "Silver":
                    return "ሲልቨር";
                    break;
                case "Liver":
                    return "ጉበትማ";
                    break;
                case "Brown":
                    return "ቡናማ";
                    break;
                case "Other":
                    return "ሌላ";
                    break;
                }
        }
    }

    public function gear(){
        if(($this->language) == "en"){
            return "Gear type";
        }
        else if(($this->language) == "am"){
            return "የማርሽ ዓይነት";
        }
    } 

    public function gearType($type){
        if(($this->language) == "en"){
            return $type;
        }
        else if(($this->language) == "am"){
            switch ($type) {
                case "Manual":
                    return "ማንዋል";
                    break;
                case "Automatic":
                    return "አውቶማቲክ";
                    break;
                case "Semi-Automatic":
                    return "ከፊል አውቶማቲክ";
                    break;
            }
        }
    }


    public function uploadingTxt(){
        if(($this->language) == "en"){
            return "Uploading Car ...";
        }
        else if(($this->language) == "am"){
            return "መኪና የማስገባት ሂደት ...";
        }
    } 

    public function model(){
        if(($this->language) == "en"){
            return "Model";
        }
        else if(($this->language) == "am"){
            return "ሞዴል";
        }
    } 

    public function carType($type){
        if (($this->language) == "en"){
            return $type; 
        }
        else if (($this->language) == "am"){
            switch ($type) {
                case "Bus":
                    return "አውቶቢስ";
                    break;
                case "Compact Car":
                    return "አነስተኛ የቤተሰብ መኪና";
                    break;
                case "Converitble":
                    return "ጣርያው ተከፋች";
                    break;
                case "Full Size Van":
                    return "ቫን";
                    break;
                case "Hatchback":
                    return "ሀችባክ";
                    break;
                case "Heavy Machinery":
                    return "ከባድ ማሽን";
                    break;
                case "Luxury Car":
                    return "የቅንጦት መኪና";
                    break;
                case "Minibus":
                    return "ሚኒባስ";
                    break;
                case "Pickup":
                    return "ፒካፕ";
                    break;
                case "Small Car":
                    return "አነስተኛ የቤት መኪና";
                    break;
                case "Sport Car":
                    return "የስፖርት መኪና";
                    break;
                case "Station Wagon":
                    return "መለስተኛ የቤተሰብ መኪና";
                    break;
                case "SUV":
                    return "ኤስ ዩ ቪ";
                    break;
                case "Taxi":
                    return "ታክሲ";
                    break;
                case "Truck":
                    return "የጭነት መኪና";
                    break;
                case "Other":
                    return "ሌላ";
                    break;
                }
        }
    }
    
    public function advContent(){
        if(($this->language) == "en"){
            return "More Detailed Info";
        }
        else if(($this->language) == "am"){
            return "የበለጠ ዝርዝር  ለማስገባትት";
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

class ErrorsPrintout
{

}


?>