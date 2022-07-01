<?php
$servername = "localhost";
$database = "teste";
$username = "teste";
$password = "Teste@teste1";
$livro = $_POST["abrev"];
$captl = $_POST["captl"];
$verscl = $_POST["verscl"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) 
  {
	die("O Diabo tá furioso... " . mysqli_connect_error());
  }
echo "$livro.$captl:$verscl <p>";

$sql = "select text, verse from books, verses where abbrev = '$livro' and chapter = '$captl' and book = books.id -1 and verse = '$verscl' order by verse";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " " . $row["verse"]. ". " . $row["text"]. "<br>";
  }
}else {
  echo "Algo deu errado...";
}
$conn->close();

//estabelecemos conexão com o banco de dados
mysql_connect('localhost','root','') or die(mysql_error()); //criamos o banco de dados através do script php $create_base = mysql_query("CREATE DATABASE IF NOT EXISTS banco_exemplo;") or die(mysql_error()); //seleciona o banco de dados mysql_select_db('banco_exemplo') or die(mysql_error()); if($create_base) { //criamos a tabela no banco de dados mysql_query("CREATE TABLE IF NOT EXISTS produto ( id INT(11) AUTO_INCREMENT, descricao VARCHAR(100) NOT NULL, preco FLOAT NOT NULL, PRIMARY KEY(id) );") or die(mysql_error()); //verifica se existe registros no banco $query = mysql_query("SELECT id, descricao, preco FROM produto"); //se não existir registros então insere os valores abaixo if(empty($query)) { //insere alguns dados para os exemplos mysql_query("INSERT INTO produto(descricao, preco) VALUES ('Notebook', '2800'), ('Nobreak', '800'), ('Roteador Wireless', '180'); ") or die(mysql_error()); } }