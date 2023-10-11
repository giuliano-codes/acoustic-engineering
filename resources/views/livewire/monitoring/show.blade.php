<div wire:poll>
    <x-guest-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8" wire:key="monitoring">
            <div class="flex flex-col gap-4 px-4 bg-white">
                <div>
                    @foreach($measurer->monitorings as $data)
                        <p>LAEQ - {{ $data['laeq'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </x-guest-layout>
</div>