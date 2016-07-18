<?php

include_once './dbconn.php';

//DEBOLVE OS COUNTRY PARA SER USADO NA SELECT
function DB_getCountryAsSelect($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM Country ORDER BY Name ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (PDOException $e) {
        echo 'ERROR READING COUNTRY TABLE';
        die();
    }
}

//DEVOLVE OS STATE PARA SER USADA NA SELECT
function DB_getStateAsSelect($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM State ORDER BY Name ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (PDOException $e) {
        echo 'ERROR READING STATE TABLE';
        die();
    }
}

//DEVOLVE OS STATE PARA SEREM USADOS NUMA SELECT <- A PARTIR DO COUNTRY ID
function DB_getStateAsSelectByCountrySelected($pdo, $Country) {
    
}

//DEVOLVE AS CITIES PARA SEREM USADAS NUMA SELECT <- A PARTIR DO STATE ID
function DB_getCityAsSelectByStateSelected($pdo, $State_Id) {
    
}
