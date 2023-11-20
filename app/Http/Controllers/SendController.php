<?php

namespace App\Http\Controllers;

use App\Models\Form10\Book;
use App\Models\Form10\Note;
use App\Models\Form10\Page;
use Illuminate\Http\Request;
use App\Services\SendService;

class SendController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$book_id,SendService $send_service)
    {
        //
//        return Book::addSelect(['pages'=>Page::addSelect(['last_note'=>
//        Note::select('categories_all')->orderByDesc('date_of_note')->limit(1)
//        ])]);
//        return Book::addSelect(['last_page'=>Page::select('cod')->orderBy('created_at')->limit(1)]);
//         $book = Book::with(['user','pages','pages.notes'])->findOrFail($book_id);
//         $pages = collect([]);
//         foreach ($book->pages as $page){
//                 if ($page->notes->isNotEmpty())
//                  $pages[] = ['categories_all' => $page->notes->sortByDesc('date_of_note')->first()->categories_all,
//                     'cod' => $page->cod];
//         }
//         $data = collect(['pages'=>$pages])->put('owner',$book->user->military_units)->put('title',$book->title);
//         return $data->toJson();
        $book = Book::findorFail($book_id);
        $data = $send_service->send($book);
        return $data;
    }
}
