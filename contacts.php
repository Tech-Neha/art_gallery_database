<!DOCTYPE html>
<html>
<head>
    <title>Insertion in Contacts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h1{
    border: 10px solid grey;
    border-radius: 28px;
    padding: 19px;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
}

* {
    box-sizing: border-box;
}

.container {
    padding: 19px;
    background-color: snow;
}

input[type=text], input[type=text]
 {
    width: 50%;
    padding: 19px;
    margin: 5px 0 32px 0;
    display: inline-block;
    border-radius: 8px;
    border: 2px solid grey;
    background: #f1f1f0;
    font-weight: bold;
    font-size: 19px;
}

input[type=text]:focus, input[type=text]:focus {
    background-color: #ffffff;
    outline: none;
}

hr {
    border: 1.5px solid #f1f1f1;
    margin-bottom: 35px;
}

.error {color: #FF0000;}

.registerbtn{
    background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 15%; opacity: 0.7; align-content: center;
    font-family: "verdana";
    font-weight: bold;
   /* -webkit-box-shadow: 0px 6px 0px green;
    -moz-box-shadow: 0px 6px 0px green;
    box-shadow: 0px 6px 0px green;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)*/
    }
.registerbtn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}

.registerbtn1{
    background-color: red;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 15%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
   /* -webkit-box-shadow: 0px 6px 0px darkred;
    -moz-box-shadow: 0px 6px 0px darkred;
    box-shadow: 0px 6px 0px darkred;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)*/
    }
.registerbtn1:hover 
{
    opacity: 1;
    background-color:red;
}

label{
    font-weight: bold;
    font-size: 20px;
    font-family: 'verdana';
}
</style>
</head>
<body>
<?php

 session_start();
  $id = $_SESSION['CID'];
  $phone3Err = "";
  $phone3 = "";
  $n=0;

   if (empty($_POST["PHONE3"])) {
    $phone3Err = "Phone3 is required";
  } else {
    $phone3 = $_POST["PHONE3"];
    if (!preg_match('/^[0-9]{10}+$/', $phone3)) {
      $phone3Err = "Enter 10-digit no";
  }
  else {$n++;}
}

  ?>
<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center><div style="font-weight: bold; font-size: 30px; font-family: 'verdana';">Your CUSTOMER ID is:<?php
         echo $id;
    ?>
    </div></center>
    <br>
    <br>
    <center>
    <!-- <label for="custid"><b>Customer ID</b></label><br>
    <input type="text" placeholder="Enter custid" name="custid" required><br> -->

    <label for="phone"><b>Phone</b></label><span class="error">* <?php echo $phone3Err;?></span><br>
    <input type="text" placeholder="Enter Phone No" name="PHONE3" required value="<?= $phone3; ?>"><br>
    </hr>


    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial"><a href="customer.php"><font style="color:green">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="clogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>

 <?php
    // if(isset($_POST['custid']) && isset($_POST['phone'])):
    // $custid = $_POST['custid'];
    // $phone = $_POST['phone'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

     if($n==1){

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO CONTACTS(cid, phone3) VALUES('".$id."', '".$phone3."')";

      

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully Inserted into Contacts table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    // endif; 
}
}
?>
