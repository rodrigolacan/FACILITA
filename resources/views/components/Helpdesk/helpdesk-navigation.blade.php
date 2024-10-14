    <div class="flex">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('criarHelp') }}" aria-current="{{ request()->routeIs('criarHelp') ? 'page' : '' }}" class="inline-block p-2 text-lg {{ request()->routeIs('criarHelp') ? 'text-white bg-gray-800' : 'text-black bg-white dark:hover:bg-gray-800 dark:hover:text-gray-300' }} rounded-t-lg">Novo Help</a>
            </li>
        </ul>
    </div>