<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $apiUrl = 'https://api.steamapis.com/market/apps?api_key=41847E3B822935AF4788459506983E2F';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    #faz a requisição
    $response = curl_exec($ch);

    if(curl_errno($ch)){
        echo "Erro cURL: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);
    }

    curl_close($ch);

    if ($response === false){
        die("Erro ao acessar a API da Steam");
    }

    echo "<h1>LISTA DE JOGOS STEAM</h1>";
    echo "<ul>";

    if (!isset($data['applist']['apps'])){
        die("Erro: Dados inválidos retornados pela API.");
    }
    
    foreach ($data['applist']['apps'] as $game) {
        echo "<li><strong>Nome: </stong>" . htmlspecialchars($games['name']) . "<Strong>ID:</strong> " . htmlspecialchars($games['appID']) . "</li>";
    }
    
    echo "</ul>";

    echo "Dados salvos em arquivos JSON!";
}
?>