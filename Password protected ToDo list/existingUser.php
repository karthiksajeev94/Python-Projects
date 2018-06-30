<!DOCTYPE html>
<!--Login Page for existing users-->
<html>
<head>
<title>
To-Do Login
</title>
<link rel="stylesheet" href="1.css">
<script>
function encode(){
	var encodedPwd="";
	var e=1;
	var p=94339823;
	var q=94339831;
	var n=p*q;
	//phi(n)=8900002769710260
	var barePwd=document.getElementById('pwd').value;
	if (barePwd.search(/[^0-9a-zA-Z!_@]+/)==-1){
		for (i=0;i<barePwd.length;i++){
			if (barePwd.charCodeAt(i)>99){
				encodedPwd=encodedPwd+(barePwd.charCodeAt(i)-90).toString();
			}
			else{
				encodedPwd=encodedPwd+barePwd.charCodeAt(i).toString();	
			}
			
		}
	var m=parseInt(encodedPwd);
	//alert(encodedPwd);
	var c=(Math.pow(m,e))%n;
	}
	else{
		alert("Invalid password!");
	}
	document.getElementById("hidden").value=c;
	document.getElementById("myForm").submit();
	
}

</script>
</head>
<body>
<div id="holder">
<center>
Login to To-Do List
<br><br>
<form method="post" name="myForm" id="myForm" action="formHandler.php">
Username:
<input type="text" name="name">
<br><br>
Password:
<input type="password" name="pwd" id="pwd">
<br><br>
<input type="hidden" name="extra" id="hidden" value="abc">
<input type="button" onclick="encode()" value="Submit">
</form>
</center>
<br><br>
<a href="newUser.php">New User?</a>
</div>
</body>
</html>