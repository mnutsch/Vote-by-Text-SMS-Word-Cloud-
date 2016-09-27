<?php

//define variables
$str = "";

$str = "3dtransform";

//if the string starts with a number then convert it to text$str = preg_replace('/\s+/', '', $str);
//is the text a number
if (is_numeric($str))
{
	//echo "The text is numeric.";
	
	if($str == '1') { $str = '3dmicrotech'; }
		else if($str == '2') { $str = 'anelto'; }
		else if($str == '3') { $str = 'encorevision'; }
		else if($str == '4') { $str = 'magawmedical'; }
		else if($str == '5') { $str = 'medhab'; }
		else if($str == '6') { $str = 'photofusion'; }
		else if($str == '7') { $str = 'emistinnovations'; }
		else if($str == '8') { $str = 'intellirail'; }
		else if($str == '9') { $str = 'revitalizecharging'; }
		else if($str == '10') { $str = 'sonnovus'; }
		else if($str == '11') { $str = 'surgerylink'; }
		else if($str == '12') { $str = 'vitalarts'; }
		else if($str == '13') { $str = 'zoomaltechnologies'; }
		else if($str == '14') { $str = 'ampcare'; }
		else if($str == '15') { $str = 'bearteksolutions'; }
		else if($str == '16') { $str = 'compumatrice'; }
		else if($str == '17') { $str = 'benhogangolf'; }
		else if($str == '18') { $str = 'flexibleinnovations'; }
		else if($str == '19') { $str = 'resonantsensors'; }

		//echo "The text is now " . $str . "<br>";
}
else
{

	//find the position of the period in the string
	preg_match("/[^a-zA-z0-9 -\/]/i", $str, $match_list, PREG_OFFSET_CAPTURE);
	$pos = $match_list[0][1];
	echo "A non-numeric character was found at" . $pos . "<br>";
	
	if($pos <> 0)
	{
		$str = substr($str, 0, ($pos));
	}
	//echo "The text before the period is " . $str . "<br>";

	//is the text a number now
	if (is_numeric($str))
	{
		//echo "The text is numeric.";
		
	if($str == '1') { $str = '3dmicrotech'; }
		else if($str == '2') { $str = 'anelto'; }
		else if($str == '3') { $str = 'encorevision'; }
		else if($str == '4') { $str = 'magawmedical'; }
		else if($str == '5') { $str = 'medhab'; }
		else if($str == '6') { $str = 'photofusion'; }
		else if($str == '7') { $str = 'emistinnovations'; }
		else if($str == '8') { $str = 'intellirail'; }
		else if($str == '9') { $str = 'revitalizecharging'; }
		else if($str == '10') { $str = 'sonnovus'; }
		else if($str == '11') { $str = 'surgerylink'; }
		else if($str == '12') { $str = 'vitalarts'; }
		else if($str == '13') { $str = 'zoomaltechnologies'; }
		else if($str == '14') { $str = 'ampcare'; }
		else if($str == '15') { $str = 'bearteksolutions'; }
		else if($str == '16') { $str = 'compumatrice'; }
		else if($str == '17') { $str = 'benhogangolf'; }
		else if($str == '18') { $str = 'flexibleinnovations'; }
		else if($str == '19') { $str = 'resonantsensors'; }

		//echo "The text is now " . $str . "<br>";

	}
}

echo "The text is now " . $str . "<br>";

$myValue = "intellirail";
$callerid = "12345";
$values = array(
	'text' => $myValue,
	'callerid' => $callerid);

$params = http_build_query($values);
echo "params is " . $params;

?>