<?php
// URL da API
$url = "https://api-professor-ustp.000webhostapp.com/api.php?&apiKey=rgbACis47USTP@";

// Obtendo os dados da API
$response = file_get_contents($url);

// Verificando se houve erro na requisição
if ($response === FALSE) {
    echo "Erro ao acessar a API.";
    exit; // Saímos do script se ocorrer um erro
}

// Decodificando a resposta JSON
$professors = json_decode($response);

// Verificando se a decodificação foi bem-sucedida
if ($professors === NULL) {
    echo "Erro ao decodificar os dados da API.";
    exit; // Saímos do script se ocorrer um erro
}

// Verificando se os dados são válidos
if (!is_array($professors)) {
    echo "Os dados da API não estão no formato esperado.";
    exit; // Saímos do script se ocorrer um erro
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Professores em Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("image/ustp.png");
            background-size: cover; /* Ajusta o tamanho da imagem para cobrir todo o fundo */
            background-repeat: no-repeat; /* Evita a repetição da imagem */
            background-attachment: fixed; /* Faz a imagem de fundo ficar fixa */
        }
        .card {
            background-color: rgba(0, 0, 0, 0.8); /* Cor preta com 10% de opacidade */
            color: white;
            font-size: 20px;
            
        }
        .text-center{
            margin-top: 30px;
            font-size: 30px;
            
        }
        b{
            font-weight: 800;
        }


    </style>
</head>
<body>

<h1 class="text-center"><b>Dados Profissionais dos Professores <img src="image/logo.png" alt="" width="60px;" height="50px;"></b></h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form action="" method="post" class="mb-3">
        <div class="input-group mb-3">
            <input type="number" name="idProfessor" class="form-control" placeholder="Informe o ID do professor" value="<?php echo isset($_POST['idProfessor']) ? $_POST['idProfessor'] : ''; ?>" required>
            <button type="submit" class="btn btn-primary">Mostrar Dados</button>
        </div>

</form>


            <?php
            // Verifica se o formulário foi enviado
            if (isset($_POST['idProfessor'])) {
                $idProfessor = $_POST['idProfessor'];
                $selectedProfessor = null;

                // Encontrar o professor selecionado
                foreach ($professors as $professor) {
                    if ($professor->idProfessor == $idProfessor) {
                        $selectedProfessor = $professor;
                        break;
                    }
                }

                // Exibir os dados do professor selecionado
                if ($selectedProfessor !== null) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text"><b>Nome:</b> ' . $selectedProfessor->nomeProfessor . '</p>';
                    echo '<p class="card-text"><b>Morada:</b> ' . $selectedProfessor->moradaProfessor . '</p>';
                    echo '<p class="card-text"><b>Contato:</b> ' . $selectedProfessor->contatoProfessor . '</p>';
                    echo '<p class="card-text"><b>Gênero:</b> ' . $selectedProfessor->genero . '</p>';
                    echo '<p class="card-text"><b>Nível Acadêmico:</b> ' . $selectedProfessor->nivel_academico . '</p>';
                    echo '<p class="card-text"><b>Curso:</b> ' . $selectedProfessor->curso . '</p>';
                    echo '<p class="card-text"><b>Categoria:</b> ' . $selectedProfessor->categoria . '</p>';
                    echo '<p class="card-text"><b>Anos de Profissão:</b> ' . $selectedProfessor->anos_profissao . '</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo "<b><h5><p class='text-danger'>Nenhum professor encontrado para o ID selecionado.</p></h5></b>";
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
