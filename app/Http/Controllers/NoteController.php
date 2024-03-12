<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = $request->user()->id;
        $note = Note::create($data);

        return to_route('note.create', $note)->with('status', 'La note a été créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $note->update($data);

        return to_route('note.show', $note)->with('message', 'Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
        $note->delete();

        return redirect()->route('note.index')->with('message', 'Note was deleted');
    }

    public function restore($id)
    {
        $note = Note::onlyTrashed()->where('id', $id)->firstOrFail();

        if ($note->user_id !== auth()->id()) {
            abort(403);
        }

        $note->restore();

        return redirect()->route('note.index')->with('message', 'Note was restored');
    }

    public function forceDelete($id)
    {
        $note = Note::onlyTrashed()->where('id', $id)->firstOrFail();

        if ($note->user_id !== auth()->id()) {
            abort(403);
        }

        $note->forceDelete();

        return redirect()->route('note.index')->with('message', 'Note was permanently deleted');
    }


    public function trash(Note $note)
    {   
        $userId = Auth::user()->id;

        $trashCount = Note::onlyTrashed()->where('user_id', $userId)->count();

        return view('note.trash-note', [
            'trashCount'  => $trashCount,
        ]);
    }


}