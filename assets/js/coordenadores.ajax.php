<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'mysql10.pitagorasslz.com.br', 'pitagorasslz10', 'Semsenha00!!' ) ;
	mysql_select_db('pitagorasslz10', $con);
	$id_unidade = mysql_real_escape_string( $_REQUEST['id_unidade'] );
	$sql = "SELECT id,nome FROM usuario WHERE unidade = $id_unidade AND nivel_coordenador = 1  ORDER BY nome";
	$res = mysql_query($sql);

	
	$coordenadores = array();

	while ($row = mysql_fetch_assoc( $res )) 
	{
		$coordenadores[] = array(
									'id_avaliado'	=> $row['id'],
									'nome'			=> $row['nome']
								);
	}

	echo(json_encode($coordenadores ));

?>