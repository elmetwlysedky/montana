@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.add')}} {{__('main.products')}}
@endsection

@section('content')


<div class="box box-warning">

    {{html()->Form( 'POST',)->route('product.store')->acceptsFiles()->open()}}


    <div class="box-header with-border">
        <h3 class="box-title">{{__('main.create')}} {{__('main.product')}}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

          @include('Dashboard.Product.form')


    </div><!-- /.box-body -->
    {{html()->form()->close()}}
</div><!-- /.box -->
@endsection
