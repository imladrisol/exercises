<?php
// Определение списка пользователей в режиме ONLINE
require('user.class.php');

// Читаем данные, переданные в POST
$rawPost = file_get_contents('php://input');
//parse_str($rawPost, $data);             
//$data = json_decode(json_encode($data));
//echo $rawPost;die();
//$rawPost = '{"id": "958353c58d5efa9300e013b1b39bbf11", "valid": true}';
// Результат
$onlineUsers = array();

// Если данные были переданы...
if ($rawPost)
{
    
	// Разбор пакета JSON
	$ticket = json_decode($rawPost);
        //$ticket = json_encode($data);
	//var_dump($ticket);die();
	// Объект пользователя
	$user = new User();
	$result = $user->refreshSession($ticket);
	
	// Если билет был правильным...
	if ($result > 0){
            //echo 1;die;
		$onlineUsers = $user->getOnlineUsers();
        }
}

// Заголовки ответа
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));
// Возвращаем билет
echo json_encode($onlineUsers);
?>