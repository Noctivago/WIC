<?php

//FUNCA X) NA QUERY VERIFICAR SE O USER PERTENCE A ESTE WIC PLANNER; SE SIM MOSTRA
//$wicPlannerId = INPUT_GET($_GET["id"]);
$wicPlannerId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$userId = filter_input(INPUT_GET, 'uId', FILTER_SANITIZE_NUMBER_INT);
//var_dump($wicPlannerId);
echo db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId);

