<form action="{{ route('criarHelpPost') }}" method="post">
    @csrf
    <input type="hidden" name="unidade" value="Help Desk - USR">
    <input type="hidden" name="tipo" value="Empretec/SGF">

    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4">
            <label for="responsavel" class="block mb-2">Responsável pela contratação <span class="text-red-600">*</span></label>
            <input type="text" id="responsavel" name="responsavel" value="{{ old('responsavel') }}" placeholder="Sem abreviações" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <span  class="block mb-2">Forma de prestação de serviços <span class="text-red-600">*</span>
            <br>
                <input type="radio" id="servico" name="servico" value="presencial" class="mr-2">
                <label for="servico">Presencial</label>

                <input type="radio" id="distancia" name="servico" value="distancia" class="mr-2">
                <label for="distancia">À distância</label>

                <input type="radio" id="hibrida" name="servico" value="hibrida" class="mr-2">
                <label for="hibrida">Híbrida</label>
            </span>
        </div>

        <div class="mb-4">
            <label for="valor-total" class="block mb-2">Valor Total Estimado<span class="text-red-600">*</span></label>
            <input type="text" id="valor-total" name="valor-total" value="{{old('valor-total')}}" @input="moneyEmpretec" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <label for="data_inicio" class="block mb-2">Previsão de Início<span class="text-red-600">*</span></label>
            <input type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" class="border rounded px-3 py-2 w-full">
        </div>                    
    
        <div class="mb-4">
            <label for="objeto" class="block mb-2">Objeto <span class="text-red-600">*</span></label>
            <textarea name="objeto" id="objeto" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('objeto') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="justificativa" class="block mb-2">Justificativa <span class="text-red-600">*</span></label>
            <textarea name="justificativa" id="justificativa" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('justificativa') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="publico-alvo" class="block mb-2">Público Alvo<span class="text-red-600">*</span></label>
            <input type="text" id="publico-alvo" name="publico-alvo" value="{{ old('publico-alvo') }}" class="border rounded px-3 py-2 w-full">
        </div> 

        <div class="mb-4">
            <label for="pessoas-atendidas" class="block mb-2">Número de Pessoas Atendidas<span class="text-red-600">*</span></label>
            <input type="text" id="pessoas-atendidas" name="pessoas-atendidas" value="{{ old('pessoas-atendidas') }}" class="border rounded px-3 py-2 w-full">
        </div>
        
        <div class="mb-4">
            <label for="local-servico" class="block mb-2">Local da prestação de serviços<span class="text-red-600">*</span></label>
            <input type="text" id="local-servico" name="local-servico" value="{{ old('local-servico') }}" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <label for="produto-servico" class="block mb-2">Produto/Serviço<span class="text-red-600">*</span></label>
            <input type="text" id="produto-servico" name="produto-servico" value="{{ old('produto-servico') }}" class="border rounded px-3 py-2 w-full">
        </div>
        
        <div class="mb-4">
            <label for="sugestao" class="block mb-2">Sugestão de área e subárea <span class="text-red-600">*</span></label>
            <textarea name="sugestao" id="sugestao" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('sugestao') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="detalhamento-entrega" class="block mb-2">Detalhamento das entregas por mês cronologicamente <span class="text-red-600">*</span></label>
            <textarea name="detalhamento-entrega" id="detalhamento-entrega" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('detalhamento-entrega') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="projeto" class="block mb-2">Projeto <span class="text-red-600">*</span></label>
            <select name="projeto" id="projeto" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione o Projeto</option>
                @foreach (app('projetos') as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="acao" class="block mb-2">Ação <span class="text-red-600">*</span></label>
            <select name="acao" id="acao" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
            </select>
        </div>
    </div>
    <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 block mx-auto">
        ENVIAR
    </button>

</form>

<script>
    function preencher() {
        const projeto = document.getElementById('projeto').value;
        fetch(`/capturarAcao/${projeto}`, {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao buscar projeto e ação');
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados:', data);
            document.getElementById('acao').innerHTML = '';

            if (data) {
                const stdOption = document.createElement('option');
                stdOption.text  = "Selecione uma Ação";
                stdOption.selected = true;
                stdOption.disabled = true;
                document.getElementById('acao').appendChild(stdOption);

                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item;
                    option.text = item;

                    document.getElementById('acao').appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }

//Adiciona máscara de BRL ao campos valor-total
    function moneyEmpretec(){
        let valorInput = document.getElementById('valor-total');
        let valor = parseFloat(valorInput.value.replace(/\D/g, ''));

        const BRL = new Intl.NumberFormat('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }).format(valor / 100);
        console.log(BRL);
        valorInput.value = BRL;
    }
</script>
