

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Encontrados</title>

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

    $query = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
    $result = mysqli_query($conexao, $query);

    if(mysqli_num_rows($result) > 0) {
        // CPF encontrado, exibe os dados do aluno
        while($row = mysqli_fetch_assoc($result)) {
            echo "id:  " . $row['id'] . "<br>";
            echo "Nome: " . $row['nome'] . "<br>";
            echo "CPF: " . $row['cpf'] . "<br>";
            echo "Data de nascimento: " . $row['data_nasc'] . "<br>";
            echo "Peso:  " . $row['peso'] . "<br>";
            echo "Altura:  " . $row['altura'] . "<br>";
            echo "Telefone:  " . $row['telefone'] . "<br>";
            echo "Endereço:  " . $row['endereco'] . "<br>";
            // e assim por diante, para exibir os demais campos do banco de dados
        }
    } else {
        // CPF não encontrado
        echo "Aluno não encontrado.";
    }




?>



<script>function voltar() {
    location.href = '/gym/index.html';

        }</script>
</div>

    
</body>
</html>