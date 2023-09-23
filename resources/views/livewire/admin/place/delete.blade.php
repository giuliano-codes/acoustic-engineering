<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">DELETAR LUGAR</p>
                <div class="flex gap-2">
                    <p class="font-semibold">Nome:</p>
                    <p>{{ $place['name'] }}</p>
                </div>
                <div class="grid grid-cols-1">
                    <button class="bg-red-500 text-center text-white font-bold rounded" wire:click="delete">Confirmar Exclusão</button>
                </div>
                <p class="text-center font-bold">CONSTRUÇÕES RELACIONADAS</p>
                @foreach($place['buildings'] as $building)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $building['name'] }}</p>
                    </div>
                @endforeach
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.place.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>