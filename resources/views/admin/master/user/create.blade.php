@extends('template.app')

@section('pagetitle','User Create')

@push('customcss')
<!-- bootstrap wysihtml5 - text editor -->
{{-- <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> --}}

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
                        <label for="">Nama<span class="label-required">*</span></label>
                        <input type="text" name="name" class="form-control input-sm" placeholder="Nama..." required
                            maxlength="60" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email<span class="label-required">*</span></label>
                        <input type="email" name="email" class="form-control input-sm" placeholder="Email..." required
                            maxlength="60" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Username<span class="label-required">*</span></label>
                        <input type="text" name="username" class="form-control input-sm" placeholder="Username..."
                            required maxlength="60" value="{{ old('username') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Hak Akses<span class="label-required">*</span></label>
                        <select class="form-control" name="is_admin">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>


                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
            <div class="pull-left button-back">
                <a href="{{ route('user.index')}}">
                    <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i>
                        Kembali</button></a>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
