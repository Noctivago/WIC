<?php

include_once './db/conn.inc.php';


//// With UPDATE
//// Call function
//sql($db, "UPDATE table SET name = ? WHERE id = ?", array($name, $id));


$arg = (filter_var($_POST['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addUser') {
    try {
        $username = (filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (?, ?, ?)", array($username, $password, $email));
        echo "USER " . $username . " ADDED! w/Password " . $password;
    } catch (Exception $ex) {
        echo "ERROR!";
    }
} else if ($arg === 'readUser') {
    
} else if ($arg === 'readAllUsers') {
    try {
        $id = 0;
        //PARA CONTAR -> count
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Id] > ?", array($id), "rows");
        echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Username'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo '';
    }
} else if ($arg === 'updateUser') {
    
} else if ($arg === 'deleteUser') {
    try {
        $id = 122;
        sql($pdo, "DELETE FROM [dbo].[User] WHERE [Id] = ?", array($id));
        echo 'User deleted!';
    } catch (Exception $exc) {
        echo '';
    }
} else if ($arg === 'loginUser') {
    
} else if ($arg === 'blockUser') {
    
} else if ($arg === 'addNews') {
    $UserEmail = (filter_var($_POST['email'], FILTER_SANITIZE_STRING));
    $count = sql($pdo, "SELECT * FROM [dbo].[News] WHERE [Email] = ? ", array($UserEmail), "count");
    //IF EXISTS -1
    if ($count < 0) {
        echo 'Email already registed!';
        #echo $count;
    } else {
        sql($pdo, "INSERT INTO [dbo].[News] ([Email]) VALUES (?)", array($UserEmail));
        echo 'Email Registed';
        #echo $count;
    }
} else {
    echo "IF -> ELSE -> ERROR!";
}


