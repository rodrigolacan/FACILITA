<form action="{{route('criarHelpPost')}}" method="post">
    @csrf
    <div class="bg-gray-200 p-5 rounded-md"> <!-- Adiciona fundo cinza -->
        <div x-data="{ selectedPattern: null }">
            <input type="hidden" name="unidade" value="Help Desk - UTIC">
            
            <input type="radio" value="Padrão" name="tipo" id="utic-padrao" x-model="selectedPattern" class="mr-2" checked>
            <label for="utic-padrao" class="inline-block mb-2">Padrão</label><br>

            <input type="radio" value="gestaoUsuario" name="tipo" id="utic-gestaoUsuario" x-model="selectedPattern" class="mr-2">
            <label for="utic-gestaoUsuario" class="inline-block mb-2">Gestão de Usuário</label><br>

            <textarea name="descricao" id="descricao" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8" placeholder="Digite aqui sua solicitação">{{ old('descricao') }}</textarea>

            <div x-show="selectedPattern === 'gestaoUsuario'" class="grid grid-cols-2 gap-4"> <!-- Divide em duas colunas -->

                <div class="mb-4" x-data="{cpf : ''}">
                    <label for="cpf" class="block mb-2">CPF <span class="text-red-600">*</span></label>
                    <input type="text" id="cpf" name="cpf" value="{{old('cpf')}}" x-model="cpf" x-on:blur="preencherUtic()" placeholder="Digite o CPF para buscar automaticamente" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4 col-span-2">
                    <label for="nome_completo" class="block mb-2">Nome Completo <span class="text-red-600">*</span></label>
                    <input type="text" id="nome_completo" name="nome_completo" value="{{old('nome_completo')}}" placeholder="Sem abreviações" class="w-full border rounded px-3 py-2">
                </div>
        

                <div class="mb-4">
                    <label for="data_nascimento" class="block mb-2">Data de Nascimento <span class="text-red-600">*</span></label>
                    <input type="text" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento')}}" placeholder="DD/MM/AAAA" class="w-full border rounded px-3 py-2">
                </div>                    
                
                <div class="mb-4">
                    <label for="celular" class="block mb-2">Celular <span class="text-red-600">*</span></label>
                    <input type="tell" id="celular" name="celular" value="{{old('celular')}}" placeholder="(DDD) 99123-4567" class="w-full border rounded px-3 py-2">
                </div>
                <br>
                
                <div class="mb-4 col-span-2">
                    <label class="block mb-2">Coligada <span class="text-red-600">*</span></label>
                    <div>
                        <input type="radio" id="sede" name="coligada" value="Sede" class="mr-2">
                        <label for="sede" class="mr-4">Sede</label>
                        <br>
                        <input type="radio" id="airton_dias" name="coligada" value="Airton Dias" class="mr-2">
                        <label for="airton_dias" class="mr-4">Airton Dias</label>
                        <br>
                        <input type="radio" id="atendimento_rorainopolis" name="coligada" value="Atendimento Rorainópolis" class="mr-2">
                        <label for="atendimento_rorainopolis" class="mr-4">Atendimento Rorainópolis</label>
                        <br>
                        <input type="radio" id="ville_roy" name="coligada" value="Ville Roy" class="mr-2">
                        <label for="ville_roy">Ville Roy</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Sexo <span class="text-red-600">*</span></label>
                    <div>
                        <input type="radio" id="masculino" name="sexo" value="Masculino" class="mr-2">
                        <label for="masculino" class="mr-4">Masculino</label>
                        <br>
                        <input type="radio" id="feminino" name="sexo" value="Feminino" class="mr-2">
                        <label for="feminino">Feminino</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center"> 
        <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110">
            ENVIAR
        </button>
    </div>
</form>

<script>
    function preencherUtic() {
        const cpfInput = document.getElementById('cpf');
        const cpf = cpfInput.value;
        fetch(`/preencherUtic/${cpf}`, {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao preencher os dados da UTIC.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados da UTIC preenchidos:', data);
            // Atualiza os valores dos inputs com os dados recebidos
            if(data.NOME_COMPLETO) {
                document.getElementById('nome_completo').value = data.NOME_COMPLETO;
            }
            if(data.DATA_NASCIMENTO) {
                // Converte a data para o formato MM/DD/AAAA
                const parts = data.DATA_NASCIMENTO.split('T')[0].split('-');
                const formattedDate = `${parts[1]}/${parts[2]}/${parts[0]}`;
                document.getElementById('data_nascimento').value = formattedDate;
            }if(data.GENERO) {
                switch(data.GENERO){
                    case 1:
                        document.getElementById('masculino').checked = true;
                        break;
                    case 2:
                        document.getElementById('feminino').checked = true;
                        break;
                }
            }if(data.CELULAR){
                const celularFormatado = data.CELULAR.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                document.getElementById('celular').value = celularFormatado;
            }

        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }
</script>                
