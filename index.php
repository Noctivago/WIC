<?php
require_once './config/conn.inc.php';
require_once './poo/User.php';
if ($_REQUEST["username"] || $_REQUEST["password"] || $_REQUEST["email"]) {
    $username = ($user = filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);
    $user->setEmail($email);
    $user->createUser($user);
    echo "Welcome " . $_REQUEST['username'] . "<br />";
    exit();
}
?>
<html>
    <body>

        <form action = "<?php $_PHP_SELF ?>" method = "POST">
            Username: <input type = "text" name = "username" />
            Password: <input type = "text" name = "password" />
            Email: <input type = "email" name = "email" />
            <input type = "submit" />
        </form>

    </body>
</html>