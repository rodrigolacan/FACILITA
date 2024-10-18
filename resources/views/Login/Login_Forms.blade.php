<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Produção - Facilita Login Sebrae</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@vite('resources/css/Template/main.css')
    @vite(['resources/js/app.js'])
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="bg-gradient-to-bl from-[#005EB8] to-[#000000] h-screen flex items-center justify-between px-[150px]">
  <!-- Texto de Boas-vindas -->
  <div class="w-1/2 flex flex-col justify-center">
    <!-- Título Facilita -->
	<h1 class="{{ env('APP_ENV') === 'production' ? 'text-[#00BFFF]' : (env('APP_ENV') === 'homolog' ? 'text-red-500' : 'text-white') }} font-fugaz text-[80px]">
		Facilita
	</h1>
    <!-- Parágrafo de introdução -->
    <p class="text-white font-['Roboto'] font-semibold text-[50px] leading-tight mt-4">
      Bem-vindo ao Facilita! Sua intranet inteligente para otimizar tarefas e conectar ideias.
    </p>
    <!-- Subtexto -->
    <p class="text-white font-roboto text-[24px] opacity-40 mt-4">
      Faça login e comece a explorar!
    </p>
  </div>

  <!-- Formulário de Login -->
  <div class="w-1/3 rounded-lg p-8">
    <form method="POST" action="{{ route('welcome') }}" class="space-y-4">
      @csrf
	  <div class="w-full max-w-md space-y-4">
		<!-- Input de Nome de Usuário -->
		<div class="flex items-center border-b-2 border-[#12325d] py-2">
			<span class="material-icons text-white pr-2">
			person
			</span>
			<input class="appearance-none bg-transparent border-none w-full text-white text-xl placeholder-white focus:outline-none" 
			type="text" placeholder="Nome de Usuário" name="username" required />
		</div>

		<!-- Input de Senha -->
		<div class="flex items-center border-b-2 border-[#12325d] py-2">
			<span class="material-icons text-white pr-2">
			lock
			</span>
			<input class="appearance-none bg-transparent border-none w-full text-white text-xl placeholder-white focus:outline-none" 
			type="password" placeholder="Senha" name="password" required />
		</div>
	  </div>
      <div class="text-center">
        <button type="submit" class="w-full py-2 bg-white rounded-[32px] flex justify-center items-center">
		   <span class="text-[#00224f] text-2xl font-bold font-roboto">Login</span>
        </button>
      </div>

      @if ($errors->has('INVALID_USER'))
        <div class="mt-4 text-center text-red-500">
          Usuário ou Senha inválidos
        </div>
      @endif

      @if ($errors->has('LDAP_ERROR'))
        <div class="mt-4 text-center text-red-500">
          Impossível se conectar ao servidor
        </div>
      @endif
    </form>
  </div>
</body>

</html>