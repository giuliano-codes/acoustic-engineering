<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">LUGARES</p>
            <div class="flex flex-col gap-4 p-4">
                @foreach($places as $place)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $place['name'] }}</p>
                        <div class="flex flex-row-reverse gap-2">
                            <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.delete', ['id' => $place['id']]) }}">Excluir</a>
                            <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.edit', ['id' => $place['id']]) }}">Editar</a>
                            <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.show', ['id' => $place['id']]) }}">Ver</a>
                        </div>
                    </div>
                @endforeach
                <a class="py-2 text-center text-white font-bold bg-blue-600 rounded" href="{{ route('admin.place.create') }}">ADICIONAR NOVO LUGAR</a>
            </div>
        </div>
    </div>
</div>