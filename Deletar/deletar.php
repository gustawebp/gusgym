

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletado</title>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

body{
    font-family: 'Open Sans', sans-serif;
    background-color: #4C5958; ;
    color: white;
    

}

h1{
    text-align: center;
}

.encontrado{
    text-align: start;
    border: 1px solid white;
    width: 50%;
    padding: 20px 20px;
    margin: auto;
}
.back{

border: 1px solid white;
color: black;
font-size: 16pt;
border-radius: 10px;
margin: 0 auto;
padding: 5px 10px;
text-align: center;
}



</style>
<body>

<h1>Aluno Encontrado!</h1>
<button onclick="voltar()" class="back">Voltar</button>

<div class="encontrado">

<?php
    include_once('config.php');

    $cpf = $_POST['cpf'];
    

    $query = "DELETE FROM USUARIOS WHERE CPF = '$cpf'";
    $result = mysqli_query($conexao, $query);

    if(mysqli_affected_rows($conexao) > 0) {
        // Registro deletado com sucesso
        echo "Registro deletado com sucesso. <br>
        CPF: '$cpf'";
    } else {
        // Registro não encontrado ou não foi deletado
        echo "Não foi possível deletar o registro. <br> Verifique o CPF";
    }
?>



<script>function voltar() {
    location.href = '/gym/index.html';

        }</script>
</div>

    
</body>
</html>