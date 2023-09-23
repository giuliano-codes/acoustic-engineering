<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col gap-4 px-4">
            <p class="text-center font-bold text-white">ESCOLHA UM PRÉDIO PARA ENTRAR</p>
            @foreach($place['buildings'] as $building)
                <a class="rounded bg-white py-4 text-center" href="{{ route('building', ['id' => $building['id']]) }}">{{ $building['name'] }}</a>
            @endforeach
        </div>
    </div>
</x-guest-layout>