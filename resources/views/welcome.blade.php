<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 flex flex-col gap-4">
            <p class="font-semibold text-center text-white">ACESSAR SISTEMA DE</p>
            <div class="grid grid-cols-1 gap-6">
                <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('auralization') }}">
                    AURALIZAÇÃO
                </a>
                <a class="bg-white rounded py-8 text-center font-bold" href="{{ route('measurer.index') }}">
                    MONITORAMENTO
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>