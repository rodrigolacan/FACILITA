<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Produção - Facilita Login Sebrae</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('/assets/Login_Forms/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/Login_Forms/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{route('welcome')}}">
                    @csrf
					<span class="login100-form-logo">
						<img src="{{asset('/assets/Login_Forms/images/logo_sebrae.png')}}" width="115" height="110" alt="Logo_Sebrae">
					</span>
					<br>
					<br>
					<br>

					<div class="wrap-input100 validate-input" data-validate = "Preencha nome de usuário">
						<input class="input100" type="text" name="username" placeholder="Nome de Usuário">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Preencha a senha">
						<input class="input100" type="password" name="password" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<!--===================Lógica dos Erros==========================-->
				<br>
				<br>
				@if ($errors->has('INVALID_USER'))
                	<div class="alert alert-warning">
                    <p style="color:rgb(0, 0, 0)">Usuário ou Senha inválidos </p>
                	</div>
                @endif

				@if ($errors->has('LDAP_ERROR'))
                	<div class="alert alert-warning">
                    <p style="color:rgb(0, 0, 0)">Impossível se conectar ao servidor </p>
                	</div>
                @endif
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('/assets/Login_Forms/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('/assets/Login_Forms/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/assets/Login_Forms/js/main.js')}}"></script>

</body>
</html>