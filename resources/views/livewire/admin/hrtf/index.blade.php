<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">LISTAGEM DE TODAS HRTFs</p>
            <div class="flex flex-col gap-4 p-4">
                @foreach($hrtfs as $hrtf)
                    <div class="bg-white rounded p-2 flex flex-col gap-4">
                        <p class="text-center font-semibold">{{ $hrtf['name'] }}</p>
                        <div class="flex flex-row-reverse gap-2">
                            <a class="text-red-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.hrtf.delete', ['id' => $hrtf['id']]) }}">Excluir</a>
                            <a class="text-yellow-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.hrtf.edit', ['id' => $hrtf['id']]) }}">Editar</a>
                            <a class="text-green-600 px-3 py-1 bg-gray-200 text-center font-bold text-sm rounded" href="{{ route('admin.hrtf.show', ['id' => $hrtf['id']]) }}">Ver</a>
                        </div>
                    </div>
                @endforeach
                <a class="py-2 text-center text-white font-bold bg-green-800 rounded" href="{{ route('admin.hrtf.create') }}">ADICIONAR NOVA HRTF</a>
                <a class="bg-blue-500 text-center text-white font-bold rounded mt-8" href="{{ route('admin.auralization') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>