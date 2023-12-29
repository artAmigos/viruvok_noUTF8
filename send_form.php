<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_message = "Сообщение от: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Тема: $subject\n";
    $email_message .= "Сообщение:\n$message";

    $to = 'адрес_почты_получателя@domain.com';
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $email_message, $headers)) {

        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
} else {
    echo json_encode(array('status' => 'error'));
}
?>
