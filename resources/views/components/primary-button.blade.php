<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#0F2854] to-[#1C4D8D] border border-transparent rounded-full font-semibold text-sm text-white tracking-wide hover:shadow-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#1C4D8D] focus:ring-offset-2 active:scale-95 transition-all duration-200']) }}>
    {{ $slot }}
</button>
