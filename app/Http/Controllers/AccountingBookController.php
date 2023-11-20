<?php

namespace App\Http\Controllers;

use App\Models\AccountingBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new Response(AccountingBook::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $accountingBook = new AccountingBook();
        $accountingBook->fill($request->all());
        $accountingBook->save();
        return new Response($accountingBook,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountingBook  $accountingBook
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingBook $accountingBook)
    {
        //
        return new Response($accountingBook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingBook  $accountingBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingBook $accountingBook)
    {
        //
        $accountingBook->fill($request->all())->save();
        return new Response( $accountingBook->fill($request->all())->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountingBook  $accountingBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingBook $accountingBook)
    {
        //
        return new Response($accountingBook->delete());
    }
}
