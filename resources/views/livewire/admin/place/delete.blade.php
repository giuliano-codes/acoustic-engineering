<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">EXCLUSÃO</p>
                <div class="flex gap-2">
                    <p class="font-semibold">Nome:</p>
                    <p>{{ $place['name'] }}</p>
                </div>
                <div class="grid grid-cols-1">
                    <button class="bg-red-500 text-center text-white font-bold rounded" wire:click="delete">Confirmar Excluir</button>
                </div>
                <p class="text-center font-bold">CONSTRUÇÕES RELACIONADAS</p>
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.place.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>