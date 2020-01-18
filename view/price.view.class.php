<?php
class PriceClass
{
	public function printPrice($obj)
	{
		echo "<div class=\"price\">";
		switch (get_class($obj))
		{
			case "CarClass":
			case "HouseClass":
				$rentValue = $obj->getRent();
				$sellValue = $obj->getSell();
				$negoValue = $obj->getNego();
				$negoDisplay= ($negoValue == 1)?"Negotiable":""; 
				$curr  = $obj->getCurr();
				$rate  = $obj->getRate();

				//ctrl var
				$rentsellwnego =   $rentValue &&  $sellValue &&  $negoValue;
				$rentsell      =   $rentValue &&  $sellValue && !$negoValue;
				$rentnego      =   $rentValue && !$sellValue &&  $negoValue;
				$rent          =   $rentValue && !$sellValue && !$negoValue;
				$sellnego      =  !$rentValue &&  $sellValue &&  $negoValue;
				$sell          =  !$rentValue &&  $sellValue && !$negoValue;
				$noprice       =  !$rentValue && !$sellValue && !$negoValue;
				$nego          =  !$rentValue && !$sellValue &&  $negoValue;

				//display var
				$rent_var = "<p style=\"text-indent: 10px;\"><strong>Rent:&nbsp</strong>".$rentValue." ".$curr."/".$rate."</p>";
				$sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>".$sellValue." ".$curr."</p>";
				$nego_var = "<p style=\"text-indent: 10px;\">".$negoDisplay."/መደራደር ይቻላል/</p>";
				echo "<p><strong>Price:</strong></p>";

				if($rentsellwnego)
				{
					echo $rent_var.$sell_var.$nego_var;
				}
				else if($sellnego)
				{
					echo $sell_var.$nego_var;
				}
				else if($rentnego)
				{
					echo $rent_var.$nego_var;
				}
				else if($rentsell)
				{
					echo $rent_var.$sell_var;
				}
				else if($nego)
				{
					echo $nego_var;
				}
				else if($rent)
				{
					echo $rent_var;
				}
				else if($sell)
				{
					echo $sell_var;
				}
				else if($noprice)
				{
					echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
				}
				break;
			case "CompClass":
			case "ElecClass":
			case "HouseHoldClass":
			case "PhoneClass":
			case "OtherClass":
				//ctrl var
				$sellValue = $obj->getSell();
				$negoValue = $obj->getNego();
				$negoDisplay= ($negoValue == 1)?"Negotiable":"";
				$sellnego  =  $sellValue  &&  $negoValue;
				$sell      =  $sellValue  && !$negoValue;
				$noprice   =  !$sellValue && !$negoValue;
				$nego      =  !$sellValue &&  $negoValue;
				$curr  = $obj->getCurr();

				//display var
				$sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>".$sellValue." ".$curr."</p>";
				$nego_var = "<p style=\"text-indent: 10px;\">".$negoDisplay."/መደራደር ይቻላል/</p>";
				echo "<p><strong>Price:</strong></p>";
				if($sellnego){
					echo $sell_var.$nego_var;
				}else if($nego){
					echo $nego_var;
				}else if($sell){
					echo $sell_var;
				}else if($noprice){
					echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
				}
				break;
			default:break;

		}
		echo "</div>"; //end_Price
	}
}
?>