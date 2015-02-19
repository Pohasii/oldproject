<?php
//config file
$db = mysql_connect("localhost", "root", "");
mysql_select_db("testlol");
mysql_unbuffered_query("SET `character_set_client` = 'utf8';");
mysql_unbuffered_query("SET `character_set_results` = 'utf8';"); 
mysql_unbuffered_query("SET `collation_connection` = 'utf8_general_ci';"); 