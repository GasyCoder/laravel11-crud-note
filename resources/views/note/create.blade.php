<x-app-layout>
    <div class="note-container single-note max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-4">
        @session('status')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès !</strong>
            <span class="block sm:inline">{{ $value }}</span>
        </div>
        @endsession
        <h1 class="text-2xl font-bold mb-4 mt-4">Ajouter note</h1>
        <form action="{{ route('note.store') }}" method="POST" class="note">
            @csrf
            <textarea name="note" rows="10" class="note-body w-full p-2 border border-gray-300 rounded-lg mb-4"
                placeholder="Saisir ici votre note"></textarea>
            <div class="note-buttons flex justify-between">
                <a href="{{ route('note.index') }}"
                    class="note-cancel-button px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">Cancel</a>
                <button
                    class="note-submit-button px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ajouter</button>
            </div>
        </form>
    </div>
</x-app-layout>