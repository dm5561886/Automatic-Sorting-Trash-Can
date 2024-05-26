
<!DOCTYPE HTML>
<html>
	<head>
		
		<title>修改會員資料</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">
	
		<!-- Header -->
	<header id="header" class="skel-layers-fixed">
	<h1><a href="Blogin.php">trash</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="Blogin.php">首頁</a></li>
						<li><a href="Bstatistics.php">統計</a></li>
						<li><a href="CCallme.php">聯絡我們</a></li>
						<li><a href="Alert.php">修改會員資料</a></li>
						<li><a href="index.php" class="button special">會員登出</a></li>
			</ul>
		</nav>
	</header>
	<!--<form id="regform" onsubmit="return checkinput()" >-->
	<form id="regform" action="update_member.php" method="post">
    <table>     
            
			<?
				include ("config.php");
				session_start();
				$sql = "select * from member where login_name='".$_SESSION["account"]. "'";
                $result = mysqli_query ($db_link,$sql );
				$rows=mysqli_fetch_array($result,MYSQLI_NUM);
				
			
			?>
				<tr class="col-12">
						<td >修改帳號：</td>
						<td ><input type="text" name="login_name" required="required" id='login_name' value=<? echo $rows[1];?>></td>
						<td >帳號只能是英文、數字、底線、減號與小數點，其餘字元均不接受</td>
				</tr>
				<tr class="col-12">
						<td>修改密碼：</td>
						<td><input type="text" name="login_pass1" required="required" id='login_pass1' value=<? echo $rows[2];?>></td>
						<td>至少 5 個位數以上的密碼長度</td>
				</tr> 
				<tr class="col-12">
						<td>確認密碼：</td>
						<td><input type="text" name="login_pass2" required="required" id='login_pass2' value=<? echo $rows[2];?>></td>
						<td>再輸入一次密碼，確認沒有打錯字</td>
				</tr>
				<tr class="col-12">
						<td>真實姓名：</td>
						<td><input type="text" name="realname" required="required" value=<? echo $rows[3];?>></td>
						<td>填寫註冊者的姓名</td>
				</tr>
				<tr class="col-12">
						<td>電子郵件：</td>
						<td><input type="email" name="u_email" value=<? echo $rows[4];?>></td>
						<td>請填慣用的電子郵件</td>
				</tr>
				<tr class="col-12">
						<td>生日：</td>
						<td><input type="date" name="u_bday" required="required" id='bday' value="<? echo "$rows[5]";?>"></td>
						<td>請務必使用 YYYY-MM-DD 的格式，如 1990-01-20</td>
				</tr>
				<tr class="col-12">
						<td>性別：</td>
						<td><select name="u_sex" value=<? echo $rows[6];?>>
								<option value="0">女性</option>
								<option value="1">男性</option>
						</select></td>
						<td>選擇性別</td>
				</tr>
				<tr class="col-12">
						<td colspan="3" style="text-align:center; ">

							<!--	<img src="images/check.png" /><br /> -->
							<!--	<input type="text" name="checking" /><br />-->
								<input type="hidden" name="action" value="reg" />
								<input type="submit" value="確認修改" />
								
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
								window.alert ( "指允許英文、數字、底線、小數點與減號" );
								document.getElementById("login_name").focus();
								return false;
						}
		
						// 開始檢查密碼長度是否正確？
						var pw1 = document.getElementById("login_pass1");
						if ( pw1.value.length < 5 ) {
								window.alert ( "密碼長度必須要大於 5 個字元以上" );
								document.getElementById("login_pass1").focus();
								return false;
						}
		
						// 看看兩次密碼是否相同？
						var pw2 = document.getElementById("login_pass2");
						if ( pw1.value != pw2.value ) {
								window.alert ( "兩次密碼並不相同！" );
								document.getElementById("login_pass1").focus();
								return false;
						}
		
						// 檢查生日的格式正確與否
						re = /^[0-9]{4}[./-][0-9]{2}[./-][0-9]{2}$/;
						var okday = re.exec ( document.getElementById("bday").value);
						if ( ! okday ) {
								window.alert ( "日期格式為 2011-11-11" );
								document.getElementById("bday").focus();
								return false;
						
						}
				}
		
		</script>
	
		</form>
    <?
	
	if(!isset($_SESSION["username"])) {
		echo "<script>alert('請先登入'); location.href = 'login.php';</script>";
	}
   // print_r($_SESSION);
   if ( isset ($_POST['action'] ) ) {
        if ( $_POST['action'] =='reg') {
   // if ( isset ( $_REQUEST['action'] && ($_REQUEST['action'] == 'update') )
                $id           =$_POST['id'];
                $login_name  = $_POST['login_name'];
                $login_pass1 = $_POST['login_pass1'];
                $login_pass2 = $_POST['login_pass2'];
                $realname    = $_POST['realname'];
                $u_email     = $_POST['u_email'];
				$u_bday      = $_POST['u_bday'];
                $u_sex       = $_POST['u_sex'];
                
            // 檢查登入者的帳號長度
            if ( strlen($login_name) < 5 ) {
                echo"<script>alert('登入帳號字元不足 5 個字元');history.go(-1);</script>";
            die;
        }
        if ( $login_pass1 != $login_pass2 ) {
                echo"<script>alert('兩次密碼輸入不相同');history.go(-1);</script>";
            die;
        }
        
        $login_pass = $login_pass1;
        //$sql = "insert into member (id,login_name,login_pass,realname,u_email, u_bday,u_sex,u_manager) values ('0','$login_name', '$login_pass', '$realname', '$u_email', '$u_bday', '$u_sex','1' ) " ;
        $sql= "UPDATE `member` SET `login_name`= '$login_name' ,`login_pass`='$login_pass',`realname`='$realname',`u_email`= '$u_email'  , `u_bday`='$u_bday' ,`u_sex`='$u_sex'  WHERE `login_name`= $login_name";
        
        $result = mysqli_query($db_link,$sql);
         if($result)
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }



          
            

        }
        
    }
    ?>


		
	</body>
</html>

