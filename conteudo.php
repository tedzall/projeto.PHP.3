<?php
	require_once 'functions.php';

	$conexao = conexaoDB();

	$cod = $_REQUEST['codConteudo'];

	$sql = "SELECT * FROM tbl_conteudo WHERE cod_conteudo = :cod ";
	$rst = $conexao->prepare($sql);
	$rst->bindValue(":cod", $cod);
	$rst->execute();
	$row = $rst->fetch(PDO::FETCH_ASSOC);

	echo '<h1>'.utf8_encode($row['stit_conteudo']).'<h1>'.PHP_EOL;
	echo '<p>'.utf8_encode($row['mtexto_conteudo']).'</p>';
?>