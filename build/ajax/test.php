<?php

include_once '../db/dbconn.php';

DB_activateUserAccount($pdo, "paulo.cunha@esprominho.pt");


DB_getUsersTable($pdo);
