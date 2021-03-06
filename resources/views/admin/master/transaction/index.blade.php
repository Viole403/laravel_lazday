@extends('template.app')

@section('pagetitle','Transaction')

@push('customcss')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/dist/css/bootstrap.css') }}"> --}}
@endpush

@section('content')
<!-- Default box -->
<div class="box box-primary">
    <div class="box-body">
        <div>
            {{-- <a href="{{ URL::asset('admin.transaction.create')}}" class="btn btn-sm btn-primary"> --}}
            <a href="{{ route('transaction.create') }}" class="btn btn-sm btn-primary">
                <span class="fa fa-arrow-plus"></span> Tambah Transaksi
            </a>
            <!-- Large modal -->
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Example
                Modal</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Modal -->


            <div class="pull-right">
                <form action="{{ route('transaction.index') }}" method="get" class="navbar-form" role="search">
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
                        <th>Kode Transaksi</th>
                        <th>Nomor Resi</th>
                        <th>Tujuan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                @foreach ($transactions as $index => $tra)
                <tr>
                    <td>{{ $index + $transactions->firstItem()}}</td>
                    <td>{{ $tra->transaction_code}}</td>
                    <td>{{ ($tra->status_transaction == 'pending') ? '-' : $tra->resi_code }}</td>
                    {{-- <td>{{ ucfirst($tra->userRelations->name)}}</td> --}}
                    <td>{{  $tra->destination  }}</td>
                    <td>{{ "Rp. ".number_format($tra->grandtotal,0,'.','.') }}</td>
                    <td>{{ date('d-m-Y',strtotime($tra->date_transaction)) }}</td>
                    {{-- <td>{{ $tra->proof_of_payment }}</td> --}}
                    <td>-</td>
                    <td>
                        @if ($tra->status_transaction == 'waiting')
                        <span class="btn btn-sm btn-default">Waiting</span>
                        @elseif($tra->status_transaction == 'pending')
                        <span class="btn btn-sm btn-warning">Pending</span>
                        @elseif($tra->status_transaction == 'process')
                        <span class="btn btn-sm btn-success">Process</span>
                        @elseif($tra->status_transaction == 'send')
                        <span class="btn btn-sm btn-primary">Sending</span>
                        @else
                        -
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('transaction.edit',$tra->id) }}" class="btn btn-xs btn-success"><span
                                class="fa fa-edit"></span></a>
                        <a href="{{ route('transaction.show',$tra->id) }}" class="btn btn-xs btn-primary">
                            <span class="fa fa-external-link"></span>
                        </a>
                        <a href="javascript:void(0)" onclick="$(this).find('form').submit()"
                            class="btn btn-xs btn-danger"><span class="fa fa-trash"></span>
                            <form action="{{ route('transaction.destroy',$tra->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>

            <div class="pull-right">
                {!! $transactions->links() !!}
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    @endsection
