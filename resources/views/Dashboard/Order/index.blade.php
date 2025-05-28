@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.orders')}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{__('main.orders')}}  </h3>
        </div><!-- /.box-header -->
        <div class="box-body">



                @if(Session::has('success'))
                    <div class="alert alert-success border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">{{session('success')}}</span>
                    </div>
                @elseif(Session::has('delete'))
                    <div class="alert alert-danger border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold ">{{session('delete')}}</span>
                    </div>

                @endif



            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('main.client')}}</th>
                    <th>{{__('main.subtotal')}}</th>
                    <th>{{__('main.delivery')}}</th>
                    <th>{{__('main.total')}}</th>
                    <th>{{__('main.status')}}</th>
                    <th>{{__('main.payment')}}</th>
                    <th>{{__('main.time')}}</th>
                    <th>{{__('main.actions')}}</th>

                </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @isset($orders)
                @foreach($orders as $item)
                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$item->client->name}}</td>
                    <td>{{$item->subtotal}}</td>
                    <td>{{$item->delivery_price}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->payment}}</td>
                    <td>{{$item->created_at->format('i : H  --Y/m/d')}}</td>


                    <td>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('order.show',$item->id)}}">{{__('main.show')}}</a></li>
                                @if($item->status == "Prepare")
                                <li><a href="{{route('order.update',$item->id)}}">{{__('main.delivery')}}</a></li>
                                <li class="divider"></li>
                                @endif
                                <li>
                                    <form action="{{route('order.delete',$item->id)}}" method="POST"  >
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item-btn btn-danger " type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                                    </form>
{{--                                    <a href="{{route('category.delete',$item->id)}}">{{__('main.delete')}}</a></li>--}}
                                </li>
                            </ul>
                        </div><!-- /btn-group -->
                    </td>

                </tr>
                @endforeach
                @endisset

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>{{__('main.client')}}</th>
                    <th>{{__('main.subtotal')}}</th>
                    <th>{{__('main.delivery')}}</th>
                    <th>{{__('main.total')}}</th>
                    <th>{{__('main.status')}}</th>
                    <th>{{__('main.payment')}}</th>
                    <th>{{__('main.time')}}</th>
                    <th>{{__('main.actions')}}</th>

                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection
