
<!DOCTYPE HTML>

<html>
	<head>
		<title>智能分類垃圾桶</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		</noscript>

	</head>
	
	</style>
	<body id="top">

		<!-- Header -->
		
		<header id="header" class="skel-layers-fixed">
		<h1><a href="Blogin.php">trash</a></h1>
		<form method=post >
				<nav id="nav">
					<ul>
						<li><a href="Blogin.php">首頁</a></li>
						<li><a href="Bstatistics.php">統計</a></li>
						<li><a href="CCallme.php">聯絡我們</a></li>
						<li><a href="Alert.php">修改會員資料</a></li>
						<li><a href="index.php"><input name="loginout"class="button special" type="submit" value="會員登出" ></a></li>
					</ul>
				</nav>
		</form>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>智能分類垃圾桶</h2>
					<p>the concept of creation <a href="http://templated.co"></a></p> 
					<ul class="actions">
						<li><a href="Bmore.php" class="button big alt" name="more">了解更多</a>
                        </li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>保護地球,人人有責。</h2>
					<p>Each has the responsibility to protect the Earth.</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="icon fa-area-chart major"></i>
								<h3>減少分類時間</h3>
								<p>現代人因為生活忙碌,常常沒做好分類,導致垃圾回收的困難 因此我們想要為地球出一份力。</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-refresh major"></i>
								<h3>減輕工作人員的負擔</h3>
								<p>常常看到有人沒有回收垃圾,嚴重造成回收上的困難,還要讓工作人員做分類的動作。</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-cog major"></i>
								<h3>為地球盡一份力</h3>
								<p>現代汙染越來越嚴重,有時候只是因為人們想要貪圖一時方便,這種時候我們的設計就可以解決這個問題。</p>
							</section>
						</div>
					</div>
				</div>
			</section>
        
        	<section id="two" class="wrapper style2">
				<header class="major">
					<h2>愛護地球從你我做起</h2>
					<p>Caring for the earth starts with you and me</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special">
								<a href="#" class="image fit"><img src="images/d.jpg" alt="" /></a>
								<h3>不再讓動物們吃到垃圾而死去</h3>
								<p>現在很多動物因為人們亂丟垃圾造成誤食而死去，這樣不到造成動物們的減少，也會造成
                                還需要花人手去清理動物的殘骸，這樣是一個雙輸的局面。</p>
							</section>
						</div>
						<div class="6u">
							<section class="special">
								<a href="#" class="image fit"><img src="images/ss.png" alt="" /></a>
								<h3>給後代一個乾淨的環境</h3>
								<p>現在因為人們不想分類導致會隨手練丟垃圾，使海洋上常常漂浮垃圾，導致生態的惡化
                                而我們的設計可以減少這樣的情況發生。</p>
							</section>
						</div>
					</div>
				</div>
			</section>
			<?
				session_start();
				if(!isset($_SESSION["username"])) {
					echo "<script>alert('請先登入'); location.href = 'login.php';</script>";
				}
				if(isset($_POST["loginout"]))
				{
					unset($_SESSION["username"]);
					echo "<script>alert('登出成功'); location.href = 'index.php';</script>";
				}
			?>
	</body>
</html>