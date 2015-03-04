<?php
	require_once 'functions.php';

	$conexao = conexaoDB();
	
	$str = "DROP TABLE IF EXISTS tbl_conteudo";
	$conexao->query($qtr);

	$str = "CREATE TABLE tbl_conteudo (
  		cod_conteudo int(3) NOT NULL AUTO_INCREMENT,
		stit_menu_conteudo char(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  		stit_conteudo char(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  		mtexto_conteudo text CHARACTER SET latin1 COLLATE latin1_general_ci,
 		bativo_conteudo smallint(1) NOT NULL DEFAULT '1', 
 		PRIMARY KEY (cod_conteudo)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci";
	$conexao->query($qtr);
	
	$str = "INSERT INTO tbl_conteudo (stit_menu_conteudo, stit_conteudo, mtexto_conteudo, bativo_conteudo) VALUES 
	('Home','Home','Como uma das companhias líderes mundiais em cuidados com a pele, procuramos estar próximos a nossos consumidores, oferecendo-lhes produtos atraentes e inovadores. Nossas marcas possuem confiança universal - desde NIVEA, uma das maiores marcas em cuidado da pele no mundo, a outras marcas internacionalmente bem-sucedidas, como Eucerin, La Prairie, Labello, 8×4 e Hansaplast/Elastoplast.',1),
	('Empresa','Conheça a nossa Empresa','A Industria Brasileira de Baloes - IBB e detentora da marca HAPPY DAY para produtos de recreacao e decoracao desde 1997.Percebendo que o mercado nacional nao tinha baloes redondos em numero suficiente para atender os profissionais da area, investiu em estudos e maquinas apropriadas para desenvolver produtos de qualidade e com precos competitivos.',1),
	('Produto','Nosso Produtos','Ofertas limitadas, por linha de produto, a 03 unidades para pessoa física, seja por aquisição direta e/ou entrega a ordem, e que não tenha adquirido equipamentos Dell nos últimos 04 meses, e 10 unidades para pessoa jurídica ou grupo de empresas com até 500 funcionários registrados. Os preços ofertados podem ser alterados sem aviso prévio. Valores com frete não incluso. Preços com impostos para a cidade de São Paulo. Os preços ofertados no site não são válidos para compra para revenda e/ou para compra por entidades públicas para compra nestas hipóteses entre em contato com um representante de vendas. A Dell reserva-se o direito de não concluir a venda se os equipamentos forem adquiridos para estas finalidades.',1),
	('Serviços','Quais são nosso serviços','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',0)
	";
	$conexao->query($qtr);
?>