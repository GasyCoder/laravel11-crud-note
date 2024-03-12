<x-app-layout>
    <div class="py-12 px-6 bg-gray-100">
        <a href="{{ route('note.create') }}" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">
            Nouvelle Note
        </a>
        <div class="mt-6 grid grid-cols-4 gap-4">
            @foreach ($notes as $note)
            <div class="note col-span-1 p-4 bg-yellow-300 rounded-lg shadow-lg transform rotate-1">
                <div class="note-body text-gray-700">
                    {{ Str::words($note->note, 30) }}
                </div>
                <div class="text-gray-400">
                    {{ $note->created_at->diffForHumans() }}
                </div>
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('note.show', $note) }}"
                        class="px-2 py-1 bg-gray-300 text-black rounded hover:bg-gray-400">Voir</a>
                    <a href="{{ route('note.edit', $note) }}"
                        class="px-2 py-1 bg-gray-300 text-black rounded hover:bg-gray-400">Editer</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-2 py-1 bg-red-300 text-black rounded hover:bg-gray-400">Supprimer</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-6 mt-6">
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>