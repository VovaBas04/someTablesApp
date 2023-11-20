<?php

namespace App\Http\Controllers;

use App\Models\AccountingBook;
use App\Models\AccountingPage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\AccountingBook  $accountingBook
     * @return \Illuminate\Http\Response
     */
    public function index(AccountingBook $accountingBook)
    {
        //
        return $accountingBook->accountingPages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingBook  $accountingBook
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AccountingBook $accountingBook)
    {
        //
        $accountingPage = new AccountingPage();
        $accountingPage->fill($request->all());
        $accountingPage->accounting_book_id = $accountingBook->id;
//        dd($accountingPage);
        $accountingPage->save();
        return new Response($accountingPage,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountingBook  $accountingBook
     * @param  \App\Models\AccountingPage  $accountingPage
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingBook $accountingBook, AccountingPage $accountingPage)
    {
        //
        return new Response($accountingPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingBook  $accountingBook
     * @param  \App\Models\AccountingPage  $accountingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingBook $accountingBook, AccountingPage $accountingPage)
    {
        //
        $accountingPage->fill($request->all())->save();
        return new Response($accountingPage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountingBook  $accountingBook
     * @param  \App\Models\AccountingPage  $accountingPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingBook $accountingBook, AccountingPage $accountingPage)
    {
        //
        return new Response($accountingPage->delete());
    }
}
