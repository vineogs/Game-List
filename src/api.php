<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $apiUrl = 'https://ghibliapi.vercel.app/films';

    #faz a requisição
    $response = file_get_contents($apiUrl);

    if ($response !== false){
        $films = json_decode($response, true);

        echo "<h1>Lista de Filmes do Studio Ghibli</h1>";
        echo "<ul>";

        foreach($films as $film) {
            echo "<li><strong>" . htmlspecialchars($film['title']) . "</strong>" . htmlspecialchars($film['description']) . "</li>";
        }

        echo "<ul>";
    }else{
        echo "<p>Erro: Não foi possível acessar os dados da API do Studio Ghibli.</p>";
    }
}else{
    echo "<p>Acesso inválido. Use o botão do formulário para carregar os filmes.</p>";
}