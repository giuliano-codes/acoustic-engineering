<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">DELETAR MEDIÇÃO</p>
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2">
                        <p class="font-semibold">Nome:</p>
                        <p>{{ $measurement['name'] }}</p>
                    </div>
                    <a class="font-bold text-center text-blue-500" href="{{ asset('storage/'.$measurement['path']) }}">Arquivo de áudio</a>
                </div>
                <div class="grid grid-cols-1">
                    <button class="bg-red-500 text-center text-white font-bold rounded" wire:click="delete">Confirmar Exclusão</button>
                </div>
                <p class="text-center font-bold">SALA RELACIONADA</p>
                <div class="bg-white rounded p-2 flex flex-col gap-4">
                    <p class="text-center font-semibold">{{ $measurement['room']['name'] }}</p>
                </div>
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.measurement.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>