@extends('template.app')

@section('pagetitle','Edit Product')

@push('customcss')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

<style>
    .label-required {
        font-size: 14px;
        color: red;
    }

</style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <form action="{{ route('user.update',$users->id) }}" method="post" class="form"
                enctype="multipart/form-data">
                <div class="box-body">
                    {{-- <input type="hidden" name="id" value="{{ $users->id }}"> --}}
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Nama <span class="label-required">*</span></label>
                        <input type="text" name="name" class="form-control input-sm" placeholder="Nama Anda..." required
                            maxlength="60" value="{{ $users->name }}">
                    </div>


                    <div class="form-group">
                        <label for="">Username <span class="label-required">*</span></label>
                        <input type="username" name="username" class="form-control input-sm" placeholder="Username..."
                            required maxlength="60" value="{{ $users->username }}">
                    </div>


                    <div class="form-group">
                        <label for="">Email <span class="label-required">*</span></label>
                        <input type="email" name="email" class="form-control input-sm" placeholder="Email Anda..."
                            required maxlength="60" value="{{ $users->email }}">
                    </div>

                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select class="form-control" name="is_admin">
                            <option value="0" {{ $users->is_admin == 0 ? 'selected' :'' }}>User</option>
                            <option value="1" {{ $users->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                        {{-- <input type="text" name="is_admin" value="{{ $users->is_admin }}"> --}}
                    </div>

                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-primary"> <i class="fa fa-save"></i>
                            Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('customscript')
@endpush
