@extends('template.app')

{{-- @section('pagetitle','Master User') --}}

@push('customcss')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<style>
    .label-required {
        font-size: 14px;
        color: red;
    }
    input,
    textarea {
        border: 1px solid #eeeeee;
        box-sizing: border-box;
        margin: 0;
        outline: none;
        /* padding: 10px; */
    }
    input[type="button"] {
        -webkit-appearance: button;
        cursor: pointer;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    .input-group {
        clear: both;
        position: relative;
    }
    .input-group input[type='button'] {
        background-color: #eeeeee;
        min-width: 38px;
        width: auto;
        transition: all 300ms ease;
    }
    .input-group .button-minus,
    .input-group .button-plus {
        font-weight: bold;
        height: 30px;
        /* padding: 0; */
        width: 38px;
        position: relative;
    }
    .input-group .quantity-field {
        position: relative;
        height: 32px;
        left: -6px;
        text-align: center;
        width: 62px;
        display: inline-block;
        font-size: 13px;
        margin: 0 0 5px;
        resize: vertical;
    }
    .button-plus {
        left: -6px;
    }
    input[type="number"] {
        -moz-appearance: textfield;
        -webkit-appearance: none;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <form method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode Transaksi</label>
                                <input type="text" id="transaction_code" name="transaction_code" readonly
                                    class="form-control input-sm" placeholder="{{ ($transactions->transaction_code) }}"
                                    required maxlength="60" value="{{  ($transactions->transaction_code) }}">
                                {{-- placeholder="" required maxlength="60"> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Users</label>
                                <input type="text" name="name" id="users" readonly class="form-control input-sm"
                                    placeholder="{{Auth::user()->name}}" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Resi Code <span class="label-required">*</span></label>
                                <input type="text" id="resi_code" name="resi_code" class="form-control input-sm"
                                    placeholder="Resi Code..." required max="9999999999" value="{{ old('resi_code') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kurir<span class="label-required">*</span></label>
                                <select class="form-control" name="kurir">
                                    <option value="" selected disabled>Pilih Kurir</option>
                                    {{-- <option value="JNE">JNE</option>
                                    <option value="TIKI">TIKI</option>
                                    <option value="POS">POS Indonesia</option> --}}
                                    @foreach ($courir as $cor)
                                    <option>
                                        {{ $cor->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="">Products<span class="label-required">*</span></label>
                                <select class="form-control" name="product" id="product">
                                    <option value="" selected disabled>Pilih Barang</option>
                                    @foreach ($products as $pro)
                                    <option data-price="{{ $pro->price }}" data-stock="{{ $pro->stock }}">
                                        {{ $pro->product }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <div class="table">
                    <table class="table table-striped table-hover table-responsive" id="table">
                        <thead>
                            <tr>
                                {{-- <th>No.</th> --}}
                                <th>Nama Product</th>
                                {{-- <th>Kode Transaksi</th> --}}
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Qty</th>
                                <th>Total</th>
                                {{-- <th>Tanggal</th> --}}
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('customscript')
{{-- <script src="{{URL::asset('js/jquery.js')}}"></script> --}}
<script>
    $(document).ready(function () {
        $("#product").change(function () {
            product = $(this).val();
            price = $(this).find(':selected').data("price");
            stock = $(this).find(':selected').data("stock");
            row = ` <tr>
                        <td> ${product} </td>
                        <td> ${price} </td>
                        <td> ${stock}</td>
                        <td>
                            <div class="input-group">
                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                <input type="button" value="+" class="button-plus" data-field="quantity">
                            </div>
                        </td>

                        <td><input type="text"readonly class="form-control input-sm grandtotal"></td>
                        <td>
                            <a href="javascript:void(0)" onclick="$(this).find(':selected').submit()"
                                class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </a>
                        </td>
                    </tr>`;
            $("table tbody").append(row);
        });
        // var hasil = 1 ;
        $('body').on('click','.button-plus',function(e){
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        });
        $('body').on('click','.button-minus',function(e){
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
            // $('.quantity-field').val(hasil--);
            // $('.grandtotal').val($('.quantity-field').val() * price);
        });
        $('body').on('click','.button-plus',function () {
            // console.log($('.quantity-field').val());
            $('.grandtotal').val($('.quantity-field').val() * price);
        });
        $('body').on('click','.button-minus',function () {
            // console.log($('.quantity-field').val());
            var hasil = $('.grandtotal').val($('.quantity-field').val() - price);
            $('hasil') - price;
        });
        $('body').on('change','quantity-field',function() {
            if (condition) {

            }
        })
    });
</script>
@endpush

@endsection
