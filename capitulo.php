<?php
require 'includes/init.php';

//Verifica se inseriu capítulo
if ($_GET["captl"]==NULL) {
    ?><script>alert ("Insira o capítulo!");</script><?php
} else {
    $captl = $_GET["captl"];
}
$livro = $_GET['bookid'];
$nombre = $_GET['nombre'];
require 'includes/conn.php';
require 'includes/header.php';

$conn = getDB(); ?>

<!-- Livro e capítulo - Título -->
<div id="top"> 
    <span class = 'titulo'>
        <em><?= $nombre?> <?=$captl;?></em>
    </span>

    <span class=' esquerda'><?php require 'includes/openbible.php' ?></span>
    <span class='direita'>    <a href='index.php' alt='Home'><img src='images/homebotton.png' alt='home'> </a>
</span>
    
</div>
<div id = "conteudo">
    <?php //Aqui vai o texto bíblico
    $sql = "select text, verse, verses.id from books inner join verses on book = books.id -1 where books.id = '$livro' and chapter = '$captl' order by verse";
    $results = mysqli_query($conn, $sql);
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    } 

    if (empty($bibles)): ?>
        <span class = 'texto'>Texto não encontrado ainda mesmo.</span>
        <?php else: ?><br>
            <?php foreach ($bibles as $bible): ?>
                <div class = 'texto'>
                    <strong><?= $bible['verse'];?> .</strong> <?=$bible['text'];?>
                </div><?php
            endforeach;
    endif; ?>
   <?php  $proxverscl = $bible['id']+1;
    $antverscl = $bible['id']-$bible['verse'];
    include 'includes/capituloprox.php';
 ?>   
    <span class='prevnextdir'>
        <form action="capitulo.php?bookid=$bookid&captl=$captl&nombre=$nombre" method="get">
            <input type= "hidden" name="bookid" value="<?= $bookid;?>">
            <input type= "hidden" name="captl" value="<?= $captl;?>">
            <input type= "hidden" name="nombre" value="<?= $nombre;?>">
            <button type="submit">
                <img src="images/next.png" aria-label="Próximo"></button>

        </form>
    </span>


    <?php

$proxverscl = $antverscl;
include 'includes/capituloprox.php';  ?>

<span class='prevnextesq'>
    <form action="capitulo.php?bookid=$bookid&captl=$captl&nombre=$nombre" method="get">
        <input type= "hidden" name="bookid" value="<?= $bookid;?>">
        <input type= "hidden" name="captl" value="<?= $captl;?>">
        <input type= "hidden" name="nombre" value="<?= $nombre;?>">
        <button type="submit">
                <img src="images/previous.png"></button>
    </form>
</span>

</div>




<!-- Aqui  vai o previous e next -->

<div id="bottom">


    <span><center><a href='index.php' alt='Home'><img src='images/homebotton.png' > </a></center>
</span>
</div>
<?php require_once("includes/foot.php");