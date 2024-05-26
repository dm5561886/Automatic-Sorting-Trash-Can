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
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">
    <header id="header" class="skel-layers-fixed">
	<h1><a href="Blogin.php">trash</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="Blogin.php">首頁</a></li>
						<li><a href="Bstatistics.php">統計</a></li>
						<li><a href="CCallme.php">聯絡我們</a></li>
						<li><a href="Alert.php">修改會員資料</a></li>
						<li><a href="index.php"><input class="button special" type="submit" value="會員登出" ></a></li>
                    </ul>
                    </nav>
            </header>
			<!--echo "<img src ='http://163.17.9.121:8088/test/can.php'>";-->
<?
 include ("config.php");//config 連入資料庫
 $seldb=mysqli_select_db($db_link ,"trash"); //選擇資料庫，並確定是否正確
 /*if(!$seldb){
	 die("error");
 }
 else{
	 echo "sucess";
 }*/
 $seldb= mysqli_select_db($db_link,"trash");
 if (!$seldb) die("資料庫選擇失敗");
 $sql_query ="select * from trash_identify WHERE id_serial='2'  ";
 
 $result=mysqli_query($db_link,$sql_query);
 
 /*echo "<img src ='http://163.17.9.121:8088/test/tetra_pak.php'>";*/
?>
<p>


</p>
  <table style="width:100%">
  <tr>
    <td>分類類別</td>
	<td>年分</td>
	<td>月份</td>
	<td>日期</td>
	<td>數量</td>
   
  </tr>
  <?
	for($month=1;$month<=12;$month++)
	{
		switch($month)
		{
			case "1":
			for($date=1;$date<=31;$date++)
			{	
				$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
				$result_query=mysqli_query($db_link,$sql_query);
				$rows_query=mysqli_fetch_row($result_query);
				$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
				$result=mysqli_query($db_link,$sql);
				$rows=mysqli_fetch_row($result);
				if($rows[0]>0)
				{?>
				<tr>
				<td>其他</td>
				<td> <?echo $rows_query[2];?></td>
				<td> <?echo $rows_query[3];?></td>
				<td> <?echo $rows_query[4];?></td>
				<td> <?echo $rows[0];?></td>
				</tr>
				<?}
			}
			break;
			case "2":
			for($date=1;$date<=28;$date++)
			{	
				$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
				$result_query=mysqli_query($db_link,$sql_query);
				$rows_query=mysqli_fetch_row($result_query);
				$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
				$result=mysqli_query($db_link,$sql);
				$rows=mysqli_fetch_row($result);
				if($rows[0]>0)
				{?>
				<tr>
				<td>其他</td>
				<td> <?echo $rows_query[2];?></td>
				<td> <?echo $rows_query[3];?></td>
				<td> <?echo $rows_query[4];?></td>
				<td> <?echo $rows[0];?></td>
				</tr>
				<?}
			}
			break;
			case "3":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
				}
			break;
			case "4":
				for($date=1;$date<=30;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "5":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "6":
				for($date=1;$date<=30;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "7":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "8":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "9":
				for($date=1;$date<=30;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "10":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "11":
				for($date=1;$date<=30;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
			case "12":
				for($date=1;$date<=31;$date++)
				{	
					$sql_query ="SELECT * FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result_query=mysqli_query($db_link,$sql_query);
					$rows_query=mysqli_fetch_row($result_query);
					$sql="SELECT COUNT(*) FROM `trash_identify` WHERE `t_month`='".$month."' and `t_date`='".$date."' and `id_serial`='2'";
					$result=mysqli_query($db_link,$sql);
					$rows=mysqli_fetch_row($result);
					if($rows[0]>0)
					{?>
					<tr>
					<td>其他</td>
					<td> <?echo $rows_query[2];?></td>
					<td> <?echo $rows_query[3];?></td>
					<td> <?echo $rows_query[4];?></td>
					<td> <?echo $rows[0];?></td>
					</tr>
					<?}
					}
			break;
				
		}
		
	}?>
  </table>
  <p>&nbsp;</p>
  </body>	