<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\DetailsTransaction;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = array(
            array(
                'user_id' => '1',
                'transaction_code' => 'TR00001',
                'resi_code' => NULL,
                'ongkir' => '50000.00',
                'destination' => 'surabaya',
                'grandtotal' => '100000',
                'date_transaction' => Carbon::now(),
                'status_transaction' => 'waiting',
                'proof_of_payment' => 'transaction/c7psDj2cA2doWBUgYwjSvoruc0jNCGeqeLDPimxh.jpeg',
                'created_at' => Carbon::now()
            ),
            array(
                'user_id' => '1',
                'transaction_code' => 'TR00002',
                'resi_code' => NULL,
                'ongkir' => '50000.00',
                'destination' => 'surabaya',
                'grandtotal' => '190000.00',
                'date_transaction' => Carbon::now(),
                'status_transaction' => 'pending',
                'proof_of_payment' => 'transaction/jAPBZVEgVQaUvppcsVGVQ2r2ixqLNV6etECCpLlJ.png',
                'created_at' => Carbon::now()
            ),
        );

        $detail_transactions = array(
            array(
                'transaction_id' => '1',
                'product_id' => '1',
                'product' => 'hoodie',
                'qty' => '2',
                'price' => '90000.00',
                'total' => '100000',
                'created_at' => Carbon::now()
            ),
            array(
                'transaction_id' => '2',
                'product_id' => '2',
                'product' => 'Celana pendek joger',
                'qty' => '2',
                'price' => '90000.00',
                'total' => '180000.00',
                'created_at' => Carbon::now()
            ),
            array(
                'transaction_id' => '2',
                'product_id' => '1',
                'product' => 'hoodie',
                'qty' => '1',
                'price' => '300000.00',
                'total' => '100000',
                'created_at' => Carbon::now()
            )
        );
        Transaction::insert($transactions);
        DetailsTransaction::insert($detail_transactions);
    }
}
