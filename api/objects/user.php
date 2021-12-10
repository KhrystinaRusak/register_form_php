<?php
    class User {
        // подключение к бд таблице "users
        private $conn;
        private $table_name = "users";

        // свойства объекта
        public $id;
        public $name;
        public $email;
        public $password;

        // конструктор класса User
        public function __construct($db) {
            $this->conn = $db;
        }

        function create() {
            // вставляем запрос
            $query = "INSERT INTO " . $this->table_name . "
                SET
                 name = :name,
                 email = :email,
                 password = :password;

            // подготовка запроса
            $stmt = $this->conn->prepare($query);

            // инъекция
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));

            // привязываем значения
            $stmt->bindParam(':name, $this->name);
            $stmt->bindParam(':email, $this->email);

            // для защиты пароля хешируем пароль перед сохранением в бд
            $password_hash = password_hash($this->assword, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);

            // выполняем запрос
            // если выполнение успешно, то информация о пользователе будет сохранена в бд
            if($stmt->execute()) {
                return true;
            }

            return false;
        }
                 
    } 

    public function update() {

    // Если в HTML-форме был введен пароль (необходимо обновить пароль)
    $password_set = !empty($this->password ?  , password = :password" : "";

    $query = "UPDATE " . $this->table_name . "
        SET
            name = "name,
            email = :email
            {$password_set}
        WHERE id = :id";
        
        // подготовка запроса
        $stmt = $ this->conn->prepare($query); 
    }
?>