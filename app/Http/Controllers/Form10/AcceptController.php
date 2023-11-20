<?php

namespace App\Http\Controllers\Form10;

use App\Http\Controllers\Controller;
use App\Models\Form10\Book;
use App\Models\Form10\Page;
use Illuminate\Http\Request;

class AcceptController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $book_id
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $book_id)
    {
        //
//        return MilitaryUnit::all();
        $pages = $request->input('pages');
        $title = $request->input('title');
        $owner = $request->input('owner');
        $data = collect([]);
        $book= Book::whereTitle($title)->get();
        if ($book===null)
            return collect(['error_cod'=>"BOOK_ERROR","message_error"=>"Ошибка, книги с названием $title не существует"])->toJson();
        foreach ($pages as $page){
            $page_in_database = Page::with(['notes','notes.militaryunits'])->whereCod($page['cod'])->whereBook_id($book_id)->first();
            if ($page_in_database){
                if ($page_in_database->notes->isNotEmpty()) {
                    $note_in_database = $page_in_database->notes->sortByDesc('date_of_note')->first();
                    $military_unit_in_database = $note_in_database->militaryunits->where('title',$owner)->first();
                    if (!$military_unit_in_database)
                        $data->put($page['cod'],["error_cod"=>"UNIT_ERROR","message"=>"У страницы нету такой части"]);
                    else{
                        $diff_note = collect($military_unit_in_database['categories_military'])->diff(collect($page['categories_all']));
                        if ($diff_note->isNotEmpty()){
                            $data->put($page['cod'],["error_cod"=>"CATEGORIES_ERROR","message"=>"В категориях вооружения части {$owner} paзличные данные в позициях {$diff_note->map(function ($values,$key){
                                return $key+1;
                            })->values()}"]);
                        }
                    }}
                else{
                    $data->put($page['cod'],["error_cod"=>"PAGE_ERROR","message"=>"Нету записей,хотя в файле такая страница существует"]);
                    }
                }
            else{
                $data->put($page['cod'],"Такой страницы с кодом {$page['cod']} не существует в вашей таблице");
            }
        }
        return $data;
    }
}
