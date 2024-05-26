<?
		header('Content-Type: text/html;charset=UTF-8');
		$db_link=mysqli_connect("163.17.9.121","10614033","123456789","trash");
		if(!$db_link)
		{
			echo "連結失敗";
		}
?>