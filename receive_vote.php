<?php
function mres($value) //this function prevents the website from getting hacked through sql injection
{
$search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
$replace = array("\\\\", "\\0", "\\n", "\\r", "", '', "\\Z");
return str_replace($search, $replace, $value);
}

echo "receiving vote<br>";


if(isset( $_POST["callerid"]))
{

//clear out any harmful sql injection
$callerid = mres($_POST["callerid"]);
//show me the text for debugging purposes
echo "caller id is " . $callerid . "<br>";

//connect to DB
mysql_connect("localhost", "root", "jurassic23!") or die(mysql_error());
mysql_select_db("wordcloud") or die(mysql_error());

//check to see if the callerid is already in the database
$result2 = mysql_query("SELECT * FROM voters");

$alreadyvoted = 0;

while($row2 = mysql_fetch_array($result2))
{
	$phonenumber = $row2['phonenumber'];
	echo "comparing " . $callerid . " against " . $phonenumber .  "<br>";
	//if the callerid is in the database
	
	
	
	if($callerid == $phonenumber)
	{
		echo "That callerid has already voted.<br>";
		$alreadyvoted = 1;
	}	
	else
	{
		//do nothing for now if the callerid hasn't voted
	}
}
	
if($alreadyvoted == 0)
	{	
		//proceed with processing the vote
	
		if(isset( $_POST["text"]))
		{
			//clear out any harmful sql injection
			$text = mres($_POST["text"]);
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
			mysql_query("INSERT INTO voters (phonenumber) VALUES('$callerid') ") 
			or die(mysql_error());  


			echo "Entered data successfully\n";
		}

	}


	
	mysql_close();
}








?>