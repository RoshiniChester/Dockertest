<?php
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"quizdb");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }

  if(isset($_POST["submit"])){  
  
if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $user=$_POST['email'];  
    $pass=$_POST['password'];  
     $pass=md5($pass);
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('quizdb') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM admin WHERE email='".$user."' AND password='".$pass."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysql_fetch_assoc($query))  
    {  
    $dbusername=$row['email'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: quizzie.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  


 

<!DOCTYPE html>
<html>
<head>
<title>Quizzie login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url("https://fonts.googleapis.com/css?family=Spartan&display=swap");
body {
  background: url("https://sharegate.com/app/uploads/2020/05/sgdesktop-teamsmigration-release-featured-1-920x517.png")repeat;
  font-family: "Spartan";
}

.login {
  overflow: hidden;
  background-color: white;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
  -moz-transition: -moz-transform 300ms, box-shadow 300ms;
  transition: transform 300ms, box-shadow 300ms;
  box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
}
.login::before, .login::after {
  content: "";
  position: absolute;
  width: 600px;
  height: 600px;
  border-top-left-radius: 40%;
  border-top-right-radius: 45%;
  border-bottom-left-radius: 35%;
  border-bottom-right-radius: 40%;
  z-index: -1;
}
.login::before {
  left: 40%;
  bottom: -140%;
  background-color: rgba(69, 105, 144, 0.15);
  -webkit-animation: wawes 6s infinite linear;
  -moz-animation: wawes 6s infinite linear;
  animation: wawes 6s infinite linear;
}
.login::after {
  left: 35%;
  bottom: -135%;
  background-color: #ba2d0b;
background-image: linear-gradient(319deg, #ba2d0b 0%, #fe7f2d 37%, #ffbf46 100%);

  -webkit-animation: wawes 7s infinite;
  -moz-animation: wawes 7s infinite;
  animation: wawes 7s infinite;
}
.login > input {
  display: block;
  border-radius: 5px;
  font-size: 16px;
  background: white;
  width: 100%;
  border: 0;
  padding: 10px 10px;
  margin: 15px -10px;
}
.login > button {
  cursor: pointer;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  width: 80px;
  border: 0;
  padding: 10px 0;
  margin-top: 10px;
  margin-left: -5px;
  border-radius: 5px;
  background-color: #ba2d0b;
background-image: linear-gradient(319deg, #ba2d0b 0%, #fe7f2d 37%, #ffbf46 100%);

  -webkit-transition: background-color 300ms;
  -moz-transition: background-color 300ms;
  transition: background-color 300ms;
}
.login > button:hover {
  background-color: #f24353;
}

@-webkit-keyframes wawes {
  from {
    -webkit-transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes wawes {
  from {
    -moz-transform: rotate(0);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@keyframes wawes {
  from {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -ms-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
a {
  text-decoration: none;
  color: rgba(255, 255, 255, 0.6);
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 14px;
}
</style>
</head>
<body>
<form class="login" method="post" action="quizzie.php" onsubmit="ValidateEmail(document.myform.email);">
  <h1><center> ADMIN LOGIN </center></h1><br>
  <input type="text" placeholder="Email" name="email">
  <input type="password" placeholder="Password" name="password">
  <button>Login</button>
  <h1><a href="User/index.php">User Login In</a></h1>
</form>
<script>  
function ValidateEmail(email) 
{
 if (/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@gmail.com$/.test(myform.email.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
  
</script>
</body>
</html>