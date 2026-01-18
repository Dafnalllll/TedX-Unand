{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\primary-button.blade.php --}}
<button
    {{ $attributes->merge([
        'type' => 'submit',
        'role' => 'button',
        'tabindex' => 0,
        'class' => 'switch-btn btn-fill-center inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:scale-105 transition-transform'
    ]) }}>
    <img src="{{ asset('img/x.webp') }}" alt="X Icon"
        style="width: 32px; height: 32px; margin-left: 0.7rem; display: inline-block; vertical-align: middle; position: relative; z-index: 2;" />
    <span class="ml-2">{{ $slot }}</span>
</button>
