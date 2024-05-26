<?php
/*
1. 下載 phpMailer
   https://github.com/PHPMailer/PHPMailer
2. 下載完畢後將下列檔案複製到指定資料夾PHPMailer中：
   PHPMailer.php
   SMTP.php
   Exception.php
3. 使用 PHPMailer 透過 Gmail 帳號寄信時，需要採用安全性較低的登入技術，所以要開啟安全性較低的應用程式存取權限，
   管理你的Google帳戶->安全性->低安全性應用程式存取權->開啟
   也可以在登入 Gmail 帳號後由https://www.google.com/settings/security/lesssecureapps 開啟，否則會造成認證錯誤。
*/
include(dirname(__FILE__)."\PHPMailer\PHPMailer.php"); //匯入PHPMailer類別  
include(dirname(__FILE__)."\PHPMailer\SMTP.php");
include(dirname(__FILE__)."\PHPMailer\Exception.php");
$mail="totogn0521@gmail.com";
$mail= new PHPMailer\PHPMailer\PHPMailer(); //建立新物件   
$mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
$mail->IsSMTP(); //設定使用SMTP方式寄信   
$mail->SMTPAuth = true; //設定SMTP需要驗證   
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //設定SMTP主機   
$mail->Port = 465; //設定SMTP埠位，預設為25埠  
$mail->CharSet = "UTF8"; //設定郵件編碼   
 
$mail->Username = "trash20201201@gmail.com"; //設定驗證帳號   
$mail->Password = "20trashwork12"; //設定驗證密碼   
 
$mail->From = "trash20201201@gmail.com"; //設定寄件者信箱   
$mail->FromName = "智能分類垃圾"; //設定寄件者姓名   
 
$mail->Subject = "忘記密碼"; //設定郵件標題   
$mail->Body = "https://trashsort.ddns.net/project/templated_update_0913/Newpasspad.php"; //設定郵件內容 
$mail->IsHTML(true); //設定郵件內容為HTML   
$mail->AddAddress($mail); //設定收件者郵件及名稱   
if(!$mail->Send()) {   
	echo "Mailer Error: " . $mail->ErrorInfo;   
} else {   
	echo "Message sent!";   
}
?>