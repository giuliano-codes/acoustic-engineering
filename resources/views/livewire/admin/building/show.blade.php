<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">CONSTRUÇÃO</p>
                <div class="flex gap-2">
                    <p class="font-semibold">Nome:</p>
                    <p>{{ $building['name'] }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a class="bg-yellow-500 text-center text-white font-bold rounded" href="{{ route('admin.building.edit', ['id' => $building['id']]) }}">Editar</a>
                    <a class="bg-red-500 text-center text-white font-bold rounded" href="{{ route('admin.building.delete', ['id' => $building['id']]) }}">Excluir</a>
                </div>
                <p class="text-center font-bold">LUGAR RELACIONADO</p>
                
                <div class="bg-white rounded p-2 flex flex-col gap-4">
                    <p class="text-center font-semibold">{{ $building['place']['name'] }}</p>
                    <div class="flex flex-row-reverse gap-2">
                        <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.delete', ['id' => $building['place']['id']]) }}">Excluir</a>
                        <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.edit', ['id' => $building['place']['id']]) }}">Editar</a>
                        <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.place.show', ['id' => $building['place']['id']]) }}">Ver</a>
                    </div>
                </div>
                
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.building.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>