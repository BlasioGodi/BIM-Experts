<?php
$receiver = "muhindablasio@gmail.com";
$subject = "Email test via php local host";
$body = "Hello World";
$sender = "From:sender email address here";
if(mail($receiver,$subject,$body,$sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending email.";
}
?>