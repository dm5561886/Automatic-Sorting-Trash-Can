<?
 include ('include/config.php'); 
 ?>
<!doctype html>
<html>
<head>
        <meta charset='utf-8' />
</head>
<body>
<?
        $result = mysqli_query ('select id,login_name,login_pass,realname,u_email, u_bday,u_sex,u_manager from member', $db_link );

        $db_line = mysqli_num_rows($result);
        echo "總資料數：" . $db_line ;
        echo "<br /><br />";

        while ( $row_res = mysqli_fetch_row($result) ) {
		foreach ( $row_res as $row ){
			echo $row;
		}
		echo "<br />";
        }

?>

</body>
</html>