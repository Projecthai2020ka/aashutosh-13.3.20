<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/login/style.css" type="text/css" rel="stylesheet">
	<title>Pragmatic Login</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</head>
<body background>
<table bgcolor="black" width="100%">

<tr><td><a href="index.php" class="navbar-brank">
    <img src="pics/logo.png" width="40%" align="left">
</a></td>
<td width="400" align="CENTER"> <font color="white" face="arial" size="+2">Welcome Back Dear Customer</font>
</td></tr>
</table>




<div class="loginbox">
    <img src="css/login/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form name="myjs" action="login.php" method="POST">
            <p>Username</p>
            <input type="text" placeholder="Enter Username" name="email">
            <p>Password</p>
			<input type="password" placeholder="Enter Password" name="password">
			<!--<button id="button" type="submit" onclick="return jsfunc()" >Get Started</button>-->
            <input type="submit" name="" value="Login" onclick="return jsfunc()" id="button">
            
            <a href="regis.php">Don't have an account?</a>
        </form>
        
    </div>



<!--	<div id="last">
		<div id="end">
			<a href="about.html">About   </a>
			<a id="a1" href="terms.html">Terms  </a>
			<a id="a1" href="contact.html">Contact Us</a>
			<div id="copy"><b>Designed by Pragmatic Bond</b></div>
		</div>
			
	</div>-->
	
		<script type="text/javascript">	
			function jsfunc()
			{
				var mail=document.myjs.email.value;
				var pass=document.myjs.password.value;
				if(pass.length<10){
					alert("Wrong password");return false;}
				else if(mail==""||pass==""){
					alert("Something missing");return false;}
				else
				{
					return true;
				}
			}
		</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
   $email=$_POST["email"];
   $password=$_POST["password"];

   $con = mysqli_connect("localhost","root","","AKA");
   //checking
   if(!$con) //if false, then show error msg. else we r good to go
   {
          die("connection failed".mysqli_connect_error());
   }

   $sql="select * from registered_users where email='$email'";
   $result=mysqli_query($con,$sql);

   if(mysqli_num_rows($result) > 0)
    {
       $row=$result -> fetch_row();
       if($password==$row[2])
       {
			$sql="select * from active_session where email='$email'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)> 0)
    		{
				echo '<script>alert("You are Logged in")</script>';
				echo "<script>location.href='index.html'</script>";
			}
			else
			{
              $sql="insert into active_session values('$email','$row[1]')";
              if(mysqli_query($con,$sql))
              {
				echo '<script>alert("You are Logged in")</script>';
				echo "<script>location.href='index.html'</script>";
			  }
			}
	   }
	   else
	   {
		echo '<script>alert("password mismatch")</script>';
	   }
    }
    else
    {
        echo '<script>alert("Not Registered")</script>';
    }
    
	mysqli_close($con);
}

?>