<?php
$server = "wicsqlserver.database.windows.net";
		$port = "1433";
		$pass = '#$youcandoit2017$#';
		$user = "wic";
		$db = "wicdb";
        try   
        {  
			$pdo = new PDO("sqlsrv:server=$server; Database=$db", "$user", "$pass");
			$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            if($pdo == false) {
				echo "Redirect to 404!";
			} else {
				#echo "Connected!";
			}
        }  
        catch(Exception $e)  
        {  
            echo("Error -> IP NOT ALLOWED! . $e");  
        }  