<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#8B4513] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#7A3E12] focus:bg-[#7A3E12] active:bg-[#6A3510] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
