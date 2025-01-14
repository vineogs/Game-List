<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $apiUrl = 'https://api.steamapis.com/market/apps?api_key=41847E3B822935AF4788459506983E2F';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Faz a requisição
    $response = curl_exec($ch);

    if(curl_errno($ch)){
        echo "Erro cURL: " . curl_error($ch);
    } else {
        // Decodifica a resposta JSON
        $data = json_decode($response, true);
    }

    var_dump($data);

    curl_close($ch);

    // Verifica se a resposta da API foi bem-sucedida
    if ($response === false){
        die("Erro ao acessar a API da Steam");
    }

    // Exibe a lista de jogos
    echo "<h1>LISTA DE JOGOS STEAM</h1>";
    echo "<ul>";

    // Verifica se a chave 'applist' e 'apps' existem
    if (!isset($data['applist']['apps'])){
        die("Erro: Dados inválidos retornados pela API.");
    }

    // Itera sobre os jogos dentro de 'applist' -> 'apps'
    foreach ($data['applist']['apps'] as $game) {
        echo "<li><strong>Nome: </strong>" . htmlspecialchars($game['name']) . "<strong> | ID: </strong>" . htmlspecialchars($game['appid']) . "</li>";
    }
    
    echo "</ul>";

    echo "Dados salvos em arquivos JSON!";
}
?>
