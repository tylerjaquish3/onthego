<?php

include '../includes/env.php';
include '../includes/functions.php';
// var_dump($_POST);
// echo "<br><hr><br>";

if (isset($_POST) && $_POST['action'] == 'save-comment') {

	$postId = $_POST['post_id'];
    $commentText = mynl2br($_POST['comment_text']);
	$userName = $_POST['user_name'];
	$createdAt = date('Y-m-d H:i:s');
    $active = 1;

    $sql = $conn->prepare("INSERT INTO comments (post_id, comment_text, user_name, is_active, created_at)  VALUES (?,?,?,?,?)");
    $sql->bind_param('issis', $postId, $commentText, $userName, $active, $createdAt);
    $succeeded = $sql->execute();

	if($succeeded){
		$result = ['type' => 'success', 'message' => 'Comment has been saved.'];
	} else {
		$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
	}

    echo json_encode($result);
    die;
}

function mynl2br($text) { 
   return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />')); 
} 

if (isset($_POST) && $_POST['action'] == 'send-message') {

    $name = trim(stripslashes($_POST['name'])); 
    $email = trim(stripslashes($_POST['email'])); 
    $subject = trim(stripslashes($_POST['subject'])); 
    $message = trim(stripslashes($_POST['message'])); 

    if ($subject == "") {
        $subject = "New message from your blog";
    }

    // $createdAt = date('Y-m-d H:i:s');

    // $sql = "INSERT INTO messages (user_name, message_text, subject, status, created_at) VALUES ('$name', '$message', '$subject', 'New', '$createdAt')";
    // mysqli_query($conn, $sql);

    $email_template = 'emailTemplate.html';
    
    if (IS_DEV) {
        $to = 'tylerjaquish@gmail.com';
        $result = 'Unable to send email in dev.';
    } else {
        $to = 'didier836@hotmail.com';
    
        $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
        $headers .= "Reply-To: ". $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $templateTags =  array(
            '{{subject}}' => $subject,
            '{{email}}'=>$email,
            '{{message}}'=>$message,
            '{{name}}'=>$name
        );

        $templateContents = file_get_contents( dirname(__FILE__) . '/'.$email_template);
        $contents =  strtr($templateContents, $templateTags);

        if (mail( $to, $subject, $contents, $headers)) {
            $result = '<strong>Thank You!</strong>&nbsp; Your email has been delivered.';
        } else {
            $result = '<strong>Error!</strong>&nbsp; Cann\'t Send Mail.';
        }
	}

    echo $result;
    die;
}