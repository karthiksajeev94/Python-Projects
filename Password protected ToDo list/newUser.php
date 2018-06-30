<!DOCTYPE html>
<!--Login Page for new users-->
<html>
<head>
<title>
New User Login
</title>
<link rel="stylesheet" href="1.css">
<script>
//function to check validity of user input
function validate(){
	var name1=document.forms["createNew"]["name1"].value;
	var pwd1=document.forms["createNew"]["pwd1"].value;
	//Flag to check if ANY error occurred
	var f=0;
	//No errors to display each time Submit is pressed
	document.getElementById("errors").innerHTML="";
	//Username validation
	if (name1.length<6) {
		document.getElementById("errors").innerHTML="Username should have at least 6 characters<br>";
		f=1;
	}
	if (name1.search(/[^0-9a-zA-Z]+/)!=-1){
		document.getElementById("errors").innerHTML=document.getElementById("errors").innerHTML+"Username must be alphanumeric<br>";
		f=1;
	}
	if (name1.search(/\b[A-Za-z]/)!=0) {
		document.getElementById("errors").innerHTML=document.getElementById("errors").innerHTML+"Username must start with an alphabet<br>";
		f=1;
	}
	//Password validations
	if (pwd1.length>2) {
		document.getElementById("errors").innerHTML=document.getElementById("errors").innerHTML+"Password should have atmost 2 characters<br>";
		f=1;
	}
	if (pwd1.search(/[^0-9a-zA-Z._]+/)!=-1){
		document.getElementById("errors").innerHTML=document.getElementById("errors").innerHTML+"Password should contain only alphanumeric characters and . or _<br>";
		f=1;
	}
	//If ANY error occurred, prevent form from submitting
	if (f==1){
		return false;
	}
}
</script>
</head>
<body>
<div id="holder">
<center>
Create an Account
<br><br>
<form name="createNew" method="post" action="formHandler.php" onsubmit="return validate()">
Username:
<input type="text" name="name1" required>
<br><br>
Password:
<input type="password" name="pwd1" required>
<br><br>
<input type="submit" value="Submit">
</form>
</center>
<br>
<div id="errors"></div>
</div>

</body>
</html>