<?php

    //colar aqui pelo amor dos meus bigodes

    FUNCTION cadastrar(){

    $contatosAuxiliar = file_get_contents('contatos.json'); //guardando os resultados
    $contatosAuxiliar = json_decode($contatosAuxiliar, true); // convertendo para um array

    $contato = [
        "id"       => uniqid(), //gerar um id novo e diferente de todos cada vez que atualizar
        "nome"     => $_POST['nome'],
        "email"    => $_POST['email'],
        "telefone" => $_POST['telefone']
    ];

    array_push($contatosAuxiliar, $contato);
    $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT); //arrumar na hora de executar
    //atualizar o conteudo do arquivo

    file_put_contents('contatos.json', $contatosJson);
    header('Location: index.php');
}
    function pegarDados(){
        $contatosAuxiliar = file_get_contents('contatos.json');
        $contatosAuxiliar = json_decode($contatosAuxiliar, true);

        return $contatosAuxiliar;
    }



    function excluir($idProcurado){
        $contatosAuxiliar = file_get_contents('contatos.json');
        $contatosAuxiliar = json_decode($contatosAuxiliar, true);

        foreach ($contatosAuxiliar as $posicao => $cc){
            if ($idProcurado == $cc['id']){
                unset($contatosAuxiliar[$posicao]);

            }
        }

        $arrayNovo = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
        file_put_contents('contatos.json', $arrayNovo);
        sleep(1);
        header('location: index.php');

    }

    if( $_GET['acao'] == "cadastrar"){
        cadastrar();
    }

    if ($_GET['acao'] == "excluir"){
        excluir($_GET['id']);
    }
