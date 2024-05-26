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
			<link rel="stylesheet" href="css/style-xlarge.css"   />
                        
		</noscript>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>智能分類垃圾桶-忘記密碼</title>

	<body id="top">
        
        <header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">trash</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">首頁</a></li>
						<li><a href="statistics.php">統計</a></li>
						<li><a href="callme.php">聯絡我們</a></li>
						<li><a href="register.php">註冊</a></li>
						<li><a href="login.php" class="button special">會員登入</a></li>

					</ul>
				</nav>
			</header>
   
	<style>
		#center{
  		
				height:10em;
		}
form {

	width:20%;
	 margin: auto;

}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

#submit {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

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



<br>

<form  method="post" id="loginform" onsubmit="return checkinput()" 
        style="width: 300px; border: 1px solid gray; padding: 5px; text-align: center;">
<table style="text-align: left;">
        <tr>
                <td>帳號：</td>
                <td><input type="text" name="user" required="required1" id='login_name1' style="width: 150px"/></td>
               	   

        </tr>
        <tr>
                <td>EMAIL：</td>
                <td><input type="text" name="mail" required="required1" id='login_pass1' style="width: 150px"  /></td>
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
    session_start();
  
    

    error_reporting(E_ALL & ~E_NOTICE);
	$db_link=mysqli_connect("163.17.9.121","10614033","123456789","trash");
		if(!$db_link)
		{
			echo "連結失敗";
		}
	$user=$_POST["user"];
  $mail=$_POST["mail"];
  $mail1=(string)$mail;
    if($user && $mail)
    {
      $sql="SELECT `login_name` FROM `member` WHERE `login_name`='".$user."'";
	    $result = mysqli_query ($db_link,$sql );
      $rows=mysqli_fetch_array($result,MYSQLI_NUM);
      if($rows[0]==$user)
      {
        $_SESSION["user"]=$user;
        $sql="SELECT `login_name` FROM `member` WHERE `u_email`='".$mail."'";
	      $result = mysqli_query ($db_link,$sql );
        $rows=mysqli_fetch_array($result,MYSQLI_NUM);
        if($rows[0]==$user)
        {
          include(dirname(__FILE__)."\PHPMailer\PHPMailer.php"); //匯入PHPMailer類別  
          include(dirname(__FILE__)."\PHPMailer\SMTP.php");
          include(dirname(__FILE__)."\PHPMailer\Exception.php");
          
          $mail= new PHPMailer\PHPMailer\PHPMailer(); //建立新物件   
          $mail->IsSMTP(); //設定使用SMTP方式寄信   
          $mail->SMTPAuth = true; //設定SMTP需要驗證   
          $mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
          $mail->Host = "smtp.gmail.com"; //設定SMTP主機   
          $mail->Port = 465; //設定SMTP埠位，預設為25埠  
          $mail->CharSet = "UTF8"; //設定郵件編碼   
          
          $mail->Username = "trash20201201@gmail.com"; //設定驗證帳號   
          $mail->Password = "20trashwork12"; //設定驗證密碼   
          
          $mail->From = "trash20201201@gmail.com"; //設定寄件者信箱   
          $mail->FromName = "智能分類垃圾"; //設定寄件者姓名   
          
          $mail->Subject = "忘記密碼"; //設定郵件標題   
          $mail->Body = "https://trashsort.ddns.net/project/templated_update_0913/Newpasspad.php"; //設定郵件內容 
          $mail->IsHTML(true); //設定郵件內容為HTML   
          $mail->AddAddress($mail1); //設定收件者郵件及名稱
          session_write_close();   
          if(!$mail->Send()) {   
            echo "Mailer Error: " . $mail->ErrorInfo;   
          } 
          echo "<script>alert('驗證成功，請確認信箱'); location.href = 'login.php';</script>";
          exit;
        }
        else
        {
          echo "<script>alert('電子信箱驗證錯誤'); location.href = 'forget.php';</script>";
          exit;
        }
      }
      else
      {
        echo "<script>alert('無此帳號'); location.href = 'forget.php';</script>";
        exit;
      }
    }

    

    
	
?>


</body>
</html>