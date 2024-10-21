<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>{{ env('APP_ENV') === 'production' ? 'Produção' : 'Homologação' }} - Facilita Login Sebrae</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/Template/main.css')
    @vite(['resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body class="bg-gradient-to-bl from-[#3B4AFF] to-[#9285F9] h-screen flex flex-col items-center justify-center">
    <!-- Imagem da Logo Sebrae (apenas em telas maiores) -->
    <div x-show="!isSmallScreen" class="w-full flex justify-center mt-2 mb-12">
        <img src="{{ asset('/assets/Index/images/sebrae.svg') }}" alt="Logo Sebrae" class="h-24">
    </div>

    <!-- Texto de Boas-vindas -->
    <div x-data="{ isSmallScreen: window.innerWidth < 1024 }"
        x-init="window.addEventListener('resize', () => isSmallScreen = window.innerWidth < 1024)"
        class="flex flex-col md:flex-row items-center justify-center w-full px-4 lg:px-[150px]">
        <div :class="{'hidden': isSmallScreen}" x-show="!isSmallScreen"
            class="w-full md:w-1/2 flex flex-col justify-center">
            <!-- Título Facilita -->
            <h1
                class="{{ env('APP_ENV') === 'production' ? 'text-white' : (env('APP_ENV') === 'homolog' ? 'text-[#FFA726]' : 'text-white') }} font-fugaz text-[40px] sm:text-[60px] md:text-[80px]">
                Facilita
            </h1>
            <!-- Parágrafo de introdução -->
            <p
                class="text-white font-['Poppins'] font-semibold text-[24px] sm:text-[30px] md:text-[50px] leading-tight mt-4">
                Bem-vindo ao Facilita! Sua intranet inteligente para otimizar tarefas e conectar ideias.
            </p>
            <!-- Subtexto -->
            <p class="text-white font-poppins text-[16px] sm:text-[18px] md:text-[24px] opacity-40 mt-4">
                Faça login e comece a explorar!
            </p>
        </div>

        <!-- Formulário de Login -->
        <div class="w-full md:w-1/3 flex justify-center">
            <div class="rounded-lg p-8 max-w-md w-full">
                <!-- Aumentado para max-w-md para melhor adequação -->
                <form method="POST" action="{{ route('welcome') }}" class="space-y-4">
                    @csrf
                    <div class="w-full space-y-4">
                        <!-- Input de Nome de Usuário -->
                        <div class="flex items-center border-b-2 border-[#3B4AFF] py-2">
                            <span class="material-icons text-white pr-2">
                                person
                            </span>
                            <input
                                class="appearance-none bg-transparent border-none w-full text-white text-xl placeholder-white focus:outline-none"
                                type="text" placeholder="Nome de Usuário" name="username" required />
                        </div>

                        <!-- Input de Senha -->
                        <div class="flex items-center border-b-2 border-[#3B4AFF] py-2">
                            <span class="material-icons text-white pr-2">
                                lock
                            </span>
                            <input
                                class="appearance-none bg-transparent border-none w-full text-white text-xl placeholder-white focus:outline-none"
                                type="password" placeholder="Senha" name="password" required />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="w-full py-2 bg-white rounded-[32px] flex justify-center items-center">
                            <span class="text-[#00224f] text-2xl font-bold font-poppins">Login</span>
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
        </div>
    </div>
</body>

</html>