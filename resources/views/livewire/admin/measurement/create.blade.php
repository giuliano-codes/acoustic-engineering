<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center font-bold">ADICIONAR NOVA SALA</p>
            <div class="px-4 pt-8">
                <form wire:submit="save" class="flex flex-col gap-2">
                    <label class="font-bold">Escolha uma sala:</label>
                    <select class="w-full rounded" wire:model="form.room">
                        <option value="">Selecione uma sala</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room['id'] }}">{{ $room['name'] }}</option>
                        @endforeach
                    </select>
                    <label class="font-bold">Digite o nome:</label>
                    <input class="w-full rounded" type="text" wire:model="form.name" placeholder="Sala 202 Ponto 1">
                    <label class="font-bold">Escolha o tipo do áudio:</label>
                    <select class="w-full rounded" wire:model="form.type">
                        <option value="">Selecione um tipo</option>
                        <option value="mono">MONO</option>
                        <option value="stereo">STEREO</option>
                    </select>
                    <label class="font-bold">Digite a taxa de amostragem:</label>
                    <input class="w-full rounded" type="number" wire:model="form.samplerate" placeholder="44100">
                    <label class="font-bold">Digite a duração do arquivo em milisegundos:</label>
                    <input class="w-full rounded" type="text" wire:model="form.duration" placeholder="3000">
                    <label for="file" class="p-4 text-center font-bold border-green-800 bg-green-400 text-white border-dashed border-2">
                        Faça upload do arquivo de áudio
                    </label>
                    <input class="hidden" type="file" id="file" wire:model="form.file">
                    <button type="submit" class="w-full p-2 text-white bg-green-500 font-bold rounded">Salvar</button>
                </form>
                <div class="flex flex-col pt-4">
                    <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.measurement.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>