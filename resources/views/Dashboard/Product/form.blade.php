

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="form-group">
        <label>{{__('main.name')}}</label>
        {{ html()->text('name')->class('form-control')->placeholder('Enter ...') }}
    </div>


{{--    number($name = null, $value = null, $min = null, $max = null, $step = null)--}}



    <div class="form-group">
        <label>{{__('main.price')}}</label>
        {{ html()->number('price',min:1)->class('form-control')->placeholder('Enter ...') }}
    </div>

    <div class="form-group">
        <label>{{__('main.price_of_sale')}}</label>
        {{ html()->number('price_of_sale',min:1)->class('form-control')->placeholder('Enter ...') }}
    </div>

    <div class="form-group">
        <label>{{__('main.quantity')}}</label>
        {{ html()->number('quantity',min:1)->class('form-control')->placeholder('Enter ...') }}
    </div>

    <div class="form-group">
        <label>{{__('main.description')}}</label>
        {{ html()->textarea('description')->class('form-control')->placeholder('Enter ...') }}
    </div>

    <div class="form-group">
        <label>{{__('main.categories')}}</label>
        {{ html()->select('category_id',$categories)->class('form-control')->placeholder('Enter ...') }}
    </div>

    <div class="form-group">
        <label for="exampleInputFile">{{__('main.image')}}</label>
        {{ html()->file('image')->acceptImage()->class('form-control') }}
        <p class="help-block">Example block-level help text here.</p>
    </div>

    <div class="box-footer">


        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
