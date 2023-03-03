

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

    // Busca os dados do usuário antes de deletar
    $query_select = "SELECT id, nome, data_nasc, cpf, sexo, telefone, endereco, altura, peso, nivel FROM usuarios WHERE cpf = '$cpf'";
    $result_select = mysqli_query($conexao, $query_select);
    $usuario_deletado = mysqli_fetch_assoc($result_select);

    // Deleta o usuário
    $query_delete = "DELETE FROM usuarios WHERE cpf = '$cpf'";
    $result_delete = mysqli_query($conexao, $query_delete);

    if(mysqli_affected_rows($conexao) > 0) {
        // Registro deletado com sucesso
        echo "Registro deletado com sucesso. <br>
        Dados do usuário: <br>";
        echo "ID: " . $usuario_deletado['id'] . "<br>";
        echo "Nome: " . $usuario_deletado['nome'] . "<br>";
        echo "Data de nascimento: " . $usuario_deletado['data_nasc'] . "<br>";
        echo "CPF: " . $usuario_deletado['cpf'] . "<br>";
        echo "Sexo: " . $usuario_deletado['sexo'] . "<br>";
        echo "Telefone: " . $usuario_deletado['telefone'] . "<br>";
        echo "Endereço: " . $usuario_deletado['endereco'] . "<br>";
        echo "Altura: " . $usuario_deletado['altura'] . "<br>";
        echo "Peso: " . $usuario_deletado['peso'] . "<br>";
        echo "Nível: " . $usuario_deletado['nivel'] . "<br>";
    } else {
        // Registro não encontrado ou não foi deletado
        echo "Não foi possível deletar o registro. <br> Verifique o CPF";
    }

    mysqli_close($conexao);
?>


<script>function voltar() {
    location.href = '/gym/deletar/index.html';

        }</script>
</div>

    
</body>
</html>