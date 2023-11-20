<?php
namespace App\Services;

use App\Models\Form10\Book;

final class SendService
{
    public function send(Book $book) {
        // $book = Book::with(['user','pages','pages.notes'])->findOrFail($book_id);
        $pages = collect([]);
        foreach ($book->pages as $page){
            if ($page->notes->isNotEmpty())
                $pages->push(['categories_all' => $page->notes->sortByDesc('date_of_note')->first()->categories_all,
                    'cod' => $page->cod]);
        }
        $data = collect(['pages'=>$pages])->put('owner',$book->user->military_units)->put('title',$book->title);
        return $data->toJson();
    }
}

