<?php
//Takes a number and turns into either Trillion, Billion or Million, and leaves it alone if it is less than that
function simplify_number($number)
{
	settype($number, "float");
	//Trillion
	if (($number / 1000000000000) > 1)
	{
		$simple_number =  number_format(($number / 1000000000000), 1) . "T";	
	}
	else
	{

		//Billion
		if (($number / 1000000000) > 1)
		{
			$simple_number =  number_format(($number / 1000000000), 1) . "B";	
	
		} 
		else
		{ 
			//Million
			if(($number / 1000000) > 1)
			{
				$simple_number =  number_format(($number / 1000000), 1) . "M";	
			} 
			else
			{
				if (($number / 1000) > 1)
				{
					$simple_number =  number_format(($number / 1000), 1) . "K";	
					
				}
				else
				{
				
					//Everything else
					$simple_number = number_format($number, 0, '.', ',');	
				}
			}

		}
	}
	return($simple_number);
}
?>