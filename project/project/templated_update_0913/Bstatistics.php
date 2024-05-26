<!DOCTYPE HTML>

<html>
	<head>
		<title>會員專區</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
						<li><a href="alert.php">修改會員資料</a></li>
						<li><a href="index.php"><input class="button special" type="submit" value="會員登出" ></a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>統計資料</h2>
					<p>讓顧客了解各類垃圾所佔的比例</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section>
								<h3>功能介紹</h3>
								<p>在這裡可以了解到顧客各個垃圾所佔的比例，也能利用長條圖讓民眾一目了然，是個非常方便的功能。</p>
							</section>
							<hr />
							<section>
								<h3>分類類別</h3>
								<ul class="alt">
								<li  style="color:dodgerblue"><a href="bottle_statics.php">寶特瓶</a></li>
								<li  style="color:dodgerblue"><a href="can_statics.php">鐵鋁罐</a></li>
								<li  style="color:dodgerblue"><a href="paper_statics.php">紙類</a></li>
								<li  style="color:dodgerblue"><a href="other_statics.php">其他</a></li>
								

					
									<!--<li style="color:dodgerblue">鐵鋁罐</li>-->
						
						
								
						</section>
						</div>
						<div class="8u skel-cell-important">
						<section>
								<h2>統計圖表</h2>
								

						
						
						
						<tr>
				</tr>
					
                             				
				</section>
			
            
            <? 
			
			session_start();
			if(!isset($_SESSION["username"])) {
				echo "<script>alert('請先登入'); location.href = 'login.php';</script>";
			}
			include ("config.php");
			$seldb=mysqli_select_db($db_link ,"trash"); //選擇資料庫，並確定是否正確
			if (!$seldb) die("資料庫選擇失敗");
			$sql_query ="select  * from trash_identify  where id_serial=1";
			$sql_query0 ="SELECT COUNT(id_serial) FROM trash_identify WHERE id_serial='0'";
			$sql_query1 ="SELECT COUNT(id_serial) FROM trash_identify WHERE id_serial='1'";
			$sql_query2 ="SELECT COUNT(id_serial) FROM trash_identify WHERE id_serial='2'";
			$sql_query3 ="SELECT COUNT(id_serial) FROM trash_identify WHERE id_serial='3'";
			
			$result0=mysqli_query($db_link,$sql_query0) or die ('mysql query error');
			$result1=mysqli_query($db_link,$sql_query1) or die ('mysql query error');
			$result2=mysqli_query($db_link,$sql_query2) or die ('mysql query error');
			$result3=mysqli_query($db_link,$sql_query3) or die ('mysql query error');
			
			$row0=mysqli_fetch_array($result0,MYSQLI_NUM);
			$row1=mysqli_fetch_array($result1,MYSQLI_NUM);
			$row2=mysqli_fetch_array($result2,MYSQLI_NUM);
			$row3=mysqli_fetch_array($result3,MYSQLI_NUM);
			$picture=[$row0[0],$row1[0],$row2[0],$row3[0]];
			
	

			

			echo "<img src ='https://trashsort.ddns.net/test/index.php'>";
			  ?>
			
			<!--<hr class="major" />-->
			<div class="button00">
                            <a href="Bstatistics.php"><button class="button0">總共丟幾次垃圾</button></a>
                            <a href="BMOstat.php"><button class="button1">這個月共丟幾次</button></a>
                            <a href="BWEstat.php"><button class="button2">自定義搜尋範圍</button></a>
                </div>

	
	</body>
</html>