<?php

namespace App\Http\Controllers;

use App\Models\AccountingBook;
use App\Models\AccountingNote;
use App\Models\AccountingPage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountingNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\AccountingPage  $accountingPage
     * @return \Illuminate\Http\Response
     */
    public function index(AccountingBook $accountingBook,AccountingPage $accountingPage)
    {
        //
        return new Response($accountingPage->accountingNotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingPage  $accountingPage
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AccountingBook $accountingBook,AccountingPage $accountingPage)
    {
        //
        $accountingNote = new AccountingNote();
        $accountingNote->fill($request->all());
        $accountingNote->accounting_page_id = $accountingPage->id;
        $accountingNote->save();
        return new Response($accountingNote,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountingPage  $accountingPage
     * @param  \App\Models\AccountingNote  $accountingNote
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingBook $accountingBook,AccountingPage $accountingPage, AccountingNote $accountingNote)
    {
        //
        return new Response($accountingNote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingPage  $accountingPage
     * @param  \App\Models\AccountingNote  $accountingNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingBook $accountingBook, AccountingPage $accountingPage, AccountingNote $accountingNote)
    {
        //
        $accountingNote->fill($request->all())->save();
        return new Response($accountingNote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountingPage  $accountingPage
     * @param  \App\Models\AccountingNote  $accountingNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingBook $accountingBook,AccountingPage $accountingPage, AccountingNote $accountingNote)
    {
        //
        return new Response($accountingNote->delete());
    }
}
