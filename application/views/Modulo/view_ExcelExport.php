<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$modulo_nome.".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php echo $tabela; ?>