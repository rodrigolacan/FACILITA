@extends('Logado.template')
@section('encurtador-head')

    <head>
        <link rel="icon" type="image/png" href="{{ asset('/assets/Index/images/icons/favicon.ico') }}" />
    </head>
@endsection

@section('encurtador-body')
    <div class="container pt-20 p-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Encurtar Links ficou mais Fácil agora</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Encurte sem <br> limites!
            </h1>
        </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                    </path>
                </g>
            </g>
        </svg>
    </div>

    <div class="h-1/2 bg-gray-100 flex p-20 items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-4">Encurtador Sebrae</h2>
            <form action="{{ route('encurtar') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="origin_url" class="block text-gray-700 font-bold mb-1">INSIRA O LINK</label>
                    <input type="url" name="origin_url" id="origin_url"
                        class="w-full text-black bg-gray-200 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://exemplo.com" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="linkPermanente">

                        <input class="mr-2 leading-tight" type="checkbox" name="perma_link" id="linkPermanente">
                        <span class="align-middle">Link permanente</span>
                        <img data-interrogation-target="interrogation-target" class="inline-block w-6 h-6"
                            src="{{ asset('/assets/Index/icons/interrogation.svg') }}" alt="Interrogation icon">

                        <div id="interrogation-target" role="interrogation"
                            class="absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Por padrão os links ficam encurtados por 6 meses
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </label>

                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-105">Encurtar</button>
                </div>
            </form>
        </div>
    </div>
    <!--================================Lógica De Avisos==============================-->
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
        @if ($errors->has('LINK') and !$errors->has('CUTED'))
            <div
                class="relative flex flex-col w-96 bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg rounded-xl overflow-hidden border border-blue-400/20">
                <div class="p-6">
                    <div class="flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 text-blue-100">
                            <path fill-rule="evenodd"
                                d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                            </path>
                        </svg>
                    </div>

                    <h5 class="mb-4 text-xl font-bold text-center text-white">
                        LINK JÁ ENCURTADO!
                    </h5>

                    <div class="p-3 mb-5 bg-white/10 rounded-lg backdrop-blur-sm">
                        <a id="linkError" class="block text-blue-100 hover:text-white break-all text-center"
                            href="{{ $errors->first('LINK') }}">
                            {{ $errors->first('LINK') }}
                        </a>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-0">
                    <button onclick="copyLink()"
                        class="w-full py-2.5 px-4 flex items-center justify-center gap-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-50 active:scale-[0.98] transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                            <path
                                d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                        </svg>
                        COPIAR LINK
                    </button>
                </div>

                <!-- Botão de fechar opcional -->
                <button onclick="this.parentElement.remove()"
                    class="absolute top-3 right-3 p-1 text-blue-100/80 hover:text-white rounded-full hover:bg-white/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        @if ($errors->has('CUTED'))
            <div class="relative flex flex-col w-96 bg-white shadow-xl rounded-xl border border-gray-100 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-white opacity-80"></div>

                <div class="relative p-6">
                    <div class="flex justify-center mb-5">
                        <div class="p-3 bg-green-100/30 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8 text-green-600">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <h5 class="mb-4 text-xl font-semibold text-center text-gray-800">
                        Seu link foi encurtado com sucesso!
                    </h5>

                    <div class="p-3 mb-5 bg-gray-50 rounded-lg border border-gray-200/60">
                        <a id="linkError"
                            class="block text-green-600 hover:text-green-700 break-all text-center font-medium"
                            href="{{ $errors->first('LINK') }}">
                            {{ $errors->first('LINK') }}
                        </a>
                    </div>
                </div>

                <div class="relative px-6 pb-6 pt-0">
                    <button onclick="copyLink()"
                        class="w-full py-2.5 px-4 flex items-center justify-center gap-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 active:scale-[0.98] transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                            <path
                                d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                        </svg>
                        COPIAR LINK
                    </button>
                </div>

                <!-- Botão de fechar opcional -->
                <button onclick="this.parentElement.remove()"
                    class="absolute top-3 right-3 p-1 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <!--================================Lógica De Avisos==============================-->

    <!--========================================SCRIPT=======================================================-->
    <script>
        function copyLink() {
            var link = document.getElementById('linkError').getAttribute('href');
            var input = document.createElement('input');
            input.setAttribute('value', link);
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            alert('Link copiado: ' + link);
            location.reload();
        }

        var interrogacao = document.querySelector('[data-interrogation-target]');
        var target = document.getElementById('interrogation-target');

        interrogacao.addEventListener('mouseenter', function() {
            target.classList.remove('opacity-0');
            target.classList.add('opacity-100');
        });

        interrogacao.addEventListener('mouseleave', function() {
            target.classList.remove('opacity-100');
            target.classList.add('opacity-0');
        });
    </script>
    <!--========================================SCRIPT=======================================================-->
@endsection
