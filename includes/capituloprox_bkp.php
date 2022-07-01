<?php
if ($proxverscl >= 93186) {
    $proxverscl=62150;
} elseif ($proxverscl <=62124) {
    $proxverscl=93180;
}
$sql = "select books.id, chapter, name from books inner join verses on book = books.id -1 where verses.id = '$proxverscl' ";
$results = mysqli_query($conn, $sql);
if ($results === false) {
    echo mysqli_error($conn);
} else {
    $bibles = mysqli_fetch_all($results, MYSQLI_ASSOC);
} 
    if (empty($bibles)){
        echo 'SQL não funfou.';
    } else {
        foreach ($bibles as $bible)
        $bookid= $bible['id'];
        $captl= $bible['chapter'];
        $nombre= $bible['name'];

    }           
     

