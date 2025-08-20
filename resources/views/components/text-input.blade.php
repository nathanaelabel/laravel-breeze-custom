@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm bg-white/50 backdrop-blur-sm transition-all duration-200 hover:bg-white/70 focus:bg-white']) }}>
