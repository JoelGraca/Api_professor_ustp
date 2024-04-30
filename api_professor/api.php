<?php
// Inclui o arquivo de conexão
require_once 'conexao.php';

// Inicializa a variável para armazenar o nome do professor a ser buscado
$nomeProfessor = isset($_GET['nomeProfessor']) ? $_GET['nomeProfessor'] : '';

// Query SQL para selecionar professores filtrando por nome
$sql = "SELECT * FROM tbprofessores";
if (!empty($nomeProfessor)) {
    // Adiciona uma cláusula WHERE para filtrar por nome do professor
    $sql .= " WHERE nomeProfessor LIKE '%$nomeProfessor%'";
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
