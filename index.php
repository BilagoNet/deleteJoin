<?php

header('Content-Type: application/json');

$update = json_decode(file_get_contents('php://input'));
if(!$update or !isset($update->message)){
    die(json_encode(array('status' => 'No need update')));
}

$message = $update->message;
if (isset($message->new_chat_members) || isset($message->left_chat_member)) {
    $chat_id = $message->chat->id;
    $payload = array(
        'chat_id' => $chat_id,
        'message_id' => $message->message_id
    );
    $payload['method'] = "deleteMessage";
    echo json_encode($payload);
}
