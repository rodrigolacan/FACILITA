<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Inválido</title>
    <!-- Incluindo Bootstrap CSS -->
    <link href="{{asset("\assets\vendor\bootstrap\css\bootstrap.css")}}" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f8f9fa;
        }
        .aviso {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="aviso">
            <h1 class="display-4 text-danger">O LINK QUE VOCÊ ESTÀ TENTANDO ACESSAR É INVÁLIDO OU EXPIROU</h1>
            <p class="lead">O link que você acessou é inválido ou está expirado. Por favor, verifique o endereço e tente novamente.</p>
        </div>
    </div>
</body>
</html>
