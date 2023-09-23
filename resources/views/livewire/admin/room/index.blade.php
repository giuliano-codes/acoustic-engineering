<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">LISTAGEM DE TODAS AS SALAS</p>
            <div class="flex flex-col gap-4 p-4">
                @foreach($rooms as $room)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $room['name'] }}</p>
                        <div class="flex flex-row-reverse gap-2">
                            <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.delete', ['id' => $room['id']]) }}">Excluir</a>
                            <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.edit', ['id' => $room['id']]) }}">Editar</a>
                            <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.room.show', ['id' => $room['id']]) }}">Ver</a>
                        </div>
                    </div>
                @endforeach
                <a class="py-2 text-center text-white font-bold bg-green-800 rounded" href="{{ route('admin.room.create') }}">ADICIONAR NOVA SALA</a>
                <a class="bg-blue-500 text-center text-white font-bold rounded mt-8" href="{{ route('admin.auralization') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>