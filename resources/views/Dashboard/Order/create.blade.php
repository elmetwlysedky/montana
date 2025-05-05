@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.add')}} {{__('main.order')}}
@endsection

@section('content')

    <div class="box info-box-content">

        @livewire('create-order')

    </div>
@endsection
