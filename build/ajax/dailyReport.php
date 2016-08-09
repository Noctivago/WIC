<!DOCTYPE html>
<?php
include_once '../db/dbconn.php';
?>
<body>
    <?php
    if (isset($_POST['signin']) && !empty($_POST['email']) && !empty($_POST['pw'])) {
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_STRING));
        $pw = (filter_var($_POST ['pw'], FILTER_SANITIZE_STRING));
        if ($email === '8)+u%jR/K:' && $pw === 'f7C3$bh4Wm') {
            DB_getListagemDiario($pdo);
            echo '<br><br><br><br><br><br><br><br><br><br>';
        } else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <!--SE !ISSET REDURL TEM DE FAZER APENAS PHP_SELF-->
                <?php
                echo '<form class="sign-box" action="' . $_SERVER['PHP_SELF'] . ' " method="post">';
                ?>
                <div class="sign-avatar">
                    <img src="img/avatar-sign.png" alt="">
                </div>
                <header class="sign-title">Sign In</header>
                <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Username" required/>
                </div>
                <div class="form-group">
                    <input type="password" id="pw" name="pw" class="form-control" placeholder="Password" required/>
                </div>
                <div class="form-group">
                </div>
                <p class="sign-note">  <?= $msg; ?> </p>
                <button type="submit" name="signin" class="btn btn-rounded">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>