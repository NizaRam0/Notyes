<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Models\Note;
use Symfony\Contracts\Service\Attribute\Required; 

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes= Note::query()->where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(15);
       
        return view('note.index', ['notes'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Note $note)
    {
        return view('note.create',['note'=>$note ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([

        'note' =>['required', 'string' ]
        ]);
        $data['user_id']=$request->user()->id;
        $note = Note::create($data);
        
        return redirect()->route('note.show', $note)->with('success', 'Note created successfully!');
 }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.show', ['note'=>$note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.edit', ['note'=>$note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data=$request->validate([

        'note' =>['required', 'string' ]
        ]);
    
        $note->update($data);
        
        return redirect()->route('note.show', $note)->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $note->delete();
        return redirect()->route('note.index')->with('success', 'Note deleted successfully!');
    }
}
