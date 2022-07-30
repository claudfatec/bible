<?php
if ($_GET["bookid"]==NULL) {?><!--Valida se escolheu livro, caso negativo gera o select-->
    <form action= "index.php?bookid=<?=$_GET['bookid']?>" method="get">
        <select name="bookid">

            <optgroup label = "Antigo Testamento"><!--Destaca as opções de livros do AT-->
                <option value="">--Livro--</option>

                <?php $sql = "select id, name from books where testament=1";
                $results = mysqli_query($conn, $sql);
                if ($results === false) {
                    echo mysqli_error($conn);
                } else {
                    $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
                } 
                if (empty($bibles)){?>
                    <option value = 1>Texto não encontrado.</option><?php
                }
                else {
                    foreach ($bibles as $bible){ ?>
                        <option value="<?=$bible['id']?>"> <?=$bible['name']?></option><?php
                    }
                }?>
            </optgroup>

            <optgroup label = "Novo Testamento"><!--Destaca as opções de livros do NT-->
                <?php $sql = "select id, name from books where testament=2";
                $results = mysqli_query($conn, $sql);
                if ($results === false) {
                    echo mysqli_error($conn);
                } else {
                    $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
                } 
                if (empty($bibles)){?>
                    <option value = 1>Texto não encontrado.</option><?php
                }
                else {
                    foreach ($bibles as $bible){?>
                        <option value="<?=$bible['id'] ?>"><?= $bible['name']?></option>
                        <?php }
                }?>
                </optgroup>           

        </select>
        <input type="submit" value="Captl.">
    </form>
    <?php 
    
    //Recebe o capítulo desejado

} else {
    $livro = $_GET['bookid'];
    ?>
        <form action="capitulo.php?" method="get">
        <select name="nombre">

        <?php $sql = "select id, name from books where id = '$livro'";
        $results = mysqli_query($conn, $sql);
        if ($results === false) {
            echo mysqli_error($conn);
        } else {
            $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
        } 
        if (empty($bibles)){?>
          <option value = 1>Texto não encontrado ainda.</option>
        <?php }
        else {
            foreach ($bibles as $bible){?>
                <option value="<?=$bible['name'] ?>"><?=$bible['name']?></option>

                <?php } ?>
        </select>

        <select name="captl">
        <option value="">--Capítulo--</option>
        <?php $sql = "select chapter from books inner join verses on book = books.id -1 where books.id = '$livro' and verse=1";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
            <option value="<?=$row['chapter']?>"><?=$row['chapter']?></option>
            <?php }
        } else { ?>
          <option value='1'>Deu ruim...Tente novamente!</option> <?php
        } ?>
        </select>
        <input type="hidden" name="bookid" value="<?=$livro?>">
        <input type="submit" value="Vamos">
        </form>
        <?php }
    }
?>