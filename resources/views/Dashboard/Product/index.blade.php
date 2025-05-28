@extends('Dashboard.Layouts1.master')

@section('title')
    {{__('main.products')}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{__('main.products')}}  </h3>
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
                    <th>{{__('main.name')}}</th>
                    <th>{{__('main.category')}}</th>

                    <th>{{__('main.price')}}</th>
                    <th>{{__('main.quantity')}}</th>
                    <th>{{__('main.image')}}</th>
                    <th>{{__('main.actions')}}</th>

                </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @isset($products)
                @foreach($products as $item)
                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>

                    @if($item->image == null)
                        <td><img src="/storage/noProduct.png" alt="" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                    @else
                        <td><img src="/storage/{{$item->image}}" alt="" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                    @endif
                    <td>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('product.show',$item->id)}}">{{__('main.show')}}</a></li>
                                <li><a href="{{route('product.edit',$item->id)}}">{{__('main.edit')}}</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form action="{{route('product.delete',$item->id)}}" method="POST"  >
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
                    <th>{{__('main.name')}}</th>
                    <th>{{__('main.category')}}</th>
                    <th>{{__('main.price')}}</th>
                    <th>{{__('main.quantity')}}</th>
                    <th>{{__('main.image')}}</th>
                    <th>{{__('main.actions')}}</th>

                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection
