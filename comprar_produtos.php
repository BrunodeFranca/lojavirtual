<?php
include_once './conexion.php';
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="images/icon/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <title>Formulario Compras</title>
        <style>
            .rodape{
                font-size:12px;
            }
        </style>
    </head>
    <body>
         
        <?php
        include_once './menu.php';
        $query_view_product = "SELECT id, nome,imagem, preco,desconto FROM produtos WHERE id= :id";
        $result_view_product = $conn->prepare($query_view_product);
        $result_view_product->bindParam(':id', $id, PDO::PARAM_INT);
        $result_view_product->execute();
        $row_product = $result_view_product->fetch(PDO::FETCH_ASSOC);
        extract($row_product);
        $desconto = ($preco - $desconto);
      
        ?>

        <div class="container">  
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="./images/logo/skimel.jpg" alt="" width="72" height="57">
                <h2>Formulário de Pagamento</h2>
                <p class="lead">Por favor, preencha todos os dados para efetuar o pagamento com sucesso. a Skimel Sorvetes agradece a sua preferência..Obrigado!!</p>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <h5><?php echo "$nome"; ?></h5>
                </div>
                <div class="col-md-4">
                    <div class="mb-1 text-muted">
                    <h6>quantidade: <?php echo "$quantidade"; ?></h6>
                </div>
                 </div>
                <div class="col-md-4">
                    <div class="mb-1  text-muted">
                        <p><strong>Valor: </strong>R$:<?php echo number_format($desconto, 2, ",", "."); ?></p>  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h4 class="mb-3">Informações Pessoais</h4>
                    <form>
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Primeiro Nome</label>
                                <input type="text" name ="first_name" id="first_name" class="form-control" autofocus placeholder="primeiro nome" required>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Sobrenome</label>
                                <input type="text" name ="last_name" id="last_name" class="form-control" placeholder="sobrenome" required>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cpf">CPF</label>
                                <input type="text" name ="cpf" id="cpf" class="form-control" placeholder="cpf" required>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="celular">Celular</label>
                                <input type="text" name ="celular" id="celular" class="form-control" placeholder="celular" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="address" placeholder="Rua.. Numero." required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email <span class="text-muted">Seu melhor email</span></label>
                                <input type="email" class="form-control" id="email" placeholder="voce@gmail.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <button type="button" class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
<hr>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#" class= "btn btn-primary">inicio</a>
        </p>
        <div class="rodape">
            <p>&copy: Todos os direitos reservados.Entre em contato conosco caso tenha alguma dúvida<p>
                Telefone: (34)997653846 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
            </svg><p></p>
            Email:brunoalecondefranca@gmail.com  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
            </svg><p></p>
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        </body>
        </html>
