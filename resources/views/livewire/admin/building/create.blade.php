<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">ADICIONAR NOVA CONSTRUÇÃO</p>
            <div class="px-4 pt-8">
                <form wire:submit="save" class="flex flex-col gap-2">
                    <label class="font-bold">Escolha o lugar:</label>
                    <select class="w-full rounded" wire:model="form.place">
                        <option value="">Selecione um lugar</option>
                        @foreach($places as $place)
                            <option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
                        @endforeach
                    </select>
                    <label class="font-bold">Digite o nome:</label>
                    <input class="w-full rounded" type="text" wire:model="form.name">
                    <button type="submit" class="w-full p-2 text-white bg-green-500 font-bold rounded">Salvar</button>
                </form>
                <div class="flex flex-col pt-4">
                    <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.building.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>