<?php

namespace App\Http\Controllers;

use App\Models\DetailsTransaction;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = Transaction::whereMonth('created_at', Carbon::now()->format('m'))->count();
        $productSale = DetailsTransaction::whereMonth('created_at', Carbon::now()->format('m'))->sum('qty');
        $customer = User::where('is_admin', false)->count();
        $products = Product::count();

        // dd($transaction, $productSale, $customer, $products);
        return view('admin.dashboard', compact('customer', 'products', 'transaction', 'productSale'));
    }
}
