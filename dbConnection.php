<?php
	$dbconn = pg_connect("host=127.0.0.1 dbname=schoolBoard user='postgres' password='sifra' ") or die('Nije uspjelo povezivanje na bazu. Pokušajte kasnije!' );
	ini_set("display_errors", "on");
?>