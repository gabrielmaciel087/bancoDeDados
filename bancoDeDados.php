<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> BANCO DE DADOS </title>
        <link rel="stylesheet" href="AtvBanco6.css">
    </head>
    <body>
        <center><div>
            <?php
                if(isset($_POST["nome_paciente"]) && isset($_POST["idade"]) && isset($_POST["data"]) && isset($_POST["dentista"])){
                    $servidor = "localhost";
                    $database = "clinica_odontologica";
                    $usuario = "root";
                    $senha = "root";

                    $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

                    $nome_paciente = $_POST["nome_paciente"];
                    $idade = $_POST["idade"];
                    $data = $_POST["data"];
                    $dentista = $_POST["dentista"];

                    $sql = "INSERT INTO consultas(nome_paciente, idade, data, dentista) VALUES('$nome_paciente', $idade, '$data', '$dentista')";

                    if(mysqli_query($conexao, $sql)){
                        echo "REGISTRO REALIZADO COM SUCESSO<br><br><br>";
                    }else{
                        echo "ERRO AO INSERIR REGISTRO: " .$sql. "<br>".mysqli_error($conexao);
                    }
        
                    mysqli_close($conexao);
                }
                else{
                    echo"PREENCHA OS CAMPOS PARA REALIZAR O REGISTRO<br><br><br>";
                }
            ?>
            <form method=post>
                <input type="text" name="nome_paciente" placeholder="Nome do Paciente:">
                <input type="text" name="idade" placeholder="Idade:">
                <input type="text" name="data" placeholder="Data:">
                <input type="text" name="dentista" placeholder="Dentista:"><br><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div></center>
    </body>
</html>