<form action="{{ route('criarHelpPost') }}" method="post">
    @csrf
    <input type="hidden" name="unidade" value="Help Desk - USR">
    <input type="hidden" name="tipo" value="Produtos Instantâneos">

    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4">
            <label for="instrumento" class="block mb-2">Instrumento <span class="text-red-600">*</span></label>
            <select name="instrumento" id="instrumento" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione o Instrumento</option>
                <option value="CLINÍCA TECNOLÓGICA">CLINÍCA TECNOLÓGICA</option>
                <option value="CLINÍCA TECNOLÓGICA À DISTÂNCIA">CLINÍCA TECNOLÓGICA À DISTÂNCIA</option>
                <option value="CONSULTORIA PRESENCIAL">CONSULTORIA PRESENCIAL</option>
                <option value="CONSULTORIA À DISTÂNCIA">CONSULTORIA À DISTÂNCIA</option>
                <option value="CURSO AUTOINSTRUCIONAL">CURSO AUTOINSTRUCIONAL</option>
                <option value="CURSOS PRESENCIAIS">CURSOS PRESENCIAIS</option>
                <option value="CURSOS À DISTÂNCIA">CURSOS À DISTÂNCIA</option>
                <option value="FEIRA">FEIRA</option>
                <option value="FEIRA À DISTÂNCIA">FEIRA À DISTÂNCIA</option>
                <option value="FERRAMENTA">FERRAMENTA</option>
                <option value="GARANTIA FAMPE">GARANTIA FAMPE</option>
                <option value="MISSÃO/ CARAVANA">MISSÃO/ CARAVANA</option>
                <option value="OFICINA">OFICINA</option>
                <option value="OFICINA À DISTÂNCIA">OFICINA À DISTÂNCIA</option>
                <option value="PALESTRA">PALESTRA</option>
                <option value="PALESTRA À DISTÂNCIA">PALESTRA À DISTÂNCIA</option>
                <option value="RODADA DE NEGÓCIOS">RODADA DE NEGÓCIOS</option>
                <option value="RODADA DE NEGÓCIOS À DISTÂNCIA">RODADA DE NEGÓCIOS À DISTÂNCIA</option>
                <option value="SEMINÁRIO">SEMINÁRIO</option>
                <option value="SEMINÁRIO À DISTÂNCIA">SEMINÁRIO À DISTÂNCIA</option>
                <option value="VITRINE">VITRINE</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="modalidade" class="block mb-2">Modalidade <span class="text-red-600">*</span></label>
            <select name="modalidade" id="modalidade" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione a Modalidade</option>
                <option value="Presencial">Presencial</option>
                <option value="Remoto">Remoto</option>
                <option value="Presencial e Remoto">Presencial e Remoto</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="argumento" class="block mb-2">Argumento de vendas <span class="text-red-600">*</span></label>
            <textarea name="argumento" id="argumento" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('argumento') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="conteudo-progamatico" class="block mb-2">Conteúdo Progamático <span class="text-red-600">*</span></label>
            <textarea name="conteudo-progamatico" id="conteudo-progamatico" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('conteudo-progamatico') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="tema" class="block mb-2">Tema <span class="text-red-600">*</span></label>
            <select name="tema" id="tema" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione o Tema</option>
                <option value="COOPERAÇÃO">COOPERAÇÃO</option>
                <option value="EMPREENDEDORISMO">EMPREENDEDORISMO</option>
                <option value="FINANÇAS">FINANÇAS</option>
                <option value="INOVAÇÃO">INOVAÇÃO</option>
                <option value="LEIS">LEIS</option>
                <option value="MERCADO E VENDAS">MERCADO E VENDAS</option>
                <option value="ORGANIZAÇÃO">ORGANIZAÇÃO</option>
                <option value="PARA APLICAÇÃO EM SALA DE AULA">PARA APLICAÇÃO EM SALA DE AULA</option>
                <option value="PARA FORMAÇÃO DO EDUCADOR">PARA FORMAÇÃO DO EDUCADOR</option>
                <option value="PARA FORMAÇÃO DO ESTUDANTE">PARA FORMAÇÃO DO ESTUDANTE</option>
                <option value="PARA GESTÃO DA ESCOLA">PARA GESTÃO DA ESCOLA</option>
                <option value="PESSOAS">PESSOAS</option>
                <option value="PLANEJAMENTO">PLANEJAMENTO</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="publico" class="block mb-2">Público <span class="text-red-600">*</span></label>
            <select name="publico" id="publico" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione o Público</option>
                <option value="ARTESÃO">ARTESÃO</option>
                <option value="EMPRESA DE PEQUENO PORTE">EMPRESA DE PEQUENO PORTE</option>
                <option value="MICROEMPRESA">MICROEMPRESA</option>
                <option value="MICROEMPREENDEDOR INDIVIDUAL">MICROEMPREENDEDOR INDIVIDUAL</option>
                <option value="PRODUTOR RURAL">PRODUTOR RURAL</option>
                <option value="PESSOA FÍSICA">PESSOA FÍSICA</option>
                <option value="PROFESSOR">PROFESSOR</option>
                <option value="ESTUDANTE- ENSINO FUNDAMENTAL">ESTUDANTE- ENSINO FUNDAMENTAL</option>
                <option value="ESTUDANTE- ENSINO MÉDIO">ESTUDANTE- ENSINO MÉDIO</option>
                <option value="ESTUDANTE- NÍVEL SUPERIOR">ESTUDANTE- NÍVEL SUPERIOR</option>
                <option value="GESTOR EDUCACIONAL">GESTOR EDUCACIONAL</option>
                <option value="INSTITUIÇÃO DE ADMINISTRAÇÃO PÚBLICA">INSTITUIÇÃO DE ADMINISTRAÇÃO PÚBLICA</option>
                <option value="INSTITUIÇÃO SEM FINS LUCRATIVOS">INSTITUIÇÃO SEM FINS LUCRATIVOS</option>
                <option value="MÉDIA E GRANDE EMPRESA">MÉDIA E GRANDE EMPRESA</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label for="subtema" class="block mb-2">Subtema <span class="text-red-600">*</span></label>
            <textarea name="subtema" id="subtema" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('subtema') }}</textarea>
        </div>

        <div class="mb-4">
            <span  class="block mb-2">Emite Certificado <span class="text-red-600">*</span>
            <br>
                <input type="radio" id="emite-sim" name="emite-certificado" value="Sim" class="mr-2">
                <label for="emite-sim">Sim</label>
                <br>
                <input type="radio" id="emite-nao" name="emite-certificado" value="Não" class="mr-2">
                <label for="emite-nao">Não</label>
            </span>

            <span  class="block mb-2" x-data="{ Pay: null }">Pago<span class="text-red-600">*</span>
            <br>
                <input type="radio" id="pago-sim" name="pago" value="Sim" x-model="Pay" class="mr-2">
                <label for="pago-sim">Sim</label>
                <br>
                <input type="radio" id="pago-nao" name="pago" value="Não" x-model="Pay" class="mr-2">
                <label for="pago-nao">Não</label>

                <div x-show="Pay != ''">
                        <div x-show="Pay === 'Sim'">
                            <label for="valor-pago" class="block mb-2">Valor Total Estimado<span class="text-red-600">*</span></label>
                            <input type="text" id="valor-pago" name="valor-pago" value="{{old('valor-pago')}}" @input="money" class="border rounded px-3 py-2 w-full">
                        </div>
                </div>
            </span>
        </div>
    </div>
    

    <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 block mx-auto">
        ENVIAR
    </button>
</form>

<script>
    //Adiciona máscara de BRL ao campos valor-total
    function money(){
        let valorInput = document.getElementById('valor-pago');
        let valor = parseFloat(valorInput.value.replace(/\D/g, ''));

        const BRL = new Intl.NumberFormat('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }).format(valor / 100);

        valorInput.value = BRL;
    }
</script>