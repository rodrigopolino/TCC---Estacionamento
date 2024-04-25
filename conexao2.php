<?php
	$servidor="localhost";
	$banco="tcc";
	$usuario="root";
	$senha="";
	
	$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);		
?>