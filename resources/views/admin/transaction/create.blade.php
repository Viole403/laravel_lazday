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

    .button-back {
        margin-left: 12px;
        margin-top: -45px;
    }

</style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <form action="{{ route('transaction.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf

                    <div class="form-group">
                        <label for="">Kode Transaksi <span class="label-required">*</span></label>
                        <input type="text" name="transaction_code" class="form-control input-sm"
                            placeholder="Kode Transaksi..." required maxlength="60"
                            value="{{ old('transaction_code') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Resi Code <span class="label-required">*</span></label>
                        <input type="text" name="resi_code" class="form-control input-sm" placeholder="Harga Produk..."
                            required max="9999999999" value="{{ old('resi_code') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Kurir<span class="label-required">*</span></label>
                        <select class="form-control" name="kurir">
                            <option value="JNE">JNE</option>
                            <option value="TIKI">TIKI</option>
                            <option value="POS">POS Indonesia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">GrandTotal <span class="label-required">*</span></label>
                        <input type="number" name="grandtotal" class="form-control input-sm"
                            placeholder="Stok Produk..." required min="0" max="9999999999"
                            value="{{ old('grandtotal') }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="number" name="stock" class="form-control input-sm" placeholder="Stok Produk..."
                            required min="0" max="9999999999" value="{{ old('stock') }}">
                </div>

                <div class="form-group">
                    <label for="images">Gambar Product</label>
                    <input type="file" id="images" multiple name="images[]" id="images" accept="image/*">
                    <p class="help-block">Only File Images (.jpg/.jpeg/.png)</p>
                </div> --}}
        </div> <!-- /.box-body -->

        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        </form>
        <div class="pull-left button-back">
            <a href="{{ route('transaction.index')}}">
                <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i>
                    Kembali</button></a>
        </div>
    </div>
</div>
</div>
@endsection
