@extends('Logado.template')
@section('encurtador-head')
<head>
    <link rel="icon" type="image/png" href="{{ asset('/assets/Index/images/icons/favicon.ico') }}"/>
</head>
@endsection

@section('encurtador-body')
<div class="container p-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
    <!--Left Col-->
    <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
        <p class="uppercase tracking-loose w-full">Encurtar Links ficou mais Fácil agora</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">
            Encurte sem <br> limites!
        </h1>
    </div>
</div>
<div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
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
                <input type="url" name="origin_url" id="origin_url" class="w-full text-black bg-gray-200 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://exemplo.com" required>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="linkPermanente">
  
                  <input class="mr-2 leading-tight" type="checkbox" name="perma_link" id="linkPermanente">
                  <span class="align-middle">Link permanente</span> 
                  <img data-interrogation-target="interrogation-target" class="inline-block w-6 h-6" src="{{asset('/assets/Index/icons/interrogation.svg')}}" alt="Interrogation icon">
                  
                  <div id="interrogation-target" role="interrogation" class="absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                      Por padrão os links ficam encurtados por 6 meses
                      <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
              </label>
              
          </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-transform duration-300 transform hover:scale-105">Encurtar</button>
            </div>
        </form>
    </div>
</div>
<!--================================Lógica De Avisos==============================-->
<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
    @if ($errors->has('LINK') and !$errors->has('CUTED'))
    <div class="relative flex flex-col mt-6 text-black bg-blue-500 shadow-md bg-clip-border rounded-xl w-96">
        <div class="p-6">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-12 h-12 mb-4 text-gray-900">
            <path fill-rule="evenodd"
              d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
              clip-rule="evenodd"></path>
            <path
              d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
            </path>
          </svg>
          <h5 class="block mb-2 font-sans text-xl antialiased font-bold leading-snug tracking-normal text-gray-900">
            LINK JÁ ENCURTADO!
          </h5>
          <a id="linkError" class="text-black hover:underline" href="{{$errors->first('LINK')}}">{{$errors->first('LINK')}}</a>
        </div>
        <div class="p-6 pt-0">
          <a href="#" class="inline-block">
            <button
              class="flex items-center gap-2 px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"
              type="button" onclick="copyLink()">
              COPIAR
            </button>
          </a>
        </div>
    </div> 
    @endif

    @if($errors->has('CUTED'))
    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
        <div class="p-6">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-12 h-12 mb-4 text-gray-900">
            <path fill-rule="evenodd"
              d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
              clip-rule="evenodd"></path>
            <path
              d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
            </path>
          </svg>
          <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
            Seu link foi encurtado com sucesso!
          </h5>
          <a id="linkError" class="text-black hover:underline" href="{{$errors->first('LINK')}}">{{$errors->first('LINK')}}</a>
        </div>
        <div class="p-6 pt-0">
          <a href="#" class="inline-block">
            <button
              class="flex items-center gap-2 px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"
              type="button" onclick="copyLink()">
              COPIAR
            </button>
          </a>
        </div>
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
