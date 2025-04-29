@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.add')}} {{__('main.categories')}}
@endsection

@section('content')


<div class="box box-warning">

    {{html()->Form( 'POST',)->route('category.store')->acceptsFiles()->open()}}

{{--    <Form action="{{route('category.store')}}" class="form-validate-jquery" method="post" enctype="multipart/form-data">--}}
{{--    @csrf--}}


    <div class="box-header with-border">
        <h3 class="box-title">{{__('main.create')}} {{__('main.category')}}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

          @include('Dashboard.Category.form')


    </div><!-- /.box-body -->
    {{html()->form()->close()}}
</div><!-- /.box -->
@endsection
