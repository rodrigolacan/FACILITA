<form action="{{ route('criarHelpPost') }}" method="post">
    @csrf
    <input type="hidden" name="unidade" value="Help Desk - USR">
    <input type="hidden" name="tipo" value="Marketing-Cloud">

    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4">
            <label for="codigo-sas" class="block mb-2">Código SAS <span class="text-red-600">*</span></label>
            <input type="text" id="codigo-sas" name="codigo-sas" value="{{ old('codigo-sas') }}" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <label for="evento" class="block mb-2">Evento<span class="text-red-600">*</span></label>
            <input type="text" id="evento" name="evento" value="{{old('evento')}}" class="border rounded px-3 py-2 w-full">
        </div>

        <div class="mb-4">
            <span class="block mb-2">Tipo de Ação <span class="text-red-600">*</span>
                <br>
                <input type="checkbox" id="email" name="tipo-acao[]" value="Email" class="mr-2">
                <label for="email">Email</label>

                <input type="checkbox" id="jornada-clientes" name="tipo-acao[]" value="Jornada de Clientes" class="mr-2">
                <label for="jornada-clientes">Jornada de Clientes</label>

                <input type="checkbox" id="leadpages" name="tipo-acao[]" value="Leadpages" class="mr-2">
                <label for="leadpages">Leadpages</label>

                <input type="checkbox" id="SMS" name="tipo-acao[]" value="SMS" class="mr-2">
                <label for="SMS">SMS</label>
            </span>
        </div>


        <div class="mb-4" x-data="{ selectedPublic: '' }">
            <span class="block mb-2">Público Geral <span class="text-red-600">*</span></span>
            <input type="radio" id="pessoa-fisica" name="publico-geral" value="Pessoa Física" class="mr-2" x-model="selectedPublic">
            <label for="pessoa-fisica">PF</label>
            <br>
            <input type="radio" id="pessoa-juridica" name="publico-geral" value="Pessoa Jurídica" class="mr-2" x-model="selectedPublic">
            <label for="pessoa-juridica">PJ</label>
            <br>
            <input type="radio" id="todos" name="publico-geral" value="Todos" class="mr-2" x-model="selectedPublic">
            <label for="todos">Todos</label>
            <br>
        
            <!-- Exibir checkboxes baseado na seleção -->
            <div x-show="selectedPublic === 'Pessoa Física'">
                <label class="mt-4 text-black font-bold py-2 rounded">Público específico</label>
                <br>
                <input type="checkbox" id="educacao-empreendedora" name="publico-especifico-pf[]" value="Educação Empreendedora" class="mr-2">
                <label for="educacao-empreendedora">Educação Empreendedora</label>
                <br>
                <input type="checkbox" id="potencial-empreendedor" name="publico-especifico-pf[]" value="Potencial Empreendedor" class="mr-2">
                <label for="potencial-empreendedor">Potencial Empreendedor</label>
            </div>
        
            <div x-show="selectedPublic === 'Pessoa Jurídica'">
                <label class="mt-4 text-black font-bold py-2 rounded">Público específico</label>
                <br>
                <input type="checkbox" id="empresa-pequeno-porte" name="publico-especifico-pj[]" value="Empresa de Pequeno Porte" class="mr-2">
                <label for="empresa-pequeno-porte">EPP</label>
                <br>
                <input type="checkbox" id="microempresa" name="publico-especifico-pj[]" value="Microempresa" class="mr-2">
                <label for="microempresa">ME</label>
                <br>
                <input type="checkbox" id="micro-empreendedor-individual" name="publico-especifico-pj[]" value="Micro Empreendedor Individual" class="mr-2">
                <label for="micro-empreendedor-individual">MEI</label>
                <br>
                <input type="checkbox" id="produtor-rural" name="publico-especifico-pj[]" value="Produtor Rural" class="mr-2">
                <label for="produtor-rural">Produtor Rural</label>
                <br>
                <input type="checkbox" id="projeto-segmento" name="publico-especifico-pj[]" value="Projeto e Segmento" class="mr-2">
                <label for="projeto-segmento">Projeto e Segmento</label>
            </div>
    
            <div x-show="selectedPublic === 'Todos'">
                <label class="mt-4 text-black font-bold py-2 rounded">Público específico</label>
                <br>
                <input type="checkbox" id="empresa-pequeno-porte-todos" name="publico-especifico-todos[]" value="Empresa de Pequeno Porte" class="mr-2">
                <label for="empresa-pequeno-porte-todos">EPP</label>
                <br>
                <input type="checkbox" id="microempresa-todos" name="publico-especifico-todos[]" value="Microempresa" class="mr-2">
                <label for="microempresa-todos">ME</label>
                <br>
                <input type="checkbox" id="micro-empreendedor-individual-todos" name="publico-especifico-todos[]" value="Micro Empreendedor Individual" class="mr-2">
                <label for="micro-empreendedor-individual-todos">MEI</label>
                <br>
                <input type="checkbox" id="produtor-rural-todos" name="publico-especifico-todos[]" value="Produtor Rural" class="mr-2">
                <label for="produtor-rural-todos">Produtor Rural</label>
                <br>
                <input type="checkbox" id="projeto-segmento-todos" name="publico-especifico-todos[]" value="Projeto e Segmento" class="mr-2">
                <label for="projeto-segmento-todos">Projeto e Segmento</label>
                <br>
                <input type="checkbox" id="educacao-empreendedora-todos" name="publico-especifico-todos[]" value="Educação Empreendedora" class="mr-2">
                <label for="educacao-empreendedora-todos">Educação Empreendedora</label>
                <br>
                <input type="checkbox" id="potencial-empreendedor-todos" name="publico-especifico-todos[]" value="Potencial Empreendedor" class="mr-2">
                <label for="potencial-empreendedor-todos">Potencial Empreendedor</label>
                
            </div>
        </div>
         

        <div class="mb-4">
            <label for="objetivo" class="block mb-2">Objetivo <span class="text-red-600">*</span>
                <textarea name="objetivo" id="objetivo" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('objetivo') }}</textarea>
            </label>
        </div>
    </div>
    
    <div class="mb-4 w-1/2">
        <label for="divulgacao-link" class="block mb-2">Link para divulgação (opcional)</label>
        <input type="url" id="divulgacao-link" name="divulgacao-link" value="{{ old('divulgacao-link') }}" class="border rounded px-3 py-2 w-full">
    </div> 
    
    <div class="bg-gray-800 text-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4 text-center">Disparo do Marketing Cloud</h2>
    
        <div class="grid grid-cols-1 gap-4">
            <label for="quantidade-disparos-semana" class="block mb-2 font-semibold">Quantidade de Disparos por Semana <span class="text-red-600">*</span></label>
            <div class="flex flex-col">
                <span>
                    <input type="radio" id="1-vez" name="quantidade-disparos-semana" value="1 vez" class="mr-2">
                    <label for="1-vez">1 vez</label>
                </span>

                <span>
                    <input type="radio" id="2-vezes" name="quantidade-disparos-semana" value="2 vezes" class="mr-2">
                    <label for="2-vezes">2 vezes</label>
                </span>
    
                <span>
                    <input type="radio" id="3-vezes" name="quantidade-disparos-semana" value="3 vezes" class="mr-2">
                    <label for="3-vezes">3 vezes</label>
                </span>
            </div>

            <label for="dias-preferenciais" class="block mb-2 font-semibold">Dias Preferenciais <span class="text-red-600">*</span></label>
            <div class="flex flex-col">
                <span>
                    <input type="checkbox" id="domingo" name="dias[]" value="Domingo" class="mr-2">
                    <label for="domingo">DOM</label>
                </span>

                <span>
                    <input type="checkbox" id="segunda" name="dias[]" value="Segunda" class="mr-2">
                    <label for="segunda">SEG</label>
                </span>

                <span>
                    <input type="checkbox" id="terca" name="dias[]" value="Terça" class="mr-2">
                    <label for="terca">TER</label>
                </span>

                <span>
                    <input type="checkbox" id="quarta" name="dias[]" value="Quarta" class="mr-2" >
                    <label for="quarta">QUA</label>
                </span>

                <span>
                    <input type="checkbox" id="quinta" name="dias[]" value="Quinta" class="mr-2">
                    <label for="quinta">QUI</label>
                </span>

                <span>
                    <input type="checkbox" id="sexta" name="dias[]" value="Sexta" class="mr-2">
                    <label for="sexta">SEX</label>
                </span>

                <span>
                    <input type="checkbox" id="sabado" name="dias[]" value="Sábado" class="mr-2">
                    <label for="sabado">SAB</label>
                </span>    
            </div>
    

            <label for="turno-preferencial" class="block mb-2 font-semibold">Turno Preferencial <span class="text-red-600">*</span></label>
            <div class="flex flex-col">
                <span>
                    <input type="checkbox" id="manha" name="turno[]" value="Manhã" class="mr-2">
                    <label for="manha">Manhã</label>
                </span>

                <span>
                    <input type="checkbox" id="tarde" name="turno[]" value="Tarde" class="mr-2">
                    <label for="tarde">Tarde</label>
                </span>

                <span>
                    <input type="checkbox" id="noite" name="turno[]" value="Noite" class="mr-2">
                    <label for="noite">Noite</label>
                </span>
            </div>

    

            <label for="antecedencia-disparos" class="block mb-2 font-semibold">Antecedência para Início dos Disparos <span class="text-red-600">*</span></label>
            <div class="flex flex-wrap">
                <input type="radio" id="1-semana" name="antecedencia-disparos" value="1 semana" class="mr-2">
                <label for="1-semana">1 semana</label>
    
                <input type="radio" id="2-semanas" name="antecedencia-disparos" value="2 semanas" class="mr-2">
                <label for="2-semanas">2 semanas</label>
    
                <input type="radio" id="3-semanas" name="antecedencia-disparos" value="3 semanas" class="mr-2">
                <label for="3-semanas">3 semanas</label>
    
                <input type="radio" id="4-semanas" name="antecedencia-disparos" value="4 semanas" class="mr-2">
                <label for="4-semanas">4 semanas</label>
    
                <input type="radio" id="5-semanas" name="antecedencia-disparos" value="5 semanas" class="mr-2">
                <label for="5-semanas">5 semanas</label>
    
                <input type="radio" id="6-semanas" name="antecedencia-disparos" value="6 semanas" class="mr-2">
                <label for="6-semanas">6 semanas</label>
    
                <input type="radio" id="7-semanas" name="antecedencia-disparos" value="7 semanas" class="mr-2">
                <label for="7-semanas">7 semanas</label>
            </div>
        </div>
    </div>
    <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 block mx-auto">
        ENVIAR
    </button>
</form>