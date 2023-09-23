<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-2 flex flex-col gap-4">
                <p class="font-semibold text-center">GERENCIAR</p>
                <div class="grid grid-cols-1 gap-6">
                    <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('admin.place.index') }}">
                        LUGARES
                    </a>
                    <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('admin.building.index') }}">
                        CONSTRUÇÕES
                    </a>
                    <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('admin.room.index') }}">
                        SALAS
                    </a>
                    <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('admin.measurement.index') }}">
                        MEDIÇÕES
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>