<?php
require 'includes/init.php';
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
 <div class = 'content'><?= $nombre?> <?=$captl;?></div>

    <span class='content esquerda'>previous<a href='index.php'>Home</a></span> 
    <span class='content direita'>next</span>
    <span><?php require 'includes/openbible.php' ?></span>
    

    </div>
    <?php $sql = "select text, verse, verses.id from books inner join verses on book = books.id -1 where books.id = '$livro' and chapter = '$captl' order by verse";
    $results = mysqli_query($conn, $sql);
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    } ?>

    <div id = "conteudo">
    <?php if (empty($bibles)): ?>
        <div id = "conteudo">Texto não encontrado ainda mesmo.</div>
        <?php else: ?><br>
            <?php foreach ($bibles as $bible): ?>
                <div class = 'texto'><strong><?= $bible['verse'];?> .</strong> <?=$bible['text'];?>
            </div><?php
            endforeach;
    endif; ?>

    </div>


    <?php 

    //Aqui  vai o previous e next


    $proxverscl = $bible['id']+1;
    $antverscl = $bible['id']-$bible['verse'];
include 'includes/capituloprox.php';
 ?>   
    <div class='content'><a href='index.php'>Home</a></div> 
</div>
<?php require_once("includes/foot.php");