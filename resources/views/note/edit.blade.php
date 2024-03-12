<x-app-layout>
   <div class="note-container single-note max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-4">
      <h1 class="text-3xl py-4">Editer note</h1>
      <form action="{{ route('note.update', $note) }}" method="POST" class="note">
         @csrf
         @method('PUT')
         <textarea name="note" rows="10" class="note-body w-full p-2 border border-gray-300 rounded-lg mb-4"
            placeholder="Enter your note here">{{ $note->note }}</textarea>
         <div class="note-buttons flex justify-between">
            <a href="{{ route('note.index') }}"
               class="note-cancel-button px-2 py-1 bg-gray-300 text-black rounded hover:bg-gray-400">Cancel</a>
            <button class="note-submit-button px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">Mettre à
               jour</button>
         </div>
      </form>
   </div>
</x-app-layout>