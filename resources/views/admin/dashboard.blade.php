@extends('template.app')

@section('content')
{{-- <section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section> --}}
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>{{ $transaction }}</h3>
            <p>Penjualan Bulan ini</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3>{{ $productSale}}</h3>
            <p>Unit Terjual Bulan ini</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{ $customer }}</h3>
            <p>Customers</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{ $products }}</h3>
            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="fa fa-dropbox"></i>
        </div>
    </div>
</div>
@endsection
