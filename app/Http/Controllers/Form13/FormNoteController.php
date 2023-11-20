<?php

namespace App\Http\Controllers\Form13;

use App\Http\Controllers\Controller;
use App\Models\Form13\FormNote;
use Illuminate\Http\Request;

class FormNoteController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param int $formList_id
     * @param int $form_id
     * @return \Illuminate\Http\Response
     */
    public function index($formList_id,$form_id)
    {
        //
        return FormNote::whereForm_id($form_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $form_id
     * @param int $formList_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$formList_id,$form_id)
    {
        //
        $formNote = new FormNote;
        $formNote->fill($request->all());
        $formNote->form_id = $form_id;
        $formNote->save();
        return $formNote;
    }

    /**
     * Display the specified resource.
     * @param int $formList_id
     * @param int $form_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($formList_id,$form_id,$id)
    {
        //
        return FormNote::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $formList_id
     * @param int $form_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$formList_id,$form_id,$id)
    {
        //
        $formNote = FormNote::findOrFail($id);
        $formNote ->fill($request->all())->save();
        return $formNote;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $formList_id
     * @param int $form_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($formList_id,$form_id,$id)
    {
        //
        $formNote = formNote::findOrFail($id);
        return $formNote->delete();
    }
}
