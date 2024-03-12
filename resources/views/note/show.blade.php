<x-app-layout>
    <div class="note-container single-note max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-4">
        <div class="note-header">
            <h1 class="text-3xl py-4">Note: {{ $note->created_at->diffForHumans() }}</h1>
            <div class="note-buttons flex justify-between">
                <a href="{{ route('note.index') }}" class="text-blue-700 px-2 py-1">Retour</a>
            </div>
        </div>
        <div class="note mt-4 p-4 bg-yellow-300 rounded-lg shadow-lg">
            <div class="note-body text-gray-700">
                {{ $note->note }}
            </div>
        </div>
        <div class="note-buttons flex justify-between mt-4">
            <a href="{{ route('note.edit', $note) }}"
                class="note-edit-button px-2 py-1 bg-green-300 text-gray-800 rounded hover:bg-green-400">Editer</a>
            <form action="{{ route('note.destroy', $note) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="note-delete-button px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
            </form>
        </div>
    </div>
</x-app-layout>