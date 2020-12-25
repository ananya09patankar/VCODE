<?php
try{
	$count=0;
	$dbh= new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connection failed:".$e->getMessage();
}
    if (empty($_POST["name"])) {
    echo "Name is required";
  } else {
    $name = testinput($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       echo "Only letters and white space allowed"; 
    }
    else{
    	$count++;
    }
  }
	$contact=testinput($_POST['contact']);
	 if (empty($_POST["contact"])) {
   echo "Contact No. is required";
  }
  else{
  	count++;
  }
	if (empty($_POST["email"])) {
    echo "Email is required";
  } else {
    $email = testinput($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format"; 
    }
    else{
    	$count++;
    }
  }
	$country=testinput($_POST['country']);
	$city=testinput($_POST['city']);
	$address=testinput($_POST['address']);
	 if (empty($_POST["address"])) {
   echo "Address is required";
  }
  else{
  	$count++;
  }
	$password=testinput($_POST['password']);
	 if (empty($_POST["password"])) {
    echo "Password is required";
  }
  else{
  	$hashedpassword=password_hash($password,PASSWORD_DEFAULT);
  	$count++;
  }
	function testinput($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

if(count<5)
	{
echo "<a href="users.php">Go to the sign up page again </a>"
	}
	else{
$q="INSERT into students(name,contact,email,country,city,address,password) VALUES ('$name', '$contact', '$email', '$country','$city','$address','$password')";
$dbh->exec($q);
	}


?>