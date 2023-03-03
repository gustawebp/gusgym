<?php
error_reporting(0);

if(isset($_POST['submit'])) {
    // print_r($_POST['nome']);
    // print_r('<br>');
    // print_r($_POST['cpf']);
    // print_r('<br>');
    // print_r($_POST['datanasc']);
    // print_r('<br>');
    // print_r($_POST['sexo']);

    include_once('config.php');
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $nivel = $_POST['nivel'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $data_matricula = $_POST['data_matricula'];


    function validaCPF($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
        if (strlen($cpf) != 11) {
            return false;
        }
    
        $digitoA = 0;
        $digitoB = 0;
    
        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoA += $cpf[$i] * $x;
        }
    
        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            if (str_repeat($i, 11) == $cpf) {
                return false;
            }
            $digitoB += $cpf[$i] * $x;
        }
    
        $soma = (($digitoA % 11) < 2) ? 0 : 11 - ($digitoA % 11);
        if ($cpf[9] != $soma) {
            return false;
        }
    
        $soma = (($digitoB % 11) < 2) ? 0 : 11 - ($digitoB % 11);
        if ($cpf[10] != $soma) {
            return false;
        }
    
        return true;
    }

    $cpf = $_POST['cpf'];

    if (!validaCPF($cpf)) {
        echo '
        CPF INVÁLIDO <br>
        <button onclick="voltar()">Voltar</button>
        <script>
            function voltar() {
                location.href = \'/gym/index.html\';
            }
        </script>';
        exit;
    }
    

    




// restante do código para inserir no banco de dados

    
    
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, data_nasc, cpf, sexo, telefone, endereco, altura, peso, nivel, data_matricula)
    VALUES ('$nome', '$datanasc', '$cpf', '$sexo', '$telefone', '$endereco', '$altura', '$peso' , '$nivel', '$data_matricula')");
    
    echo "<script>alert('Aluno Cadastrado!! Obrigado!');</script>";


}
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="stylecadastro.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/0/396.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <button onclick="voltar()" class="back">Voltar</button>

    <main>

    <div class="formulario">

<form action="" method="post">
    <h1>Gym System</h1>

    <p class="cad">Cadastro de Alunos</p>
    
     <input autocomplete="off" required placeholder="Nome Completo" name="nome" type="text"> <br> <br>
     <input required id="cpf"  placeholder="CPF" name="cpf" maxlength="11" type="text"> <br> <br>
     <input autocomplete="off" required type="radio" value="masculino" name="sexo"> Masculino <br>
     <input required type="radio" value="feminino" name="sexo"> Feminino <br> <br>
    <span   placeholder="a" id="data">Data de Nascimento</span> <input autocomplete="off" required placeholder="Idade" id="data"  maxlength="8" name="datanasc" type="date"> <br> <br>
    <span required id="data">Data de Matricula</span> <input required   id="data"  placeholder="data_matricula" maxlength="8" max="8"  name="datanasc" type="date"> <br> <br>
     <input autocomplete="off" required type="text" maxlength="13"  name="telefone" placeholder="Telefone"> <br>  <br>
     <input autocomplete="off" required type="text" maxlength="50"  name="endereco" placeholder="Endereço">
     



</div>
<br>
<div class="alunoform">



<h1>Corpo do aluno</h1>

    <input required type="number" maxlength="3" max="999" name="altura" placeholder="Altura do Aluno (em cm)">
    <br> <br>
    <input required type="number" maxlength="3" max="999"  name="peso" placeholder="Peso do Aluno (em kg)">
    <br>   <br>
    <b> Nível de Alimentação Considerado <br>
    </b>
    <input required type="radio" value="excelente" name="nivel" id=""> Excelente
    <input required type="radio" value="medio" name="nivel" id=""> Médio
    <input required type="radio" value="ruim" name="nivel" id=""> Ruim
    

    
    <div class="enviar">
    <br> <br> <input type="submit" name="submit" id="submit">
    </div>


    </form>





    </main>


    <script>

        function voltar() {
            location.href = '/gym/index.html';
        }
        $(document).ready(function(){
        $('#cpf').mask('000.000.000-00');
    });

     
const input = document.getElementById('cpf');

// adicione um evento de escuta para quando o valor for alterado
input.addEventListener('input', function() {
  // obtenha o valor atual do input
  const value = this.value;

  // remova qualquer caractere que não seja um dígito
  const cleanValue = value.replace(/\D/g, '');

  // formate o valor como xxx.xxx.xxx-xx
  const formattedValue = cleanValue.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');

  // defina o valor do input como a versão formatada
  this.value = formattedValue;
});


    </script>
   



    
</body>
</html>