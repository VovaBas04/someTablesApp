<?php

namespace App\Http\Controllers\Form13;

use App\Http\Controllers\Controller;
use App\Models\Form13\FormList;
use App\Models\Form13\FormNote;
use Illuminate\Http\Request;

class AcceptController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $data = collect($request->all());
        $formListInDatabase = FormList::with('forms','forms.formNotes')->whereTitle($data['title'])->first();
        if (!$formListInDatabase){
            return collect(['error_cod'=>"FORMLIST_ERROR","message_error"=>"Ошибка, книги с названием {$data['title']} не существует"])->toJson();
        }
        $formsInDatabase = collect($formListInDatabase->forms);
        $forms = $data['forms'];
        foreach ($forms as $form){
            $formInDatabase=$formsInDatabase->first(function ($item) use ($form){
                return $item['title']===$form['title'];
            });
            if (!$formInDatabase){
                return collect(['error_cod'=>"FORM_ERROR","message_error"=>"Ошибка, страницы с названием {$form['title']} не существует"])->toJson();
            }
            foreach ($forms as $form){
                $formNote=$form['form_notes'];
                $formNoteInDatabase =$formsInDatabase->first(function ($item) use ($formNote) {
                    return $item['title'] === $formNote['title'];
                });
                if (!$formNoteInDatabase){
                    $formNoteCreate = new FormNote;
                    $formNoteCreate->fill($formNote);
                    $formNoteCreate->save();
                }

            }
        }
        return $data['forms'];
    }
}
