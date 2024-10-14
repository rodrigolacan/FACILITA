<div class="bg-gray-200 p-5 rounded-md"> <!-- Adiciona fundo cinza -->
    <div x-data="{ selectedPattern: null }">

        <input type="radio" value="Padrão" name="tipo" id="padrao-uac" x-model="selectedPattern" class="mr-2" checked>
        <label for="padrao-uac" class="inline-block mb-2">Padrão</label><br>

        <input type="radio" value="Canais-Remotos" name="tipo" id="canais-remotos" x-model="selectedPattern" class="mr-2">
        <label for="canais-remotos" class="inline-block mb-2">Canais Remotos</label><br>
        <br>
        <br>
        <br>

        <!-- <textarea name="descricao" id="descricao" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8" placeholder="Digite aqui sua solicitação">{ old('descricao') }</textarea> -->
        <div x-show="selectedPattern != ''">
            <!--FORMULÁRIO EMPRETEC-->
            <div x-show="selectedPattern === 'Padrão'"> 
                <x-Helpdesk.CRM.padrao-uac/>
            </div>

            <!--FORMUALÁRIO EMPRETEC-->
            <div x-show="selectedPattern === 'Canais-Remotos'">
                <x-Helpdesk.CRM.canais-remotos/>
            </div>
        </div>

    </div>
</div>
