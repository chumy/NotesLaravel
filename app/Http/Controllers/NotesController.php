<?php
namespace App\Http\Controllers;

use App\Note;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::paginate(20);
        return view('notes/list', compact('notes'));
    }
    public function create()
    {
        return view('notes/create');
    }
    public function store()
    {
        //return 'Creating a note';
        //return request()->all();
        //return request()->get('note');
        //return request()->only('note');
        $this->validate(request(), [
          'note' => ['required', 'max:200']
        ]);

        $data = request()->all();

        Note::create($data);

        return redirect()->to('notes');

    }
    public function show($note)
    {
        //dd($note);
        //$note = Note::find($note);
        $note = Note::FindorFail($note);
        //return $note->note;
        //return view('notes/details', compact('note'));
        //return view('notes/details', ['note'=> $note ]);
        return view('notes/details')->with('note',$note);

    }
}
