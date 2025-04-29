@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.add')}} {{__('main.invoice')}}
@endsection

@section('content')

    <div class="box info-box-content">
{{--        <div class="card-body">--}}
@livewire('create-order')
{{--   --}}



{{--                <div class="form-group row">--}}

{{--                    <div class=" container text-center">--}}
{{--                        <h5 class="text-primary mb-2 mt-md-2">{{__('main.employee')}} : </h5>--}}
{{--                        <h5 class="text-primary mb-2 mt-md-2">{{__('main.invoice_num')}} : </h5>--}}

{{--                    </div>--}}



{{--                    <div class="mb-4">--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="col-sm-2">--}}
{{--                                <label>{{__('main.name')}}</label>--}}
{{--                                {{ html()->text('name')->class('form-control')->placeholder('Enter ...') }}--}}
{{--                            </div>--}}

{{--                                @error('client') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}


{{--                @if($invoiceTotal == null)--}}
{{--                    <form wire:submit.prevent="saveTotalInvoice">--}}
{{--                        @else--}}
{{--                            <form wire:submit.prevent="saveInvoice">--}}
{{--                                @endif--}}

{{--                                @include('Dashboard.Order.item')--}}


{{--                                <div>--}}
{{--                                    <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>--}}
{{--                                    <div class="col-sm-2">--}}
{{--                                        <input type="number" name="discount" id="discount"  class="form-control" >--}}
{{--                                    </div>--}}
{{--                                    @error('discount') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>--}}
{{--                                    <div class="col-sm-2">--}}
{{--                                        <p>Total Price: <strong></strong></p>--}}
{{--                                        <input type="number" name="invoiceTotal" readonly class="form-control" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}



{{--                                @if($invoiceTotal == null)--}}
{{--                                    <div class="col-form-label col-sm-auto">--}}
{{--                                        <button type="submit"  class="btn btn-primary">{{__('main.save')}}</button>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="col-form-label col-sm-auto">--}}
{{--                                        <button type="submit" class="btn btn-success">{{__('main.save')}}</button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                            </form>--}}
{{--                            @if(Session::has('success'))--}}

{{--                                <div class="alert alert-success border-0 alert-dismissible">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>--}}
{{--                                    <span class="font-weight-semibold">{{session('success')}}</span>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(Session::has('error'))--}}

{{--                                <div class="alert alert-warning border-0 alert-dismissible">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>--}}
{{--                                    <span class="font-weight-semibold">{{session('error')}}</span>--}}
{{--                                </div>--}}
{{--                @endif--}}



{{--        </div>--}}
    </div>
@endsection
