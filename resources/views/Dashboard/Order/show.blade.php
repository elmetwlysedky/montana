@extends('Dashboard.Layouts1.master')

@section('title')
     {{__('main.order')}}
@endsection

@section('content')

    <div class="box info-box-content">

        <div>

            <div class="form-group row">
                <div class=" container text-center">
                    <h5 class="text-primary mb-2 mt-md-2">{{__('main.employee')}} : </h5>
                    <h5 class="text-primary mb-2 mt-md-2">{{__('main.invoice_num')}} : {{$order->id}}</h5>
                </div>
            </div>

            <div class="form-group row">
                <div class="mb-4">
                    <div class="form-group">

                        <div class="col-sm-3">
                            <label>{{__('main.name')}} {{__('main.client')}}</label>
                            <input type="text" value="{{$order->client->name}}" class="form-control" readonly >
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-sm-auto"> {{__('main.address')}} :</label>
                                <input type="text" value="{{$order->address}}"  class="form-control" readonly >
                            </div>
                        </div>

                    </div>
                </div>

            </div>


                @foreach ($order -> products as $item)


                    <div>
                        <div class="form-group row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label col-sm-auto">{{__('main.products')}}<span class="text-danger">*</span></label>
                                    <input type="text" value="{{$item->name}}" class="form-control" readonly >
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-form-label col-sm-auto"> {{__('main.quantity')}}<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="{{$item->quantity}}" readonly>

                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-form-label col-sm-auto"> {{__('main.price')}}<span class="text-danger"></span></label>
                                    <input type="number"  value="{{$item->price}}"  class="form-control" readonly >
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}<span class="text-danger"></span></label>
                                    <input type="number" value="{{$item->price * $item->quantity}}" class="form-control" readonly >
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                <div class="form-group row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.notes')}} :</label>
                            <input type="text"  value="{{$order->notes}}"  readonly class="form-control">
                        </div>
                    </div>



                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>
                            <input type="number"  value="{{$order->discount}}" readonly class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.subtotal')}}</label>
                            <input type="number"  value="{{$order->subtotal}}"  readonly class="form-control">
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label>{{__('main.payment')}}</label>
                        <input type="text"  value="{{$order->payment}}"  readonly class="form-control">
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.delivery')}} :</label>
                            <input type="number"  value="{{$order->delivery_price}}" readonly class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>
                            <input type="number"  value="{{$order->total_price}}" readonly class="form-control">
                        </div>
                    </div>

                </div>



            @if(Session::has('success'))

                <div class="alert alert-success border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{session('success')}}</span>
                </div>
            @endif
            @if(Session::has('error'))

                <div class="alert alert-warning border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{session('error')}}</span>
                </div>
            @endif

        </div>


    </div>
@endsection
