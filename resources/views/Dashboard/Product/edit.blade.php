@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.edit')}} {{$product->name}}
@endsection


@section('content')




    <div class="box box-warning">

        <div class="box-header with-border">
            <h3 class="box-title">{{__('main.edit')}} {{$product->name}}</h3>
        </div><!-- /.box-header -->

        {{html()->modelForm($product, 'PUT',)->route('product.update',$product->id)->acceptsFiles()->open()}}

        <div class="box-body">

            @include('Dashboard.Product.form')
        {{html()->closeModelForm()}}

        </div>
    </div>
@endsection
