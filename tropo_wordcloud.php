<?php

//define variables
$str = "";
$str = strtolower($currentCall->initialText);

//if the string starts with a number then convert it to text$str = preg_replace('/\s+/', '', $str);
//is the text a number
if (is_numeric($str))
{
	//echo "The text is numeric.";
	
	if($str == '1') { $str = 'ampcare'; }
		else if($str == '2') { $str = 'anelto'; }
		else if($str == '3') { $str = 'emist'; }
		else if($str == '4') { $str = 'flexibleinnovations'; }
		else if($str == '5') { $str = 'resonantsensors'; }
		else if($str == '6') { $str = 'revitalizecharging'; }
		else if($str == '7') { $str = 'surgerylink'; }
		else if($str == '8') { $str = 'vitalarts'; }

		//echo "The text is now " . $str . "<br>";
}
else
{

	//find the position of the period in the string
	preg_match("/[^a-zA-z0-9 -\/]/i", $str, $match_list, PREG_OFFSET_CAPTURE);
	$pos = $match_list[0][1];
	//echo "A non-numeric character was found at" . $pos . "<br>";
	if($pos <> 0)
	{
		$str = substr($str, 0, ($pos));
	}
	//echo "The text before the period is " . $str . "<br>";

	//is the text a number now
	if (is_numeric($str))
	{
		//echo "The text is numeric.";
		
		if($str == '1') { $str = 'ampcare'; }
		else if($str == '2') { $str = 'anelto'; }
		else if($str == '3') { $str = 'emist'; }
		else if($str == '4') { $str = 'flexibleinnovations'; }
		else if($str == '5') { $str = 'resonantsensors'; }
		else if($str == '6') { $str = 'revitalizecharging'; }
		else if($str == '7') { $str = 'surgerylink'; }
		else if($str == '8') { $str = 'vitalarts'; }

		//echo "The text is now " . $str . "<br>";

	}
}

$callerid = $currentCall->callerID;
//say("The caller ID is " . $callerid);

function submitValue($myValue) {
$ch = curl_init();


$values = array(
	'text' => $myValue,
	'callerid' => $callerid);

$params = http_build_query($values);	
	
curl_setopt($ch, CURLOPT_URL, "http://www.mattnutsch.com/development/wordcloud/receive_vote.php" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$output = curl_exec($ch);

if (curl_getinfo($ch, CURLINFO_HTTP_cite) != '200') {
return null;
}

return $output;
}

submitValue($str);
//say("insert output is " . $output);

$str = strtolower($str);

//Reply by SMS
if ($str=="debug") {
submitValue($str);
say("insert output is " . $output);
}
elseif($str=="anelto") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="emist") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="revitalizecharging") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="surgerylink") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="vitalarts") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="ampcare") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="flexibleinnovations") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
elseif($str=="resonantsensors") {
submitValue($str);
say("Thank you for your vote! It will be included in the wordcloud.");
}
else {
//don't submit this vote
say("Sorry! That is not a valid option. Please text one of the following: 1. AmpCare, 2. Anelto, 3. Emist, 4. FlexibleInnovations, 5. ResonantSensors, 6. RevitalizeCharging, 7. SurgeryLink, 8. VitalArts");
}

?>