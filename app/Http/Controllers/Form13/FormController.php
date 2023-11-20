<?php

namespace App\Http\Controllers\Form13;

use App\Http\Controllers\Controller;
use App\Models\Form13\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $book_id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($formList_id)
    {
        //
            return Form::whereFormList_id($formList_id)->paginate(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int formList_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$formList_id)
    {
        //$
        $form = new Form();
        $form->form_list_id = $formList_id;
        $form->fill($request->all())->save();
        return $form;
    }

    /**
     * Display the specified resource.
     * @param int $formList_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($formList_id,$id)
    {
        //
        return Form::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param int $formList_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $formList_id,$id)
    {
        //
        $form = Form::findOrFail($id);
        $form->fill($request->all())->save();
        return $form;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($formList_id,$id)
    {
        //
        $form = Form::findOrFail($id);
        return $form->delete();
    }
}
