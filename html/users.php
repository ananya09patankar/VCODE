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
    echo "Name is required"."</br>";
  } else {
    $name = testinput($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       echo "Only letters and white space allowed"."</br>"; 
    }
    else{
    	$count++;
    }
  }
	$contact=testinput($_POST['contact']);
	 if (empty($_POST["contact"])) {
   echo "Contact No. is required"."</br>";
  }
  else{
    if(strlen($contact)!=10){
      echo"Invalid contact No."."</br>";
    }
    else{
  	$count++;
  }
}
	if (empty($_POST["email"])) {
    echo "Email Id is required"."</br>";
  } else {
    $email = testinput($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format"."</br>"; 
    }
    else{
    	$count++;
    }
  }
	$country=testinput($_POST['country']);
	$city=testinput($_POST['city']);
	$address=testinput($_POST['address']);
	 if (empty($_POST["address"])) {
   echo "Address is required"."</br>";
  }
  else{
  	$count++;
  }
	$password=testinput($_POST['password']);
	 if (empty($_POST["password"])) {
    echo "Password is required"."</br>";
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

if($count<5)
	{
echo "Go to Signup page again";
	}
	else{
 $id=$city.$contact;   
$q="INSERT into students(name,contact,email,country,city,address,password,id) VALUES ('$name', '$contact', '$email', '$country','$city','$address','$hashedpassword','$id')";
if($dbh->exec($q)){
   header("Location:index.html");
}
else{
  echo "ERROR: Couldn't Execute";
	}
}
?>