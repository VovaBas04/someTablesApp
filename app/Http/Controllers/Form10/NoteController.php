<?php

namespace App\Http\Controllers\Form10;

use App\Http\Controllers\Controller;
use App\Models\Form10\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $book_id
     * @param int $page_id
     * @return \Illuminate\Http\Response
     */
    public function index($book_id,$page_id)
    {
        //
        return Note::wherePage_id($page_id)->orderBy('date_of_note')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $page_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$book_id, $page_id)
    {
        //
        $note = new Note;
        $note->fill($request->all());
        $note->page_id = $page_id;
        $note->save();
        return $note;
    }

    /**
     * Display the specified resource.
     * @param int $book_id
     * @param int $page_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book_id,$page_id,$id)
    {
        //
        return Note::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $book_id
     * @param int $page_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$book_id,$page_id,$id)
    {
        //
        $note = Note::findOrFail($id);
        $note ->fill($request->all())->save();
        return $note;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $book_id
     * @param int $page_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id,$page_id,$id)
    {
        //
        $note = Note::findOrFail($id);
        return $note->delete();
    }
}
