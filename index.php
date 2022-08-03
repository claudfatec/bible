<?php require_once("includes/header.php");
require_once("includes/conn.php");
$conn = getDB()?>
<!-- Título -->
<div id="top">
  <span class="titulo">
    PLANO DE LEITURA ANUAL
	</span>
  <span class="esquerda"><?php require_once("includes/openbible.php");?></span>
	<!--  <span class="direita">
    <form action="rm8_28.php" method="post">
     <select name="abrev">
        <option value="">--Livro--</option>
        <option value="gn">Gênesis</option>
        <option value="ex">&Ecirc;xodo</option>
        <option value="lv">Lev&iacute;ticos</option>
      </select>
      Cap&#237;tulo: <input type="int" name="captl">
      Verso: <input type="int" name="verscl">
     <input type="submit" value="Vamos la!">
   </form>
	</span>-->
</div>
<?php require_once("includes/foot.php");