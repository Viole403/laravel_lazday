<?php

namespace App\Http\Controllers\Web;

use App\Models\App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\DetailsTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = new Transaction();
        $transactions = ($request->search != null)
        ? $transactions->where('transaction_code','like',"%$request->search")
        ->paginate(10)
        : $transactions->paginate(10);
        // $transactions = Transaction::with(['userRelations', 'detailTransaction'])->paginate(20);
        // dd($transactions);
        return view('admin.transaction.index')->with(['transactions' => $transactions]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = DetailsTransaction::with('productRelation')->where('transaction_id', $id)->get();
        // dd($transaction);
        return view('admin.transaction.detail')->with(['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *public function destroy($id)
     *{
     *    //
     *}
     **/
}
