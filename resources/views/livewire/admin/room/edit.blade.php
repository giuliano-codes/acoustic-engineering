<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">EDITAR SALA</p>
            <div class="px-4 pt-8">
                <form wire:submit="save" class="flex flex-col gap-2">
                    <label class="font-bold">Escolha uma construção:</label>
                    <select class="w-full rounded" wire:model="form.building">
                        @foreach($buildings as $building)
                            <option value="{{ $building['id'] }}">{{ $building['name'] }}</option>
                        @endforeach
                    </select>
                    <label class="font-bold">Digite o nome:</label>
                    <input class="w-full rounded" type="text" wire:model="form.name" placeholder="Sala 202">
                    <iframe class="w-full h-56" src="{{ asset('storage/'.$room['blueprint_path']) }}"></iframe>
                    <label for="file" class="p-4 text-center font-bold border-green-800 bg-green-400 text-white border-dashed border-2">
                        Faça upload da nova Planta Baixa
                    </label>
                    <input class="hidden" type="file" id="file" wire:model="file">
                    <button type="submit" class="w-full p-2 text-white bg-green-500 font-bold rounded">Salvar</button>
                </form>
                <div class="flex flex-col pt-4">
                    <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.room.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>