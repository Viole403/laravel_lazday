<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DetailsTransaction;
use App\Models\UserTransaction;
use App\Models\App\Models\User;
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
        return view('admin.transaction.index')->with(['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction.create');
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
            'transaction_code' => $request->transaction_code,
            'resi_code' => $request->resi_code,
            'kurir' => $request->kurir,
            'grandtotal' => $request->grandtotal,
            // 'email_verified_at' => Carbon::now(),
            // 'api_token' => str_random(18),
            // 'is_admin' => (int)$request->is_admin,
            // 'password' => bcrypt($request->password),
            // 'remember_token' => str_random(10),
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
            // 'password' => $request->getPassword(Hash::make('password')),
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
     */
    public function destroy($id)
    {
        //
    }
}
