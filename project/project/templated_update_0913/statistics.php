<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>會員專區</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
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
				<h1><a href="index.php">TRASH</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">首頁</a></li>
						<!--<li><a href="left-sidebar.html">統計</a></li>-->
						<li><a href="register.php">註冊</a></li>
						<li><a href="login.php" class="button special">會員登入</a></li>
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
								<li  style="color:dodgerblue"><a href="baterry.php">電池</a></li>
								<li  style="color:dodgerblue"><a href="tetra_pak.php">鋁箔包</a></li>
								<li  style="color:dodgerblue"><a href="bottle.php">寶特瓶</a></li>
								<li  style="color:dodgerblue"><a href="##">鐵鋁罐</a></li>



					
									<!--<li style="color:dodgerblue">鐵鋁罐</li>-->
								
						
								
							</section>
						</div>
						<div class="8u skel-cell-important">
							<section>
								<h2>統計圖表</h2>
								
			</section>
			<?
			    if(! isset($_SESSION['username'])) {
					echo "<script>alert('請先登入'); location.href = 'login.php';</script>";
				}
			?>
			<? 
			/*
			$db_link=mysqli_connect("163.17.9.121","10614033","123456789","trash");
			if(!$db_link)
			{
				echo "連結失敗";
			}
			$seldb=mysqli_select_db($db_link ,"trash"); //選擇資料庫，並確定是否正確
			if (!$seldb) die("資料庫選擇失敗");
			$sql_query ="select * from jpg_temp";
			$result=mysqli_query($db_link,$sql_query) or die ('mysql query error');
			$rowcount=mysqli_num_rows($result);
			$datay=array();
			$datax=array();
			$number=array();
			while ($row=mysqli_fetch_array($result)){
			$datay[]=$row["money"];
			$datax[]=$row["year"];
			$number[]=$row["number"];

			}
			
			//echo each($datay);
			//print_r($datay);
			//mysqli_close($db_link);
			
			/*
			require_once ("./src/jpgraph.php"); 
			require_once ("./src/jpgraph_pie.php"); 
			require_once ("./src/jpgraph_pie3d.php"); 
			$data = array(19,20,34,38);
			$graph = new PieGraph(500,500); 
			$graph->SetShadow(); 
			$graph->title->Set("垃圾比例"); 
			$graph->title->SetFont(FF_SIMSUN,FS_BOLD); 
			$pieplot = new PiePlot3D($data); 
			$pieplot->SetLegends($gDateLocale->GetShortMonth());
			$graph->Add($pieplot);  
			$graph->Stroke();  去jpgraph的src修改 index.php的檔案程式碼 */
			 
			 echo "<img src ='http://163.17.9.121:8088/test/'>";
			  ?>
			
			<!--<hr class="major" />-->
			<div class="button00">
                            <button class="button0">總共丟幾次垃圾</button>
                            <button class="button1">這個月共丟幾次</button>
                            <button class="button2">這星期共丟幾次垃圾</button>
                </div>

	
	</body>
</html>