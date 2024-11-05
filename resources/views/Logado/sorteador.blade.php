@extends('Logado.template')

@section('sorteador-head')
    <title>Sorteador Sebrae</title>
@endsection

@section('sorteador-body')
 @if ($errors->any())
    <script>
        alert("Verifique se há números no corpo do texto, ou nomes suficientes")
    </script>
@endif
    <!--========================================================SORTEADOR DE NOMES======================================================================================-->
    <div class="container pt-20 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <p class="uppercase tracking-loose w-full">Sortear nomes ou número de forma segura</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Sorteios a partir do Facilita!
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
<div class="h-1/2 bg-gray-100 flex p-20 items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full" x-data="{ chooseSort: 'sortearNome' }">
            <div class="flex flex-wrap justify-center gap-6">
                <a class="relative" href="#">
                    <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-black"></span>
                    <span 
                        @click="chooseSort='sortearNome'" 
                        style="cursor: pointer" 
                        onmouseover="this.style.textDecoration='underline'" 
                        onmouseout="this.style.textDecoration='none'" 
                        :class="{'bg-black text-white': chooseSort === 'sortearNome', 'bg-white text-black': chooseSort !== 'sortearNome'}" 
                        class="fold-bold relative inline-block h-full w-full rounded border-2 border-black px-3 py-1 text-base font-bold transition duration-100 hover:bg-gray-900 hover:text-yellow-500">
                        Sortear Nomes
                    </span>
                </a>
                <a href="#" class="relative">
                    <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-gray-700"></span>
                    <span 
                        @click="chooseSort='sortearNumero'" 
                        style="cursor: pointer" 
                        onmouseover="this.style.textDecoration='underline'" 
                        onmouseout="this.style.textDecoration='none'" 
                        :class="{'bg-black text-white': chooseSort === 'sortearNumero', 'bg-white text-black': chooseSort !== 'sortearNumero'}" 
                        class="fold-bold relative inline-block h-full w-full rounded border-2 border-black px-3 py-1 text-base font-bold transition duration-100 hover:bg-gray-900 hover:text-yellow-500">
                        Sortear Números
                    </span>
                </a>
            </div>

                <div class="flex items-center h-full bg-gray-200 w-full">
                    <form action="{{ route('sorteadorPost') }}" method="POST" class="bg-white shadow-md rounded h-2/3 p-6 w-full" x-show="chooseSort === 'sortearNome'">
                        @csrf

                        <h2 class="font-bold text-3xl text-center mb-4">Sortear Nomes</h2>
                        <div class="mb-4 h-2/3">
                            <textarea class="text-black border-black resize-none w-full px-3 py-4 border rounded-md" cols="50" rows='10' name="sorteadorNomes" placeholder="Liste os nomes separados por linha"></textarea>
                        </div>

                        <button type="submit" id="encurtar" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110">
                            <span>Sortear</span>
                            <i id="arrow-right" class="fas fa-arrow-right"></i>
                        </button>

                        <input type="hidden" name="tipo" value="sortearNomes">
                    </form>
                </div>

            @if(session()->has('sortedName'))
            <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black z-50" transition-style="in:wipe:right" x-data="{ showModal: true }" x-show="showModal">
                <h1 class="text-white text-8xl p-2" transition-style="in:wipe:left">{{ session('sortedName') }}</h1>
                <div class="absolute top-0 right-0 m-4">
                    <h1 @click="showModal = false" class="text-white p-2 cursor-pointer" style="cursor: pointer;font-size:40px" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">CLIQUE PARA SAIR</h1>
                </div>
            </div>      
            @endif
                <!--==============================================================================================================================================-->

                <!--=================================================================SORTEADOR DE NÚMEROS=============================================================================-->
                <div class="flex items-center h-full bg-gray-200 w-full" x-show="chooseSort === 'sortearNumero'">
                    <form action="{{ route('sorteadorPost') }}" method="POST" class="bg-white shadow-md rounded h-2/3 p-6 w-full">
                        @csrf
                        <h2 class="font-bold text-3xl text-center mb-4">Sortear Números</h2>
                        <br>
                        <div class="mb-4 grid grid-cols-1 gap-4">
                            <div class="flex flex-col items-center w-full"> <!-- Container para o primeiro campo -->
                                <label for="numeroMinimo" class="mb-2">Início:</label>
                                <input type="number" name="numeroMinimo" placeholder="Início" class="border border-black bg-black text-white opacity-50 rounded-md py-1 px-2 w-24 text-center">
                            </div>
                            <div class="flex flex-col items-center"> <!-- Container para o segundo campo -->
                                <label for="numeroMaximo" class="mb-2">Final:</label>
                                <input type="number" name="numeroMaximo" placeholder="Final" class="border border-black bg-black text-white opacity-50 rounded-md py-1 px-2 w-24 text-center">
                            </div>
                        </div>
                
                        <button type="submit" id="encurtar" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-110 mx-auto block">
                            <span>Sortear</span>
                            <i id="arrow-right" class="fas fa-arrow-right"></i>
                        </button>
                        <input type="hidden" name="tipo" value="sortearNumeros">
                    </form>
                </div>

    </div>
</div>

@if(session()->has('sortedNumber'))
<div class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black z-50" transition-style="in:wipe:right" x-data="{ showModal: true }" x-show="showModal">
    <h1 class="text-white text-8xl p-2" transition-style="in:wipe:left">{{ session('sortedNumber') }}</h1>
    <div class="absolute top-0 right-0 m-4">
        <h1 @click="showModal = false" class="text-white p-2 cursor-pointer" style="cursor: pointer;font-size:40px" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">CLIQUE PARA SAIR</h1>
    </div>
</div>

@endif
@endsection
