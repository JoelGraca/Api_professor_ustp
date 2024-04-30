<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Lista de Professores em Formulário</title>
    <style>
        body{
            background-image: url('image/ustp.png');
            background-size: cover; /* Ajusta o tamanho da imagem para cobrir todo o fundo */
            background-repeat: no-repeat; /* Evita a repetição da imagem */
            font-size: 15px;
            justify-content: center; /* Centraliza horizontalmente o conteúdo */
            align-items: center; /* Centraliza verticalmente o conteúdo */
            height: 100vh; /* Define a altura da página como 100% da altura da viewport */
            margin: 0; /* Remove as margens padrão do body */
            text-align: center;
        }
        .format{
            display:flex;
            width:580px;
            margin-top: 20px;
            margin-left: 500px;
            color:black;
            font-size: 15px;
            font-weight: 800;
        }
        .texto{
            margin-top: 10px;
            text-align: center;
        }
        h4{
            margin-top: 5px;
        }
        h5{
            color: #1874cd;
        }
        select{
            height: 40px;
            width:300px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .texto{
            color: #1c1c1c;
            font-weight: 800;
        }
        
       
        
       
        
    </style>
   
</head>
<body>

<h1 class="texto">Lista de Professores</h1>

<?php
// Inclui o arquivo de conexão
require_once 'conexao.php';

// Define a variável para armazenar o ID do professor selecionado
$selected_professor_id = '';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID do professor selecionado
    $selected_professor_id = $_POST["professor"];
}

// Query SQL para selecionar todos os professores
$sql = "SELECT * FROM tbprofessores";
$result = $conn->query($sql);

// Verifica se existem registros
if ($result->num_rows > 0) {
    // Exibe um seletor de nomes dos professores
    echo '<form action="" method="post">';
    echo '<label for="professor"><h4>Selecione um Professor: </h4> </label>';
  
    echo '<select name="professor" id="professor">';
    while ($row = $result->fetch_assoc()) {
        $selected = ($selected_professor_id == $row["idProfessor"]) ? 'selected' : '';
        echo '<option value="' . $row["idProfessor"] . '" ' . $selected . '>' . $row["nomeProfessor"] . '</option>';
    }
    echo '</select>';
    echo '<input class="btn btn-primary" style="height:46px;border: radiux 5%;"  type="submit" value="Mostrar Dados">';
   
    echo '</form>';
    echo '<br>';

    // Se o formulário foi submetido e um professor foi selecionado
    if ($selected_professor_id != '') {
        // Query SQL para selecionar os dados do professor selecionado
        $selected_professor_sql = "SELECT * FROM tbprofessores WHERE idProfessor = $selected_professor_id";
        $selected_result = $conn->query($selected_professor_sql);

        // Exibe os dados do professor selecionado
        if ($selected_result->num_rows > 0) {
            $selected_row = $selected_result->fetch_assoc();
            echo '<div class="conteudo">';
            echo '<div class="format"><label for="nome"><b><h5>Nome:</h5></b> </label> <input class="form-control type="text" id="nome" value="' . $selected_row["nomeProfessor"] . '" readonly><br></div></div>';
            echo '<div class="format"><label for="morada"><b><h5>Morada:</h5></b> </label> <input class="form-control type="text" id="morada" value="' . $selected_row["moradaProfessor"] . '" readonly><br></div>';
            echo '<div class="format"><label for="contato"><b><h5>Contato:</h5></b> </label> <input class="form-control type="text" id="contato" value="' . $selected_row["contatoProfessor"] . '" readonly><br></div>';
            echo '<div class="format"><label for="genero"><b><h5>Gênero: </h5></b> </label> <input class="form-control type="text" id="genero" value="' . $selected_row["genero"] . '" readonly><br></div>';
            echo '<div class="format"><label for="nivel_academico"><b><h5>Nível Acadêmico:</h5></b> </label> <input class="form-control type="text" id="nivel_academico" value="' . $selected_row["nivel_academico"] . '" readonly><br></div>';
            echo '<div class="format"><label for="curso"><b><h5>Curso:</h5></b> </label> <input class="form-control type="text" id="curso" value="' . $selected_row["curso"] . '" readonly><br></div>';
            echo '<div class="format"><label for="categoria"><b><h5>Categoria:</h5></b> </label> <input class="form-control type="text" id="categoria" value="' . $selected_row["categoria"] . '" readonly><br></div>';
            echo '<div class="format"><label for="anos_profissao"><b><h5>Anos de Profissão:</h5></b> </label> <input class="form-control" style="width: 100px;" type="text" id="anos_profissao" value="' . $selected_row["anos_profissao"] . '" readonly><br></div>';
            echo '</div>';
        } else {
            echo "Nenhum professor encontrado para o ID selecionado.";
        }
    }
} else {
    echo "Nenhum professor encontrado.";
}

// Fecha a conexão
$conn->close();
?>


</body>
</html>
