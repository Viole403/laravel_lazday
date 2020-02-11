@extends('template.app')

@section('pagetitle','Product User')

@push('customcss')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

<style>
    .label-required {
        font-size: 14px;
        color: red;
    }

    /* .button-back {
        margin-left: 12px;
        margin-top: -45px;
    } */

</style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <form action="{{ route('transaction.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">Kode Transaksi</label>
                                <input type="text" name="transaction_code" id="transaction_code" readonly
                                    class="form-control input-sm" placeholder="{{ ($transactions->transaction_code) }}"
                                    required maxlength="60" value="{{  ($transactions->transaction_code) }}">
                                {{-- placeholder="" required maxlength="60"> --}}
                            </div>
                            <div class="col-md-5">
                                <label for="">Users</label>
                                <input type="text" name="name" id="users" readonly class="form-control input-sm"
                                    placeholder="{{Auth::user()->name}}" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">Resi Code <span class="label-required">*</span></label>
                                <input type="text" id="resi_code" name="resi_code" class="form-control input-sm"
                                    placeholder="Resi Code..." required max="9999999999" value="{{ old('resi_code') }}">
                            </div>
                            {{-- <div class="col-md-5">
                                <label for="">Kurir<span class="label-required">*</span></label>
                                <select class="form-control" name="kurir">
                                    <option value="JNE">JNE</option>
                                    <option value="TIKI">TIKI</option>
                                    <option value="POS">POS Indonesia</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">Products<span class="label-required">*</span></label>
                                <select class="form-control" name="product" id="product">
                                    @foreach ($products as $pro)
                                    <option>
                                        {{ $pro->product }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="">Total <span class="label-required">*</span></label>
                                <input type="number" name="grandtotal" class="form-control input-sm"
                                    placeholder="Grand Total..." required min="0" max="9999999999"
                                    value="{{ old('grandtotal') }}">
                            </div>
                        </div>
                    </div>
                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        <input type="button" class="submit" value="{{ $transactions->name }} save">
                        {{-- <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> Simpan</button> --}}
                    </div>
                </div>
            </form>
            {{-- <div class="pull-left button-back">
                <a href="{{ route('transaction.index')}}">
            <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i>
                Kembali</button></a>
        </div> --}}
    </div>
</div>
</div>
<div class="table">
    <table class="table table-striped table-hover table-responsive" id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Product</th>
                <th>Kode Transaksi</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@push('customscript')
{{-- <script src="{{ URL::asset('js/jquery-2.js') }}"></script> --}}
<script>
    $(document).ready(function () {
        $(".tambah").click(function () {
            var nama_product = $("#name").val();
            var users = $("#users").val();
            var transactions = $(
                "#transaction_code").val();
            var resi = $("#resi_code").val();
            var markup = "<tr><td>" + nama_product + "</td><td>" + harga + "</td></tr>" + transactions +
                "</td></tr>";
            $("table tbody").append(markup);
        });
    });

</script>
@endpush

@endsection
