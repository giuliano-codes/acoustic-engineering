<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 p-4">
                <p class="text-center font-bold">VISUALIZAÇÃO DA HRTF</p>
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2">
                        <p class="font-semibold">Nome:</p>
                        <p>{{ $hrtf['name'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Taxa de amostragem:</p>
                        <p>{{ $hrtf['samplerate'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Duração em milisegundos:</p>
                        <p>{{ $hrtf['duration'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Azimuth:</p>
                        <p>{{ $hrtf['azimuth'] }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Ãngulo de Elevação:</p>
                        <p>{{ $hrtf['elevation_angle'] }}</p>
                    </div>
                    <a class="font-bold text-center text-blue-500" href="{{ asset('storage/'.$hrtf['path']) }}">Arquivo de áudio</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a class="bg-yellow-500 text-center text-white font-bold rounded" href="{{ route('admin.hrtf.edit', ['id' => $hrtf['id']]) }}">Editar</a>
                    <a class="bg-red-500 text-center text-white font-bold rounded" href="{{ route('admin.hrtf.delete', ['id' => $hrtf['id']]) }}">Excluir</a>
                </div>
                
                <a class="bg-blue-500 text-center text-white font-bold rounded" href="{{ route('admin.hrtf.index') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>