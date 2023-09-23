<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">VISUALIZAÇÃO DA SALA</p>
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2">
                        <p class="font-semibold">Nome:</p>
                        <p>{{ $room['name'] }}</p>
                    </div>
                    <p class="font-bold text-center">PLANTA BAIXA</p>
                    <iframe class="w-full h-56" src="{{ asset('storage/'.$room['blueprint_path']) }}"></iframe>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a class="bg-yellow-500 text-center text-white font-bold rounded" href="{{ route('admin.room.edit', ['id' => $room['id']]) }}">Editar</a>
                    <a class="bg-red-500 text-center text-white font-bold rounded" href="{{ route('admin.room.delete', ['id' => $room['id']]) }}">Excluir</a>
                </div>
                <p class="text-center font-bold">MEDIÇÕES RELACIONADAS</p>
                @foreach($room['measurements'] as $measurement)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $measurement['name'] }}</p>
                        <div class="flex flex-row-reverse gap-2">
                            <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.measurement.delete', ['id' => $measurement['id']]) }}">Excluir</a>
                            <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.measurement.edit', ['id' => $measurement['id']]) }}">Editar</a>
                            <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.measurement.show', ['id' => $measurement['id']]) }}">Ver</a>
                        </div>
                    </div>
                @endforeach
                <p class="text-center font-bold">CONSTRUÇÃO RELACIONADA</p>
                <div class="bg-white rounded p-2 flex flex-col gap-4">
                    <p class="text-center font-semibold">{{ $room['building']['name'] }}</p>
                    <div class="flex flex-row-reverse gap-2">
                        <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.delete', ['id' => $room['building']['id']]) }}">Excluir</a>
                        <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.edit', ['id' => $room['building']['id']]) }}">Editar</a>
                        <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.building.show', ['id' => $room['building']['id']]) }}">Ver</a>
                    </div>
                </div>
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.room.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>