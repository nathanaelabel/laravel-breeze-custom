<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-white border-2 border-gray-200 rounded-full font-semibold text-sm text-gray-700 tracking-wide shadow-sm hover:border-indigo-300 hover:shadow-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 active:scale-95 transition-all duration-200']) }}>
    {{ $slot }}
</button>
