<?php

namespace App\Http\Controllers\Form13;
use App\Http\Controllers\Controller;
use App\Models\Form13\FormList;
use Illuminate\Http\Request;

class AllFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int form_list_id
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,int $form_list_id)
    {
        //
        return FormList::with('forms','forms.formNotes')->findOrFail($form_list_id);
    }
}
