<x-app-layout>
    <div class="py-12 px-6 bg-gray-100">
        <div>
            <h1>Corbeille ({{ $trashCount }})</h1>
        </div>
        @session('status')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès !</strong>
            <span class="block sm:inline">{{ $value }}</span>
        </div>
        @endsession
        <div class="mt-6 grid grid-cols-4 gap-4">
            @foreach ($trashes as $note)
            <div class="note col-span-1 p-4 bg-yellow-300 rounded-lg shadow-lg transform rotate-1">
                <div class="note-body text-gray-700">
                    {{ Str::words($note->note, 30) }}
                </div>
                <div class="text-gray-400">
                    {{ $note->created_at->diffForHumans() }}
                </div>
                <div class="mt-4 flex justify-between">
                    <form action="{{ route('trash.restore', $note) }}" method="POST">
                        @csrf
                        <button class="px-2 py-1 bg-gray-300 text-black rounded hover:bg-gray-400">Restaurer</button>
                    </form>
                    <form action="{{ route('trash.delete', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-2 py-1 bg-red-300 text-black rounded hover:bg-gray-400">Supprimer</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-6 mt-6">
            {{ $trashes->links() }}
        </div>
    </div>
</x-app-layout>