    <div class="bg-gray-200 p-5 rounded-md"> <!-- Adiciona fundo cinza -->
        <div x-data="{ selectedPattern: null }">

            <input type="radio" value="Empretec/SGF" name="tipo" id="empretec/SGF" x-model="selectedPattern" class="mr-2" checked>
            <label for="empretec/SGF" class="inline-block mb-2">Empretec/SGF</label><br>

            <input type="radio" value="Marketing-Cloud" name="tipo" id="markenting-cloud" x-model="selectedPattern" class="mr-2">
            <label for="markenting-cloud" class="inline-block mb-2">Marketing Cloud</label><br>

            <input type="radio" value="Loja" name="tipo" id="loja" x-model="selectedPattern" class="mr-2">
            <label for="loja" class="inline-block mb-2">Loja</label><br>

            <input type="radio" value="Produtos Instantâneos" name="tipo" id="produtos-instantaneos" x-model="selectedPattern" class="mr-2">
            <label for="produtos-instantaneos" class="inline-block mb-2">Produtos Instantâneos</label><br>

            <input type="radio" value="Padrão" name="tipo" id="padrao-usr" x-model="selectedPattern" class="mr-2">
            <label for="padrao-usr" class="inline-block mb-2">Padrão</label><br>
            <br>
            <br>
            <br>

            <!-- <textarea name="descricao" id="descricao" class="border border-gray-300 rounded-md mt-2 px-3 py-2 w-full" rows="5" columns="8" placeholder="Digite aqui sua solicitação">{ old('descricao') }</textarea> -->
            <div x-show="selectedPattern != ''">
                <!--FORMULÁRIO EMPRETEC-->
                <div x-show="selectedPattern === 'Empretec/SGF'"> 
                    <x-Helpdesk.CRM.empretec/>
                </div>

                <!--FORMUALÁRIO MARKETING-CLOUD-->
                <div x-show="selectedPattern === 'Marketing-Cloud'">
                    <x-Helpdesk.CRM.marketing-cloud/>
                </div>

                <!--FORMUALÁRIO LOJA-->
                <div x-show="selectedPattern === 'Loja'">
                    <x-Helpdesk.CRM.loja/>
                </div>

                <!--FORMUALÁRIO LOJA-->
                <div x-show="selectedPattern === 'Produtos Instantâneos'">
                    <x-Helpdesk.CRM.produtos-instantaneos/>
                </div>
                
                <!--FORMUALÁRIO PADRÃO-->
                <div x-show="selectedPattern === 'Padrão'">
                    <x-Helpdesk.CRM.padrao/>
                </div>
            </div>

        </div>
    </div>
