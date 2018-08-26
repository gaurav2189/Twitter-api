<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body style="background-color:powderblue;">

<?php
// define variables and set to empty values
$nameErr = $emailErr = $tactionErr = $websiteErr = "";
$name = $name2=$email = $taction = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["taction"])) {
    $tactionErr = "Action name is required";
  } else {
    $taction = test_input($_POST["taction"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>ReTwitter</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p></p>
     <p> Actions: </p>

<br><br>
 <input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action1") echo "checked";?> value="Action1">Get Timeline
        <p>  </p>
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>



        <input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action2") echo "checked";?> value="Action2">Follow this person
        <p>  </p>
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>

		
		<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action3") echo "checked";?> value="Action3">No. of Friend's followers
        <p>  </p>
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>

        <p>  </p>
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action4") echo "checked";?> value="Action4">Send Direct message
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>
Enter Message: <input type="text" name="name2" value="<?php echo $name2;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>


        <p>  </p>
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action5") echo "checked";?> value="Action5">Get friend list
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>

        <p>  </p>
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action6") echo "checked";?> value="Action6">User Lookup
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>

        <p>  </p>
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action7") echo "checked";?> value="Action7">Get Status Retweet ID
<p>  </p>
Enter ID: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>
        <p>  </p>
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action8") echo "checked";?> value="Action8">Get follower ids
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>
        <p>  </p>
		
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action9") echo "checked";?> value="Action9">Search tweet
<p>  </p>
Enter TWEET: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>
        <p>  </p>
		
 <input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action10") echo "checked";?> value="Action10">Get TWEET using ID
        <p>  </p>
<p>  </p>
Enter TWEET ID: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
<p>  </p>		
<input type="radio" name="taction" <?php if (isset($taction) && $taction=="Action11") echo "checked";?> value="Action11">Print direct message 
<p>  </p>
Enter Username: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>
<p>  </p>
Enter message: <input type="text" name="name2" value="<?php echo $name2;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<p>  </p>

        <p>  </p>		
		
		
        <span class="error"> <?php echo $tactionErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php


//echo "<h2>Your Output:</h2>";

if ($taction == "Action1" or $taction == "Action2" or $taction == "Action3" or $taction == "Action4" or $taction == "Action5" or $taction == "Action6" or $taction == "Action7" or $taction == "Action8" or $taction == "Action9" or $taction == "Action10" or $taction == "Action11" )
{
session_start();
$_SESSION['input1'] = $name;
$_SESSION['action1'] = $taction;


header("Location: retwitterapi.php");

}


?>

</body>
</html>
