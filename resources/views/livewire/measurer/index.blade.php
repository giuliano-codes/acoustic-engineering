<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col gap-4 px-4">
            <div>
                <a class="block text-center bg-white rounded"href="{{ route('welcome') }}">VOLTAR</a>
            </div>
            @foreach($measurers as $measurer)
                <a class="rounded bg-white py-4 text-center" href="{{ route('measurer.show', ['id' => $measurer['id']]) }}">{{ $measurer['name'] }}</a>
            @endforeach
        </div>
    </div>
</div>