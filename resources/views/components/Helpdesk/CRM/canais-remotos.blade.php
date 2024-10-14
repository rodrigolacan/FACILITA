<form action="{{ route('criarHelpPost') }}" method="post" x-data="checkboxManager()">
    @csrf
    <input type="hidden" name="unidade" value="Help Desk - UAC">
    <input type="hidden" name="tipo" value="Canais Remotos">

    <div class="mb-4">

        <div class="mb-4">
            <label for="projeto-uac" class="block mb-2">Projeto <span class="text-red-600">*</span></label>
            <select name="projeto-uac" id="projeto-uac" class="block appearance-none w-full border bg-white text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required @change="preencher()">
                <option disabled selected>Selecione o Projeto</option>
                @foreach (app('projetos') as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold">Público Alvo <span class="text-red-600">*</span></label>
                <span>
                    <input type="checkbox" id="micro-empreendedor-individual-uac" name="publico-alvo-uac[]" value="Micro Empreendedor Individual" x-model="checkboxes.publicTarget['Micro Empreendedor Individual']" class="mr-2">
                    <label for="micro-empreendedor-individual-uac">MEI</label>
                </span>
                <span>
                    <input type="checkbox" id="microempresa-uac" name="publico-alvo-uac[]" value="Microempresa" x-model="checkboxes.publicTarget['Microempresa']" class="mr-2">
                    <label for="microempresa-uac">ME</label>
                </span>

                <span>
                    <input type="checkbox" id="empresa-pequeno-porte-uac" name="publico-alvo-uac[]" value="Empresa Pequeno Porte"  x-model="checkboxes.publicTarget['Empresa Pequeno Porte']" class="mr-2">
                    <label for="empresa-pequeno-porte-uac">EPP</label>
                </span>

                <span>
                    <input type="checkbox" id="produtor-rural-uac" name="publico-alvo-uac[]" value="Produtor Rural" x-model="checkboxes.publicTarget['Produto Rural']" class="mr-2">
                    <label for="produtor-rural-uac">Produtor Rural</label>
                </span>

                <span>
                    <input type="checkbox" id="candidato-uac" name="publico-alvo-uac[]" value="Candidato a empresário" x-model="checkboxes.publicTarget['Candidato a empresário']" class="mr-2">
                    <label for="candidato-uac">Candidato a empresário</label>
                </span>

                <span>
                    <input type="checkbox" id="publico-especifico-uac" name="publico-alvo-uac[]" value="Público Específico do Projeto" x-model="checkboxes.publicTarget['Público Específico do Projeto']" class="mr-2">
                    <label for="publico-especifico-uac">Público Específico do Projeto</label>
                </span>
                <br>
                <br>
                <button type='button' @click="toggleAll('publicTarget')" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded-full">
                    Marcar/Desmarcar
                </button>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold">Tipo de Ação <span class="text-red-600">*</span></label>
                <span>
                    <input type="checkbox" id="SMS-uac" name="tipo-acao[]" value="SMS" x-model="checkboxes.typeAction['SMS']" class="mr-2">
                    <label for="SMS-uac">SMS</label>
                </span>
                <span>
                    <input type="checkbox" id="E-mail-uac" name="tipo-acao[]" value="E-mail" x-model="checkboxes.typeAction['E-mail']" class="mr-2">
                    <label for="E-mail-uac">E-mail</label>
                </span>

                <span>
                    <input type="checkbox" id="ligacao-uac" name="tipo-acao[]" value="Ligação" x-model="checkboxes.typeAction['Ligação']" class="mr-2">
                    <label for="ligacao-uac">Ligação</label>
                </span>

                <span>
                    <input type="checkbox" id="portal-uac" name="tipo-acao[]" value="Portal" x-model="checkboxes.typeAction['Portal']" class="mr-2">
                    <label for="portal-uac">Portal</label>
                </span>

                <span>
                    <input type="checkbox" id="loja-uac" name="tipo-acao[]" value="Loja" x-model="checkboxes.typeAction['Loja']" class="mr-2">
                    <label for="loja-uac">Loja</label>
                </span>
                <br>
                <br>
                <button type="button" @click="toggleAll('typeAction')" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded-full">
                    Marcar/Desmarcar
                </button>
        </div>

        <div class="mb-4">
            <label for="canais-remotos" class="block mb-2">Detalhe sua demanda <span class="text-red-600">*</span></label>
            <textarea name="descricao" id="canai-remotos" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8">{{ old('descricao') }}</textarea>
        </div>

        <button type="submit" name="enviar-help" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 block mx-auto">
            ENVIAR
        </button>
    </div>
</form>

<script>
    function checkboxManager() {
        return {
            checkboxes: {
                publicTarget: {
                    'Micro Empreendedor Individual': false,
                    'Microempresa': false,
                    'Empresa Pequeno Porte': false,
                    'Produtor Rural': false,
                    'Candidato a empresário': false,
                    'Público Específico do Projeto': false
                },
                typeAction: {
                    'SMS': false,
                    'E-mail': false,
                    'Ligação': false,
                    'Portal': false,
                    'Loja': false
                }
            },
            toggleAll(group) {
                const allChecked = Object.values(this.checkboxes[group]).every(value => value);
                Object.keys(this.checkboxes[group]).forEach(key => {
                    this.checkboxes[group][key] = !allChecked;
                });
            }
        }
    }
</script>