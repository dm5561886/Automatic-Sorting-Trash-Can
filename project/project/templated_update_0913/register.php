<!DOCTYPE HTML>

<html>
	<head>
		<title>註冊會員資料</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">
	
		<!-- Header -->
	<header id="header" class="skel-layers-fixed">
		<h1><a href="index.php">trash</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="index.php">首頁</a></li>
				<li><a href="statistics.php">統計</a></li>
				<li><a href="Callme.php">聯絡我們</a></li>
				<li><a href="login.php" class="button special">會員登入</a></li>
			</ul>
		</nav>
	</header>
	<form id="regform" onsubmit="return checkinput()" >
		<table>
				<tr>
						<td>登入帳號：</td>
						<td><input type="text" name="login_name" required="required" id='login_name' /></td>
						<td>帳號只能是英文、數字、底線、減號與小數點，其餘字元均不接受</td>
				</tr>
				<tr>
						<td>登入密碼：</td>
						<td><input type="password" name="login_pass1" required="required" id='login_pass1' /></td>
						<td>至少 5 個位數以上的密碼長度</td>
				</tr>
				<tr>
						<td>確認密碼：</td>
						<td><input type="password" name="login_pass2" required="required" id='login_pass2' /></td>
						<td>再輸入一次密碼，確認沒有打錯字</td>
				</tr>
				<tr>
						<td>真實姓名：</td>
						<td><input type="text" name="realname" required="required" /></td>
						<td>填寫註冊者的姓名</td>
				</tr>
				<tr>
						<td>電子郵件：</td>
						<td><input type="email" name="u_email" /></td>
						<td>請填慣用的電子郵件</td>
				</tr>
				<tr>
						<td>生日：</td>
						<td><input type="date" name="u_bday" required="required" id='bday' /></td>
						<td>請務必使用 YYYY-MM-DD 的格式，如 1990-01-20</td>
				</tr>
				<tr>
						<td>性別：</td>
						<td><select name="u_sex">
								<option value="0">女性</option>
								<option value="1">男性</option>
						</select></td>
						<td>選擇性別</td>
				</tr>
				<tr>
						<td colspan="3" style="text-align:center; ">

							<!--	<img src="images/check.png" /><br /> -->
								
								<input type="hidden" name="action" value="reg" />
								<input type="submit" value="送出註冊" />
								
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
		<?
		session_start();
		include ("config.php");
        if ( isset ( $_REQUEST['action'] ) ) {
            if ( $_REQUEST['action'] == 'reg' ) {
				
                    // 先取得所需要的變數資料
                    $login_name  = $_REQUEST['login_name'];
                    $login_pass1 = $_REQUEST['login_pass1'];
                    $login_pass2 = $_REQUEST['login_pass2'];
                    $realname    = $_REQUEST['realname'];
                    $u_email     = $_REQUEST['u_email'];
                    $u_bday      = $_REQUEST['u_bday'];
					$u_sex       = $_REQUEST['u_sex'];
	

                    // 檢查登入者的帳號長度
                    if ( strlen($login_name) < 5 ) {
                            echo"<script>alert('登入帳號字元不足 5 個字元');history.go(-1);</script>";
            die;
                    }
                    if ( $login_pass1 != $login_pass2 ) {
                            echo"<script>alert('兩次密碼輸入不相同');history.go(-1);</script>";
            die;
					}
					
					$sql = "select * from member where login_name = '$login_name'";
					$result = mysqli_query ($db_link,$sql );
					$db_line = mysqli_num_rows($result);
					if ( $db_line >= 1 ) {
							echo "<script>alert('這個帳號已經存在了！請使用其他帳號註冊');history.go(-1);</script>";
							die;
					}
					else {
						include ('captcha.php');
					}
					$login_pass = $login_pass1;
					//hash ('sha256', $login_pass1);
                    $sql = "insert into member (id,login_name,login_pass,realname,u_email, u_bday,u_sex,u_manager) values ('0','$login_name', '$login_pass', '$realname', '$u_email', '$u_bday', '$u_sex','1' ) " ;
					$result = mysqli_query($db_link,$sql);
                    if ( $result ) {
                           header("Location: index.php");
                    } else {
                            echo"<script>alert('無法註冊！');history.go(-1);</script>";
            die;
					}
			

            }
    }
    ?>	
	</body>
</html>



