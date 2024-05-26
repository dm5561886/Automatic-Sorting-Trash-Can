<!doctype html>
<html>
<head>
<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
      
     
		</noscript>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>智能分類垃圾桶-忘記密碼</title>
   
	<style>
	
		/*body{
			background-image: url(images/3.jpg)
			
		}*/
		#center{
  		
				height:10em;
		}
		/* Bordered form */
form {

	width:20%;
	 margin: auto;

}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
#submit {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
	</style>
</head>

<body>
<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">trash</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">首頁</a></li>
                        <li><a href="statistics.php">統計</a></li>
                        <li><a href="Callme.html">聯絡我們</a></li>
                        <li><a href="register.php">註冊</a></li>
                        <li><a href="login.php" class="button special">會員登入</a></li>
					</ul>
				</nav>
</header>

<br>
<? 
session_start();
if(!isset($_SESSION['user']))
{
  $_SESSION['user']="2";
}
?>
<form  method="post" id="loginform" onsubmit="return checkinput()" 
        style="width: 320px; border: 1px solid gray; padding: 5px; text-align: center;">
<table style="text-align: left;">
        <tr>
                <td>帳號：</td>
                <td><input type="text" name="user"  id='login_name2' style="width: 150px"/></td>
        </tr>
        <tr>
                <td>新密碼：</td>
                <td><input type="text" name="newpass"  id='login_name2' style="width: 150px"/></td>
        </tr>
        <tr>
                <td>確認密碼：</td>
                <td><input type="password" name="checknewpass"  id='login_pass2' style="width: 150px"  /></td>
        </tr>
        <tr>
                <td colspan="3" style="text-align:center; ">
                <input  type="submit" value="確認送出" ></a>  
                <a href="login.php"><input  type="button" value="取消" ></a>                      
                </td>
                
        </tr>
</table>
</form>
<?
  error_reporting(E_ALL & ~E_NOTICE);
	$db_link=mysqli_connect("163.17.9.121","10614033","123456789","trash");
		if(!$db_link)
		{
			echo "連結失敗";
        }
    $user=$_POST["user"];
    $newpass=$_POST["newpass"];
    $checknewpass=$_POST["checknewpass"];
    if($newpass && $checknewpass)
    {
        if($newpass==$checknewpass)
        {
          $sql="UPDATE member SET `login_pass`='".$newpass."' WHERE `login_name`='".$user."'";
          mysqli_query ($db_link,$sql );
          echo "<script>alert('修改成功'); location.href = 'login.php';</script>";
          exit;
        }
        else
        {
            echo "<p style=text-align:center background-color:red;>確認密碼錯誤</p>";
        }
    }
?>
</body>
</html>