<?php

namespace App\Http\Controllers;

use App\Debit;
use Illuminate\Http\Request;

class DebitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debits = Debit::orderBy('id', 'DESC')->paginate(5);
        return view('debits.debit', compact('debits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function show(Debit $debit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function edit(Debit $debit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debit $debit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debit $debit)
    {
        //
    }
}
