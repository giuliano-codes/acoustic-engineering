
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit="createToken" class="flex flex-col gap-2">
                <label class="font-bold">Digite o nome:</label>
                <input class="w-full rounded" type="text" wire:model="name" required>
                <button type="submit" class="w-full p-2 text-white bg-green-500 font-bold rounded">Criar Token</button>
            </form>
            <br><br>
            @if($token)
                <div class="bg-white p-4 rounded">
                    <p class="text-center">Seu token é: (Guarde esse token em um lugar seguro)</p>
                    <p class="text-center">{{ $token }}</p>
                </div>
            @endif
        </div>
        <p class="py-6 text-center font-bold">Meus Tokens</p>
        @foreach(auth()->user()->tokens as $token)
        <p class="text-center">{{ $token['id'] }}: {{ $token['name'] }}</p>
        @endforeach
    </div>
</div>