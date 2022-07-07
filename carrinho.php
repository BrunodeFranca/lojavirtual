
<?php
include_once './menu.php';
include_once './conexion.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

session_start();
?>


<?php
if (!isset($_SESSION['itens'])) {

    $_SESSION['itens'] = array();
}
if (isset($_GET['add']) && $_GET ['add'] == 'carrinho') {

    $idProduto = $_GET['id'];
    if (!isset($_SESSION['itens'][$id])) {
        $_SESSION['itens'][$id] = 1;
    } else {
        $_SESSION['itens'][$id] += 1;
    }
}
if (count($_SESSION['itens']) == 0) {
    echo '<div class="container" style="color: green; margin-top:10px;font-size:20px;">Carrinho vazio<br><br> <a class= "bg-info text-white btn btn-primary" href= "index.php">Adicionar Itens</a></div>';
  
} else {
    $_SESSION['dados'] = array();
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $select = $conn->prepare('SELECT *FROM produtos WHERE id=?');
        $select->bindParam(1, $idProduto);
        $select->execute();
        $produtos = $select->fetchALL();
        $desc = $produtos[0]['preco'] - $produtos[0]['desconto'];
        $total = $quantidade * $desc;

        //echo '<div class="container"><br>Imagem: ' .$produtos[0]['imagem']. '</b></div>';
        echo '<div class="container"><br>Nome: ' . $produtos[0]['nome'] . '</b></div>';
        echo'<div class="container"><br>Preço: ' . number_format($desc, 2, ",", ".") . '</b></div>';
        echo'<div class="container"><br>Quantidade: ' . $quantidade . '</b><hr>
        Total: ' . number_format($total, 2, ",", ".") . '<hr>   
       <a class="bg-info text-white btn bg-danger" href="remover.php?remover=carrinho&id=' . $idProduto . '">Remover</a>
        <hr></div>';
        array_push($_SESSION['dados'], $total);
    }
    $total_venda = array_sum($_SESSION['dados']);
    echo '<div class="container">Total de Produtos: ' . array_sum($_SESSION['itens']);
    echo '<div class="container" style="margin-left:-15px">Valor Total <strong> R$: ' . number_format($total_venda, 2, ",", ".");
    "</strong>";  
}
  
?>  
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="images/icon/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    </head>
    <style>
        .rodape{
            font-size:12px;
            margin-top:20px;
        }
    .comprar{
            font-size:12px;
            margin-top:30px;
        }
    </style>
    <body>
        <div class="container">
            <hr>
                    <div class="float-right comprar">
                        <a href="#" class= "bg-info text-white btn btn-primary">Comprar</a>
                        <hr>
                    </div>
                     
                   
                    <script src="https://kit.fontawesome.com/01d45b8aaf.js" crossorigin="anonymous"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

                    </body>
                    </html> 