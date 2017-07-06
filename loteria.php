<?php
function sorteiaNums(string $jogoEscolhido, int $quantNums){
    $jogos = ['Mega Sena' => 60, 'Quina' => 80, 'Lotomania' => 100, 'Lotofácil' => 25];

    $numsSorteados = [0];
    $qntMax = $jogos[$jogoEscolhido];

    for ($i=0; $i < $quantNums; $i++){
        $sorteio = rand(1,$qntMax);
        $count = count($numsSorteados);

        for ($j = 0; $j < $count; $j++) {
            if ($sorteio == $numsSorteados[$j]){
                $sorteio = rand(1,60);
                $j = 0;
            }
        }

        $numsSorteados[$i] = $sorteio;

    }

    sort($numsSorteados);

    return $numsSorteados;
} //Sorteia os numeros

function valor(string $jogoEscolhido, int $quantNums, int $quantApostas){
    $precos = [
        'Mega Sena' => [6  => 3.5, 7 => 24.5, 8 => 98, 9 => 294, 10 => 735, 11 => 1617, 12 => 3234, 13 => 6006, 14 => 10510.50, 15 => 17517.50],
        'Quina'     => [5  => 1.5, 6 => 9, 7 => 31.5, 8 => 84, 9 => 189, 10 => 378, 11 => 693, 12 => 1188, 13 => 1930.5, 14 => 3003, 15 => 4504.5],
        'Lotomania' => [50 => 1.5],
        'Lotofácil' => [15 => 2, 16 => 32, 17 => 272, 18 => 1632]
    ];

    $valor = $precos[$jogoEscolhido][$quantNums] * $quantApostas;

    return $valor;
} // Retorna valor
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loteria</title>
    <h1> Escolha a loteria a qual você deseja apostar</h1>
</head>
<body>
<form action="">
    <input type="radio" name="tipo" value="Mega Sena" checked> Mega-sena <br>
    <input type="radio" name="tipo" value="Quina"> Quina <br>
    <input type="radio" name="tipo" value="Lotomania"> LotoMania <br>
    <input type="radio" name="tipo" value="Lotofácil"> LotoFacil <br> <br>
    <input type="number" name="dezenas" value="dezenas" placeholder="Digite as dezenas"> <br><br>
    <input type="number" name="apostas" value="apostas" placeholder="Digite as apostas"> <br><br>
    <input type="submit" onclick= value="Enviar">
    <input type="button" onclick="alert('Você saiu!')" value="Sair">
</form>
<div>
    <?php sorteiaNums($_GET['tipo'], $_GET['dezenas'])

    ?>
</div>
</body>
</html>