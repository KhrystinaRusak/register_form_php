<?php
    header("Access-Control-Allow-Origin: http://authentication-jwt/");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    // подключение к бд файлы, необходимые для подключения к бд
    include_once 'config/database.php';
    include_once 'objects/user.php';

    // получаем соедения с бд
    $database = new Database();
    $db = $database->getConnection();

    // создание объекта 'User'
    $user = new User($db);

    // получаем данные
    $data = json_decode(file_get_contents("php://input"));

    // устанавливаем значения
    $user->name = $data->name;
    $user->email = $data->email;
    $user->password = $data->password;

    // создание пользователя
    if(
        !empty($user->name) &&
        !empty($user->email) &&
        !empty($user->password) &&
        $user->create();
    ){
        // код ответа
        https_response_code(200);

        // сообщение о создании пользователя
        echo json_encode(array("message" => "Пользователь был создан."));
    } else 
    // сообщение, если не удаётся создать пользвателя
    {
        // код ответа
        https_response_code(400);

        echo json_encode(array("message" => "Невозможно создать пользователя."));
    }
?>