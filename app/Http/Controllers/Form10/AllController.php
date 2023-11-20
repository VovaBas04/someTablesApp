<?php

namespace App\Http\Controllers\Form10;

use App\Http\Controllers\Controller;
use App\Models\Form10\Book;
use Illuminate\Http\Request;

class AllController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Book::with('pages','pages.notes','pages.notes.militaryunits')->get();
    }
}
