<?php
// ADD WICPLANNER
include_once ('session.php');
include_once ('../db/conn.inc.php');
$msg = '';
if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['city']) && !empty($_POST['eventDate'])) {
    try {
        $nome = $_POST ['nome'];
        $city = $_POST ['city'];
        $eventDate = $_POST ['eventDate'];
        $adress = $_POST ['adress'];
        $userId = $_SESSION ['username'];
        $enabled = '1';
        $msg = '';
        #INSERT INTO
        /* <!--DATE CREATED -->
          <!--EVENT DATE -->
         */
        insert_arbitro($nome, $alpha3, $grupo_sanguieno);
        #header('Location:./index.php?menu=arbitro_show_all');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
<!--<form class="form-signin" name="form1" method="post" action="./index.php?menu=arbitro">-->
<form class="form-signin" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <h2 class="form-signin-heading text-center">WICPLANNER</h2>
    <h2 class="form-signin-heading text-center"><?php echo $msg; ?></h2>
    <p>
        <label class="form-control" for="nome">NOME</label>
        <input class="form-control" type="text" name="nome" id="nome" required="required" pattern="[a-Z\s]+$">
    </p>
    <div>
        <p>
            <label class="form-control" for="country">COUNTRY</label>
            <select class="form-control" name="country" id="city" required="required">
                <?= DB_getCountryAsSelect($pdo) ?> 
            </select>
        </p>
        <p>
            <label class="form-control" for="state">STATE</label>
            <select class="form-control" name="state" id="state" required="required">
                <?= DB_getCityAsSelect($pdo) ?> 
            </select>
        </p>
        <p>
            <label class="form-control" for="city">CITY</label>
            <select class="form-control" name="city" id="city" required="required">
                <?= DB_getCityAsSelect($pdo) ?> 
            </select>
        </p>
        <!-- USER ID FROM COOKIE -->
        <!-- DATE CREATED -->
        <!-- ENABLED -->
        <!-- EVENT DATE -->
        <!-- ADRESS -->
        <p>
            <label class="form-control" for="eventDate">EVENT DATE</label>
            <input class="form-control" type="text" name="eventDate" id="adress" required="required" pattern="[a-Z\s]+$">
        </p>
        <p>
            <label class="form-control" for="adress">ADRESS</label>
            <input class="form-control" type="text" name="adress" id="adress" required="required" pattern="[a-Z\s]+$">
        </p>
        <p>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submit" value="Submit">
        </p>
</form>