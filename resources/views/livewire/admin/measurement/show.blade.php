<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">VISUALIZAÇÃO DA MEDIÇÃO</p>
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2">
                        <p class="font-semibold">Nome:</p>
                        <p>{{ $measurement['name'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Taxa de amostragem:</p>
                        <p>{{ $measurement['samplerate'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Duração em milisegundos:</p>
                        <p>{{ $measurement['duration'] }}</p>
                    </div>
                    <a class="font-bold text-center text-blue-500" href="{{ asset('storage/'.$measurement['path']) }}">Arquivo de áudio</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a class="bg-yellow-500 text-center text-white font-bold rounded" href="{{ route('admin.measurement.edit', ['id' => $measurement['id']]) }}">Editar</a>
                    <a class="bg-red-500 text-center text-white font-bold rounded" href="{{ route('admin.measurement.delete', ['id' => $measurement['id']]) }}">Excluir</a>
                </div>
                <p class="text-center font-bold">SALA RELACIONADA</p>
                <div class="bg-white rounded p-2 flex flex-col gap-4">
                    <p class="text-center font-semibold">{{ $measurement['room']['name'] }}</p>
                    <div class="flex flex-row-reverse gap-2">
                        <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.delete', ['id' => $measurement['room']['id']]) }}">Excluir</a>
                        <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.edit', ['id' => $measurement['room']['id']]) }}">Editar</a>
                        <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.show', ['id' => $measurement['room']['id']]) }}">Ver</a>
                    </div>
                </div>
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.measurement.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>