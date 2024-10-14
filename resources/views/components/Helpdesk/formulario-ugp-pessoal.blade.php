<form action="{{route('criarHelpPost')}}" method="post">
    @csrf
    <div class="bg-gray-200 p-5 rounded-md"> <!-- Adiciona fundo cinza -->
        <div x-data="{ selectedPattern: null }">
            <input type="hidden" name="unidade" value="Help Desk - UGP Pessoal">
            <input type="radio" value="padrao" name="tipo" id="padrao" x-model="selectedPattern" class="mr-2" checked>
            <label for="padrao" class="inline-block mb-2">Padrão</label><br>

            <textarea name="descricao" id="descricao" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8" placeholder="Digite aqui sua solicitação">{{ old('descricao') }}</textarea>
        </div>
    </div>

    <div class="flex justify-center"> 
        <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110">
            ENVIAR
        </button>
    </div>
</form>