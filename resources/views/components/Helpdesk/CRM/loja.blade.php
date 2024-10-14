<form action="{{ route('criarHelpPost') }}" method="post" x-data="{selectedChannel: '', selectedAction: ''}">
    @csrf
    <input type="hidden" name="unidade" value="Help Desk - USR">
    <input type="hidden" name="tipo" value="Loja">

    <div class="grid gap-4">
        <div class="mb-4">
            <label for="gestor-responsavel" class="block mb-2 font-bold">Gestor Responsável <span class="text-red-600">*</span></label>
            <select id="gestor-responsavel" name="gestor-responsavel" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option disabled selected>Selecione o Gestor Responsável</option>
                @foreach (app('userBitrixAll') as $user)
                    <option value="{{$user['NAME'].' '.$user['LAST_NAME']}}">{{$user['NAME'].' '.$user['LAST_NAME']}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <span  class="block mb-2 font-bold">Canal <span class="text-red-600">*</span>
            <br>
                <input type="radio" id="canal" name="canal" value="Loja" x-model="selectedChannel" class="mr-2">
                <label for="canal">Loja</label>
            </span>
        </div>

        <br>

        <div class="mb-4">
            <span  class="block mb-2 font-bold">Ação<span class="text-red-600">*</span>
            <br>
                <input type="radio" id="acao-publicar" name="acao" value="Publicar" x-model="selectedAction" class="mr-2">
                <label for="acao-publicar">Publicar</label>
                <br>
                <input type="radio" id="acao-alterar" name="acao" value="Alterar" x-model="selectedAction" class="mr-2">
                <label for="acao-alterar">Alterar</label>
            </span>
        </div>


        <!--Opções de canais-->
        <div x-show="selectedChannel != '' ">
            <div x-show="selectedChannel === 'Loja'">

                <div class="mb-4">
                    <label for="codsas-nome" class="block mb-2 font-bold">Código SAS + Nome do Evento<span class="text-red-600">*</span></label>
                    <input type="text" id="codsas-nome" name="codsas-nome" value="{{old('evento')}}" class="border rounded px-3 py-2 w-full">
                </div>
                <br>
                <div class="mb-4">
                    <span  class="block mb-2 font-bold">Tipo<span class="text-red-600">*</span>
                    <br>
                        <input type="radio" id="tipo-aberto" name="modo" value="Aberto" class="mr-2">
                        <label for="tipo-aberto">Aberto</label>

                        <input type="radio" id="tipo-fechado" name="modo" value="Fechado" class="mr-2">
                        <label for="tipo-fechado">Fechado</label>
                    </span>
                </div>
                <br>
                <div class="mb-4">
                    <span  class="block mb-2 font-bold">Investimento<span class="text-red-600">*</span>
                    <br>
                        <input type="radio" id="investimento-gratuito" name="investimento" value="Gratuito" class="mr-2">
                        <label for="investimento-gratuito">Gratuito</label>

                        <input type="radio" id="investimento-pago" name="investimento" value="Pago" class="mr-2">
                        <label for="investimento-pago">Pago</label>
                    </span>
                </div>
                <br>
                <div x-show="selectedAction != ''">
                    <div x-show="selectedAction === 'Publicar'">
                        <br>
                        <div class="mb-4">
                            <label for="loja-projeto" class="block mb-2 font-bold">Projeto <span class="text-red-600">*</span></label>
                            <select name="loja-projeto" id="loja-projeto" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" @change="preencherLoja()">
                                <option disabled selected>Selecione o Projeto</option>
                                @foreach (app('projetos') as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="mb-4">
                            <label for="loja-acao" class="block mb-2 font-bold">Ação <span class="text-red-600">*</span></label>
                            <select name="loja-acao" id="loja-acao" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="loja-unidade" class="block mb-2 font-bold">Unidade <span class="text-red-600">*</span></label>
                            <select name="loja-unidade" id="loja-unidade" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option disabled selected>Selecione a Unidade</option>
                                @foreach (app('departaments') as $departament)
                                    <option value="{{$departament['NAME']}}">{{$departament['NAME']}}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>

                    
                    <div x-show="selectedAction === 'Alterar'">
                        <label for="loja-alterar" class="block mb-2 font-bold">Demanda<span class="text-red-600">*</span></label>
                        <textarea name="loja-alterar" id="loja-alterar" cols="50" rows="10" >{{old('loja-alterar')}}</textarea>
                    </div>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="link-evento-loja" class="block mb-2 font-bold">Link do Evento na Loja<span class="text-red-600">*</span></label>
                    <input type="url" id="link-evento-loja" name="link-evento-loja" value="{{ old('link-evento-loja') }}" class="border rounded px-3 py-2 w-full">
                </div> 
            </div>
        </div>
    </div>
    

    <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 block mx-auto">
        ENVIAR
    </button>
</form>

<script>
    function preencherLoja() {
        const projeto = document.getElementById('loja-projeto').value;
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
            document.getElementById('loja-acao').innerHTML = '';

            if (data) {
                const stdOption = document.createElement('option');
                stdOption.text  = "Selecione uma Ação";
                stdOption.selected = true;
                stdOption.disabled = true;
                document.getElementById('loja-acao').appendChild(stdOption);

                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item;
                    option.text = item;

                    document.getElementById('loja-acao').appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }
</script>
