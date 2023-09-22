<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">CONTRUÇÕES</p>
            <div class="flex flex-col gap-4 p-4">
                @foreach($buildings as $building)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $building['name'] }}</p>
                        <div class="flex flex-row-reverse gap-2">
                            <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.delete', ['id' => $building['id']]) }}">Excluir</a>
                            <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.edit', ['id' => $building['id']]) }}">Editar</a>
                            <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.show', ['id' => $building['id']]) }}">Ver</a>
                        </div>
                    </div>
                @endforeach
                <a class="py-2 text-center text-white font-bold bg-green-800 rounded" href="{{ route('admin.building.create') }}">ADICIONAR NOVA CONSTRUÇÃO</a>
                <a class="bg-blue-500 text-center text-white font-bold rounded mt-8" href="{{ route('admin.auralization') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>