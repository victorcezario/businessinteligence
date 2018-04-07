<?php
if(!is_int($_POST['vlr'])){
	echo "<script>alert('O numero não é inteiro');</script>";
}
if(round($_POST['vlr']) % 2 == 0){
     $x = "par";
} else {
     $x = "impar";
}
?>
<form method="POST">
<input type="text" name="vlr" value="<?php echo $_POST['vlr'] ?>">
<input type="submit">
</form>

<h1><br>Resultado: <?php echo $x; ?></h1>