<!DOCTYPE HTML>

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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<body ng-app="">
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
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

								
						
								
							</section>
						</div>
						<div class="8u skel-cell-important">
						<form action="" name="sort1" method="post" action="">
							<section name="select">
								<h2>統計圖表。這個月共丟幾次</h2>
								<select  name="month" width="300%" class="form-control" id="testSelect"> 
                                    <option value="" ng-model="myVar">月份</option>
                                    <option value="1" >一月</option>
                                    <option value="2">二月</option>
                                    <option value="3">三月</option>
                                    <option value="4">四月</option>
                                    <option value="5">五月</option>
                                    <option value="6">六月</option>
                                    <option value="7">七月</option>
                                    <option value="8">八月</option>
                                    <option value="9">九月</option>
                                    <option value="10">十月</option>
                                    <option value="11">十一月</option>
                                    <option value="12">十二月</option>
								</select>	
								<input type="submit" value="查詢"/>				
							</section>
							
						</form>
						
		<script type="text/javascript">
            /*用jQuery實現*/
			
            var oSelect = $("#testSelect");
            oSelect.on(‘change‘,function(){
                var checkText=$("#testSelect").find("option:selected").text(); //獲取Select選擇的Text 
                var checkValue=$("#testSelect").val();
                console.log(checkText +"~~~~"+ checkValue);
				$("#select_id ").get(0).selectedIndex=1; //設置Select索引值為1的項選中 
				$("#select_id ").val(12); // 設置Select的Value值為4的項選中 
				$("#select_id option[text=‘jQuery‘]").attr("selected", true);
            });
			
        </script>
		
		
			
			<?
			error_reporting(E_ALL & ~E_NOTICE);
			$month=$_POST["month"];
			switch($month)
			
			{
				case "1":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_1.php'>";
					break;
				
				case "2":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_2.php'>";
					break;
				case "3":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_3.php'>";
					break;
				case "4":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_4.php'>";
					break;
				case "5":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_5.php'>";
					break;
				case "6":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_6.php'>";
					break;
				case "7":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_7.php'>";
					break;
				case "8":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_8.php'>";
					break;
				case "9":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_9.php'>";
					break;
				case "10":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_10.php'>";
					break;
				case "11":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_11.php'>";
					break;
				case "12":
					echo "<img src ='https://trashsort.ddns.net/test/Monthstatics_12.php'>";
					break;
				default:
					echo "<img src ='https://trashsort.ddns.net/test/index.php'>";
					break;
			}
			?>
			
			<div class="button00">
                            <a href="Bstatistics.php"><button class="button0">總共丟幾次垃圾</button></a>
                            <a href="BMOstat.php"><button class="button1">這個月共丟幾次</button></a>
                            <a href="BWEstat.php"><button class="button2">自定義搜尋範圍</button></a>
                </div>

	
	</body>
</html>