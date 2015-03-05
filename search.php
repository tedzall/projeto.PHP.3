<?php
	require_once 'functions.php';

	$conexao = conexaoDB();

//	$palavra = stringParaBusca($_REQUEST['palavra']);
	$palavra = $_REQUEST['palavra'];

	$sql = "SELECT cod_conteudo, stit_conteudo FROM tbl_conteudo WHERE mtexto_conteudo = :palavra ";
	$rst = $conexao->prepare($sql);
	$rst->bindValue(":palavra",$palavra,PDO::PARAM_STR); 
	$rst->execute();
?>
<h1>Resultado da Pequisa ...</h1>
<table class="table table-striped">
<thead>
	<tr>
		<th>COD</th>
		<th>Título da Página</th>
		<th>Ação</th>
	</tr>
</thead>
<tbody>
<?php
	if(0<$rst->rowCount()){
		
		while ($row = $rst->fetch(PDO::FETCH_ASSOC)) {
			echo '<tr class="success"><td>'.$row['cod_conteudo'].'</td><td>'.utf8_encode($row['stit_conteudo']).'</td><td class="result-conteudo"><a href="#'.$row['cod_conteudo'].'" class="btn btn-mini btn-inverse"><i class="icon-search icon-white"></i></a></td></tr>';
		}
	}else{
			echo '<tr class="error"><td colspan="3">Não há resultados para sua pesquisa !!!</td></tr>';
	}
?>	
</tbody>
</table>