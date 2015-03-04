<?php 

function conexaoDB(){
		
	try{
		$config = require_once('config.php');	
		
		$host = isset($config['host']) ? $config['host'] : null;
		$dbname = isset($config['dbname']) ? $config['dbname'] : null;
		$user = isset($config['user']) ? $config['user'] : null;
		$password = isset($config['password']) ? $config['password'] : null;
	
		$conexao = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
		
		return $conexao;
	}
	catch(PDOException $e){
		die("<h1>Opa !!! Erro: (".$e->getCode().") - ".$e->getMessage()."</h1>");
	}
}

	function stringParaBusca($str){

		$str = trim(strtolower($str));

		while(strpos($str,"  ")){
			$str = str_replace("  "," ",$str);
    	}    
		$caracteresPerigosos = array ("Ã","ã","Õ","õ","á","Á","é","É","í","Í","ó","Ó","ú","Ú","ç","Ç","à","À","è","È","ì","Ì","ò","Ò","ù","Ù","ä","Ä","ë","Ë","ï","Ï","ö","Ö","ü","Ü","Â","Ê","Î","Ô","Û","â","ê","î","ô","û","!","?",",","\"","\"","-","\"","\\","/");

		$caracteresLimpos    = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".",".",".",".","." ,"." ,".");
		$str = str_replace($caracteresPerigosos,$caracteresLimpos,$str);
	
		$caractresSimples = array("a","e","i","o","u","c");
		$caractresEnvelopados = array("[a]","[e]","[i]","[o]","[u]","[c]");
		$str = str_replace($caractresSimples,$caractresEnvelopados,$str);
		$caracteresParaRegExp = array(
		"(a|ã|á|à|ä|â|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|Ã|Á|À|Ä|Â|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
		"(e|é|è|ë|ê|&eacute;|&egrave;|&euml;|&ecirc;|É|È|Ë|Ê|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
		"(i|í|ì|ï|î|&iacute;|&igrave;|&iuml;|&icirc;|Í|Ì|Ï|Î|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
		"(o|õ|ó|ò|ö|ô|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|Õ|Ó|Ò|Ö|Ô|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
		"(u|ú|ù|ü|û|&uacute;|&ugrave;|&uuml;|&ucirc;|Ú|Ù|Ü|Û|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
		"(c|ç|Ç|&ccedil;|&Ccedil;)" );
		$str = str_replace($caractresEnvelopados,$caracteresParaRegExp,$str);
	
		$str = str_replace(" ",".*",$str);
	
		return $str;
	}
	

?>
