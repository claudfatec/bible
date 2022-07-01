<?php
require_once('conn.php');
$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
if (! empty($opcao)){
	switch ($opcao)
	{
		case 'livro':
			{
				echo getAllLivro();
				break;
			}
		case 'captl':
			{
				echo getFilterCaptl($valor);
				break;
			}
		case 'verscl':
			{
				echo getFilterVerscl($valor);
				break;
			}
	}
}

function getAllLivro(){
	$pdo = Conectar();
	$sql = 'SELECT abbrev, name FROM books';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
$pdo = null;
}

function getFilterCaptl($livro){
	$pdo = Conectar();
	$sql = 'SELECT chapter FROM books, verses WHERE abbrev = ? and book = books.id -1 and verse = 1';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(1, $abbrev);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
$pdo = null;
}

function getFilterVerscl($estado){
	$pdo = Conectar();
	$sql = 'SELECT text from books, verses where chapter = ? and book = books.id -1 order by verse';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(1, $captl);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
$pdo = null;
}
?>