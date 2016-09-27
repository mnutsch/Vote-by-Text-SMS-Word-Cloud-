<?php
function mres($value) //this function prevents the website from getting hacked through sql injection
{
$search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
$replace = array("\\\\", "\\0", "\\n", "\\r", "", '', "\\Z");
return str_replace($search, $replace, $value);
}

echo "starting test<br>";


if(isset( $_GET["callerid"]))
{

//clear out any harmful sql injection
$callerid = mres($_GET["callerid"]);
//show me the text for debugging purposes
echo "caller id is " . $callerid . "<br>";

//connect to DB
mysql_connect("localhost", "username", "password") or die(mysql_error());
mysql_select_db("wordcloud") or die(mysql_error());

//check to see if the callerid is already in the database
$result2 = mysql_query("SELECT * FROM voters");
	 
while($row2 = mysql_fetch_array($result2))
{
	$phonenumber = $row2['phonenumber'];
	echo "comparing " . $callerid . " against " . $phonenumber .  "<br>";
	//if the callerid is in the database
	
	if($callerid == $phonenumber)
	{
		//do nothing for now if the callerid already voted
		echo "That callerid has already voted.<br>";
	}	
	else
	{
		//proceed with processing the vote
	
		if(isset( $_GET["text"]))
		{
			//clear out any harmful sql injection
			$text = mres($_GET["text"]);
			//show me the text for debugging purposes
			echo "The text received is " . $text . "<br>";

			//convert the text to lowercase
			$text= strtolower($text);
			echo "In lowercase the text is " . $text . "<br>";

			//connect to DB
			mysql_connect("localhost", "root", "jurassic23!") or die(mysql_error());
			mysql_select_db("wordcloud") or die(mysql_error());

			//Increase the value
			mysql_query("UPDATE wordcloud SET votes = votes + 1 WHERE text ='$text'")
			or die(mysql_error());
			
			//Insert the callerid
			mysql_query("INSERT INTO voters (phonenumber) VALUES('$phonenumber') ") 
			or die(mysql_error());  


			echo "Entered data successfully\n";
		}

	}
}

	
	mysql_close();
}








?>