<!DOCTYPE html>
<html>
<head>
<title>
To-DO PHP
</title>
<link rel="stylesheet" href="1.css">
</head>
<body>
<?php
//function to refine values taken from the file
function refine($x){
	$x=trim($x);
	$x=stripslashes($x);
	$x=htmlspecialchars($x);
	return($x);
}

//Existing user
if (!empty($_REQUEST['name'])){
	$name=$_REQUEST['name'];
	$encrypt=$_REQUEST['extra'];
	$c=(float)$encrypt;
	$e=1;
	$p=94339823;
	$q=94339831;
	$n=$p*$q;
	$phi=8900002769710260;
	for ($i=0;$i<=$e;$i++) {
		if((($phi*$i)+1)%$e==0){
			$d=(($phi*$i)+1)/$e;
			break;
		}
	}
	$m=(pow($c,$d)%$n); 

	$first=substr($m,-4,2);
	$first=(int)$first;
	if ($first<33){
		$first=$first+90;
	}	
	$second=substr($m,-2);
	$second=(int)$second;
	if ($second<33){
		$second=$second+90;
	}
	$first=chr($first);
	$second=chr($second);
	$pwd=$first.$second;
	
	//Read file contents and convert to key-value pairs
	$file='credentials.txt';
	if (file_exists($file)) {
		$credentials=array();
		$lines=file($file);
		foreach($lines as $i => $line){
			$line_arr=explode(" ",$line);
			$credentials[$line_arr[0]]=$line_arr[1];
		}
		//Flag to keep track of whether username matched any key
		$found=0;
		foreach($credentials as $u => $p){
			//If name matches key
			if ($name==$u){
				$p=refine($p);
				//If passwords match, direct to the to-do page
				if ($p==$pwd){
					header("Location:toDo.php?n=".$u);
				}
				//If they don't, print a message
				else{
					echo "Incorrect password";
					header("refresh:1.5;url=existingUser.php");
				}
				$found=1;
				break;
			}
		}
		//If username not present in the file
		if ($found==0){
			echo "Not found. Create an account";
			header("refresh:1;url=newUser.php");
		}
	}
}
//New user
if (!empty($_REQUEST['name1'])){
	$newName=$_REQUEST['name1'];
	$newPwd=$_REQUEST['pwd1'];
	$pointer=$newName." ".$newPwd;
	//Store user input in file
	$file='credentials.txt';
	//If file exists, retrieve existing content, append the new content and write to file, each pair on a new line
	if (file_exists($file)) {
		$existing=file_get_contents($file);
		$pointer=$existing."\r\n".$pointer;
		file_put_contents($file,$pointer);
	} 
	//Otherwise directly write to file
	else {
		file_put_contents($file,$pointer);
	}
	echo "You're all set!";
	header("refresh:1.5;url=toDo.php?n=".$newName);
}


?>
</body>
</html>