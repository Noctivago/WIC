<?php

include_once './db/conn.inc.php';


//// With UPDATE
//// Call function
//sql($db, "UPDATE table SET name = ? WHERE id = ?", array($name, $id));


$arg = (filter_var($_POST['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addUser') {
    try {
        $username = (filter_var($_POST['username']));
        $password = (filter_var($_POST['password']));
        $email = (filter_var($_POST['email']));
        sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (?, ?, ?)", array($username, $password, $email));
        echo "USER " . $username . " ADDED! w/Password " . $password;
    } catch (Exception $ex) {
        echo "ERROR!";
    }
} else if ($arg === 'readUser') {
    
} else if ($arg === 'readAllUsers') {
    $id = 0;
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
} else if ($arg === 'updateUser') {
    
} else if ($arg === 'deleteUser') {
    $id = 122;
    sql($pdo, "DELETE FROM [dbo].[User] WHERE [Id] = ?", array($id));
    echo 'User deleted!';
} else if ($arg === 'loginUser') {
    
} else if ($arg === 'blockUser') {
    
} else {
    echo "IF -> ELSE -> ERROR!";
}

