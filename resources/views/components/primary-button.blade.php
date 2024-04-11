<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-white uppercase tracking-widestfocus:ring-offset-2transition ease-in-out duration-150 btn-primary']) }}>
    {{ $slot }}
</button>
