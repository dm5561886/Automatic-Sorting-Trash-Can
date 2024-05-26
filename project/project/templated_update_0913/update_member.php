<?
session_start();
include ("config.php");
//print_r($_SESSION);
   if ( isset ($_POST['action'] ) ) {
        if ( $_POST['action'] =='reg') {
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

        //$login_pass = $login_pass1;
        $sql= "UPDATE `member` SET `login_pass`='$login_pass1',  `realname`='$realname',`u_email`= '$u_email'  , `u_bday`='$u_bday' ,`u_sex`='$u_sex'  WHERE `login_name`='$login_name'";
        $query =$db_link -> query($sql);
        if( $query)
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
                echo '修改失敗!';

        }

        }
       
    }
    ?>