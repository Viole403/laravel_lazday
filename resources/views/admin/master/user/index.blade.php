@extends('template.app')

@section('pagetitle','Master User')

@section('customcss')
<link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}">
@endsection

@section('content')
<!-- Default box -->
<div class="box box-primary">
    <div class="box-body">
        <div class="table">
            {{-- <form action="/pegawai/cari" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari Pegawai .."
                    value="{{ old('cari') }}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
            <div class="tambah-user">
                <div class="col-sm-3 col-md-3 pull-left">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary tambah">
                        <span class="fa fa-arrow-plus"></span> Tambah User
                    </a>
                </div>
            </div>
            <div class="navbar navbar-ligth bg-light pull-right">
                <form action="{{ route('user.index') }}" method="get" class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search"
                            value="{{old('search')}}">
                        <div class="input-group-btn">
                            {{-- <input type="submit" value="search"> --}}
                            <button class="btn btn-default" type="submit"><i
                                    class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <nav class="navbar navbar-light bg-light pull-right">
                <form action="/users/search" method="GET" class="form-inline" role="search">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" value="{{old('search')}}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </nav> --}}
            {{-- <form action="/users/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
            <input type="submit" value="CARI">
            </form> --}}
            <table class="table table-striped table-hover table-responsive" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + $users->firstitem()}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->username}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            @if ($user->is_admin == false)
                            <span class="label label-primary">User</span>
                            @else
                            <span class="label label-success">Admin</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-success"><span
                                    class="fa fa-edit">Edit</span></a>
                            <a href="javascript:void(0)" onclick="$(this).find('form').submit()"
                                class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                                Delete
                                <form action="{{ route('user.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $users->links() !!}
            </div>

        </div>
    </div>
    <!-- /.box-body -->
    @endsection
