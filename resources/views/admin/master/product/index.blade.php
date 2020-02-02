@extends('template.app')

@section('pagetitle','Master User')


@section('content')
<!-- Default box -->
<div class="box box-primary">
    <div class="box-body">
        <div>
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">
                <span class="fa fa-arrow-plus"></span> Tambah Product
            </a>
            <div class="navbar navbar-ligth bg-light pull-right">
                <form action="{{ route('product.index') }}" method="get" class="navbar-form" role="search">
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
        </div>

        <div class="table">
            <table class="table table-striped table-hover table-responsive" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        {{-- <th>Deskripsi</th> --}}
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $item)
                    <tr>
                        <td>{{ $index + $products->firstItem()}}</td>
                        <td>{{ ucfirst($item->product)}}</td>
                        <td>{{ "Rp.".number_format($item->price,0,'.','.')}}</td>
                        <td>{{ $item->stock}}</td>
                        {{-- <td>{!! $item->description !!}</td> --}}
                        <td>
                            @if($item->latestImage()->first() == null)
                            @else
                            <img src="{{ URL::asset('uploads/'.$item->latestImage()->first()->image ) }}"
                                alt="Gamabar Product" width="80px" height="85px">
                            @endif
                            {{-- {{ $item->latestImage()->first()->image }} --}}
                        </td>
                        <td>
                            <a href="{{ route('product.show',$item->id) }}" class="btn btn-sm btn-primary"><span
                                    class="fa fa-external-link">Detail</span></a>
                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-sm btn-success"><span
                                    class="fa fa-edit">Edit</span></a>
                            <a href="javascript:void(0)" onclick="$(this).find('form').submit()"
                                class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                                Delete
                                <form action="{{ route('product.destroy',$item->id)}}" method="POST">
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
                {!! $products->links() !!}
            </div>

        </div>
    </div>
    <!-- /.box-body -->
    @endsection
