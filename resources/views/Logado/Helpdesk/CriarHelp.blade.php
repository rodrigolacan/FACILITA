@extends('Logado.template')

@section('criarHelp-head')

@endsection

@section('criarHelp-body')
<div class="container pt-8 mx-auto flex flex-wrap flex-col md:flex-row items-center">
    <!--Left Col-->
    <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
      <p class="uppercase tracking-loose w-full">Envie seus helps pelo Facilita</p>
      <h1 class="my-4 text-5xl font-bold leading-tight">
        Help Desk Já integrado com bitrix24
      </h1>
    </div>
  </div>
<div class="relative -mt-12 lg:-mt-24">
  <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
        <path
          d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
          opacity="0.100000001"
        ></path>
        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
      </g>
      <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path
          d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
        ></path>
      </g>
    </g>
  </svg>
</div>

    <div x-data="{ selectedUnit: '' }" class="w-full text-black h-screen bg-white p-4 overflow-y-scroll">
        <div class="mb-4">
        <!--ERROS ADVINDOS DA API NO ENDPOINT DE UNIDADES HELP DESK-->
            @if(array_key_exists('status', app('unidadeHelp')) && app('unidadeHelp')['status'] == false)
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6">
                    <strong class="font-bold">Ops!</strong> Estamos enfrentando problemas para enviar o Help.
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        <li>Não é possível enviar help, ERRO: {{app('unidadeHelp')['message']}}</li>
                    </ul>
                </div>
            @else
            <div class="h-1/2 bg-gray-100 flex p-20 items-center justify-center">
                <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-lg">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="unidade">UNIDADE</label>
                    <select x-model="selectedUnit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="unidade" required>
                        <option value="disable" selected>Selecione a unidade de destino</option>
                        @foreach (app('unidadeHelp') as $item)
                            @foreach ($item as $value)
                                <option value="{{$value['NAME']}}">{{preg_replace("/\Help Desk - \b/","",$value['NAME'])}}</option><!--preg_replace("/\Help Desk\b/","",$value['NAME'])-->
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>    
            @endif
        </div>
                <div x-show="selectedUnit !== '' && selectedUnit !== 'disable'" class="bg-gray-100 flex p-20 items-center justify-center">
                    <div class="bg-white p-8 rounded-lg shadow-2xl w-full">
                    <!--FORMULÁRIO UGP PESSOAL-->
                        <div x-show="selectedUnit === 'Help Desk - UGP Pessoal'">   
                            <x-Helpdesk.formulario-ugp-pessoal/>
                        </div>

                    <!--FORMULÁRIO UTIC-->
                        <div x-show="selectedUnit === 'Help Desk - UTIC'">
                            <x-Helpdesk.formulario-utic/>
                        </div>

                    <!--FORMULÁRIO USR-->
                        <div x-show="selectedUnit === 'Help Desk - USR'">
                            <x-Helpdesk.formulario-usr/>
                        </div>

                    <!--FORMULÁRIO UGP PSICÓLOGO-->
                        <div x-show="selectedUnit === 'Help Desk - UGP Psicólogo'">
                            <x-Helpdesk.formulario-ugp-psicologo/>
                        </div>

                    <!--FORMULÁRIO UGOC-->
                        <div x-show="selectedUnit === 'Help Desk - UGOC'">
                            <x-Helpdesk.formulario-ugoc/>
                        </div>

                    <!--FORMULÁRIO UAC-->
                        <div x-show="selectedUnit === 'Help Desk - UAC'">
                            <x-Helpdesk.formulario-uac/>
                        </div>  

                    <!--FORMULÁRIO OUVIDORIA-->
                        <div x-show="selectedUnit === 'Help Desk - OUVIDORIA'">
                            <x-Helpdesk.formulario-ouvidoria/>
                        </div>

                    <!--FORMULÁRIO GABINETE DIREX-->
                        <div x-show="selectedUnit === 'Help Desk - Gabinete DIREX'">
                            <x-Helpdesk.formulario-gabinete-direx/>
                        </div>

                    <!--FORMULÁRIO CONVÊNIOS/CONTRATOS--> 
                        <div x-show="selectedUnit === 'Help Desk - Convênios/Contratos'">
                            <x-Helpdesk.formulario-convenios-contratos/>
                        </div>  

                    <!--FORMULÁRIO UMC-->
                        <div x-show="selectedUnit === 'Help Desk - UMC'">
                            <x-Helpdesk.formulario-umc/>
                        </div>

                    <!--FORMULÁRIO UAS-->
                        <div x-show="selectedUnit === 'Help Desk - UAS'">
                            <x-Helpdesk.formulario-uas/>
                        </div>
                    </div>
                </div>
    </div>

</script>
<!-- Se houver erros de validação, exibe-os -->
@if ($errors->any())
    <div x-data="{ showErrorModal: true }" x-show="showErrorModal" id="error-modal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-50">
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6">
            <strong class="font-bold">Ops!</strong> Houve alguns problemas com sua entrada.
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button @click="showErrorModal = false" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110">
                OK
            </button>
        </div>
    </div>
@endif


@if (session('message'))
    <div x-data="{ showErrorModal: true }" x-show="showErrorModal" id="error-modal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-50">
        <div class="bg-blue-500 border border-black text-white px-6 py-4 rounded-lg mb-6">
            <strong class="font-bold">Seu help foi enviado com sucesso!</strong>
            <ul class="mt-3 list-disc list-inside text-sm text-white">
                {{session('message')}}
            </ul>
            <button @click="showErrorModal = false" class="bg-blue-600 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110">
                OK
            </button>
        </div>
    </div>
@endif
@endsection
