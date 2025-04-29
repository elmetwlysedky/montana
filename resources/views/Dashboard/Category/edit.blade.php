@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.edit')}} {{$category->name}}
@endsection


@section('content')




    <div class="box box-warning">

        <div class="box-header with-border">
            <h3 class="box-title">{{__('main.edit')}} {{$category->name}}</h3>
        </div><!-- /.box-header -->

        {{html()->modelForm($category, 'PUT',)->route('category.update',$category->id)->acceptsFiles()->open()}}

        <div class="box-body">

            @include('Dashboard.Category.form')
        {{html()->closeModelForm()}}

        </div>
    </div>
@endsection
