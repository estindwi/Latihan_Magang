<button {{ $attributes->merge([
    'class' => 'px-4 py-2 rounded text-white bg-green-700 hover:bg-green-600'
]) }}>
    {{ $slot }}
</button>
