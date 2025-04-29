

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

    <div class="form-group">
        <label for="exampleInputFile">{{__('main.image')}}</label>
        {{ html()->file('image')->acceptImage()->class('form-control') }}
        <p class="help-block">Example block-level help text here.</p>
    </div>

    <div class="box-footer">


        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
