<?php

namespace App\Http\Controllers\Form10;

use App\Http\Controllers\Controller;
use App\Models\Form10\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $book_id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($book_id)
    {
        //
            return Page::whereBook_id($book_id)->paginate(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$book_id)
    {
        //
        $page = Page::create([
            "cod"=>$request->cod,
            "responsible_person"=>$request->responsible_person,
            "book_id"=>$book_id
            ]
        );
        return $page;
    }

    /**
     * Display the specified resource.
     * @param int $book_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book_id,$id)
    {
        //
        return Page::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book_id,$id)
    {
        //
        $page = Page::findOrFail($id);
        $page->fill($request->all())->save();
        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id,$id)
    {
        //
        $page = Page::findOrFail($id);
        return $page->delete();
    }
}
