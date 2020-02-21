<!DOCTYPE html>
<html>
    <div>
        <form method="POST"> 
            <label>Insira seu texto: </label>
            <input type="text" name="input">
            <input type="submit" name="btn_enviar" value="Gerar Texto">
        </form>
    </div>
</html>

<?php
if(isset($_POST['btn_enviar'])){
    $texto = $_POST["input"];
    if($texto == ""){
        echo '<div><h1 style="color:red">TEXTO EM BRANCO!</h1></div>';
    }
    else{
        echo '<div><h1 style="color:blue">'.strtoupper($texto).'</h1></div>';
    }
}
?>