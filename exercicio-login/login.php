<?php 
    if(isset($_POST['login'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if(($usuario === 'admin') && ($senha === '12345')){
            header("refresh:5;url=dashboard.php?login"); 
            echo '
            <body style="background-color:black; text-align:center">
            <br/>
            <img src = "https://thumbs.gfycat.com/CreamyFormalChanticleer-max-1mb.gif" style="width:50%;">
            </body>
            ';
        }
        else{
            header("refresh:5;url=index.php"); 
            echo '
            <body style="background-color:black; text-align:center">
            <br/>
            <img src = "https://thumbs.gfycat.com/CheeryNewBongo-small.gif" style="width:50%;">
            </body>
            ';
        }
    }
?>