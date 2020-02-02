@extends('template.app')

@section('pagetitle','Master User')

@push('customcss')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <style>
        .label-required{
            font-size: 14px;
            color: red;
        }
    </style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <form action="{{ route('product.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="">Nama Produk <span class="label-required">*</span></label>
                        <input type="text" name="product" class="form-control input-sm" placeholder="Nama Produk..."
                            required maxlength="60" value="{{ old('product') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Harga <span class="label-required">*</span></label>
                        <input type="number" name="price" class="form-control input-sm" placeholder="Harga Produk..."
                            required min="0" max="9999999999" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="number" name="stock" class="form-control input-sm" placeholder="Stok Produk..."
                            required min="0" max="9999999999" value="{{ old('stock') }}">
                    </div>

                    <div class="form-group">
                            <label for="images">Gambar Product</label>
                            <input type="file" id="images" multiple name="images[]" id="images" accept="image/*">
                            <p class="help-block">Only File Images (.jpg/.jpeg/.png)</p>
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                    </div>
                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('customscript')
    <script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //description
            $('#description').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": false,
                }
            });
        });
    </script>
@endpush
