<!doctype html>
<html>
<head>
<title>會員登入</title>
<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
                <script src="js/init.js"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1">
               
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <script  src="https://lib.baomitu.com/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
                        <link rel="stylesheet" href="css/style-xlarge.css"   />
                        
                        
		</noscript>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>智能分類垃圾桶-會員登入</title>
   
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
                                                <li><a href="Callme.php">聯絡我們</a></li>
						<li><a href="register.php">註冊</a></li>
					</ul>
				</nav>
</header>

<br>

<form  method="post" id="loginform" onsubmit="return checkinput()" 
        style="width: 320px; border: 1px solid gray; padding: 5px; text-align: center;">
<table style="text-align: left;">
        <tr>
                <td>登入帳號：</td>
                <td><input type="text" name="login_name" required="required" id='login_name' style="width: 150px"/></td>
               	   

        </tr>
        <tr>
                <td>登入密碼：</td>
                <td><input type="password" name="login_pass" required="required" id='login_pass' style="width: 150px"  /></td>
        </tr>
        <tr>
                <td colspan="3" style="text-align:center; ">
                <a href="forget.php"><input  type="button" value="忘記密碼" ></a> 
                        <input type="submit" name ="submit" value="登入" />
                      
                </td>
                
        </tr>
        
        

</table>
</form>

<script>
        function checkinput() {
                // 檢查登入帳號是否有特殊字元
                var re = /[^a-zA-Z0-9.-_]/;
                var okname = re.exec ( document.getElementById("login_name").value);
                if ( okname ) {
                        window.alert ( "只允許英文、數字、底線、小數點與減號" );
                        document.getElementById("login_name").focus();
                        return false;
                }

                // 開始檢查密碼長度是否正確？
                var pw = document.getElementById("login_pass");
                if ( pw.value.length < 5 ) {
                        window.alert ( "密碼長度必須要大於 5 個字元以上" );
                        document.getElementById("login_pass").focus();
                        return false;
                
                }
        }
        
</script>
        
<?
        error_reporting(E_ALL & ~E_NOTICE);
        session_start();
        include ("config.php");
        echo "<p style=text-align:center background-color:red;></p>";
        if(!isset($_REQUEST['submit']))
        {       

        }
        
        $username=$_POST["login_name"];
        @$userpass=$_POST["login_pass"];
        $_SESSION['number']= $username;
        if($username && $userpass)
        {
                $sql = "select login_name,login_pass from member where login_name='".$username. "'and login_pass='".$userpass."'";
                $result = mysqli_query ($db_link,$sql );
                $rows=mysqli_fetch_array($result,MYSQLI_NUM);
                
                if($rows[0]==$username)
                {
                        if($rows[1]==$userpass)
                        {
                                $_SESSION["username"]= 1;
                                $_SESSION["account"]=$rows[0];
                                echo "<script>alert('登入成功'); location.href = 'Blogin.php';</script>";
                              
                                exit;
                               
                        }
                        else
                        {
                                echo "<script>alert('密碼錯誤'); location.href = 'login.php';</script>";
                                exit;
                        }
                }
                else
                {
                        echo "<p style=text-align:center background-color:red;>帳號或密碼錯誤</p>";
                }
        }
       
?>

</body>
</html>