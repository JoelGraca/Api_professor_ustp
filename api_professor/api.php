<?php
// Inclui o arquivo de conexão
require_once 'conexao.php';

// Define a chave de API esperada (em um ambiente real, armazene isso de forma mais segura)
$apiKeyExpected = 'rgbACis47USTP@';

// Inicializa a variável para armazenar o ID do professor a ser buscado
$idProfessor = isset($_GET['idProfessor']) ? $_GET['idProfessor'] : '';

// Obtém a chave de API da requisição
$apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : '';

// Verifica se a chave de API está presente e é válida
if ($apiKey !== $apiKeyExpected) {
    // Retorna uma mensagem de erro se a chave de API for inválida
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Chave de API inválida.'));
    exit;
}

// Query SQL para selecionar professores filtrando por ID
$sql = "SELECT * FROM tbprofessores";
if (!empty($idProfessor)) {
    // Adiciona uma cláusula WHERE para filtrar por ID do professor
    $sql .= " WHERE idProfessor='{$idProfessor}'";
}

$result = $conn->query($sql);

// Array para armazenar os resultados
$professores = array();

// Verifica se existem registros
if ($result->num_rows > 0) {
    // Loop através dos resultados
    while ($row = $result->fetch_assoc()) {
        // Adiciona cada professor como um item no array
        $professor = array(
            'idProfessor' => $row["idProfessor"],
            'nomeProfessor' => $row["nomeProfessor"],
            'moradaProfessor' => $row["moradaProfessor"],
            'contatoProfessor' => $row["contatoProfessor"],
            'genero' => $row["genero"],
            'nivel_academico' => $row["nivel_academico"],
            'curso' => $row["curso"],
            'categoria' => $row["categoria"],
            'anos_profissao' => $row["anos_profissao"]
        );

        // Adiciona o professor ao array de professores
        $professores[] = $professor;
    }

    // Converte o array de professores para JSON
    $jsonProfessores = json_encode($professores);

    // Retorna o JSON como resposta da API
    header('Content-Type: application/json');
    echo $jsonProfessores;
} else {
    // Retorna uma mensagem se nenhum professor for encontrado
    echo json_encode(array('message' => 'Nenhum professor encontrado.'));
}

// Fecha a conexão
$conn->close();
?>
