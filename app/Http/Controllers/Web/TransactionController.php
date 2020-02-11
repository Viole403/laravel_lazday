<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\DetailsTransaction;
use App\Models\UserTransaction;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
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
        return view('admin.master.transaction.index')->with(['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $transactions = Transaction::latest()->first();
        $user = User::all();
        $courir = Courier::all();
        // dd($products);
        return view('admin.master.transaction.create',compact('transactions','products','user','courir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all);
        // DB::beginTransaction();
        DB::table('transactions')->insert([
            'transaction_code' => $request->transaction_code, //Request transaction code
            'resi_code' => $request->resi_code,
            'kurir' => $request->kurir,
            'destination' => $request->destination,
            'grandtotal' => $request->grandtotal,
            'date_transaction' => Carbon::now(),
            ]);
            dd($request->all);
        // return redirect()->route('transaction.index');
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
        return view('admin.master.transaction.detail')->with(['transaction' => $transaction]);
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
     */
    public function destroy($id)
    {
        //
    }
}
