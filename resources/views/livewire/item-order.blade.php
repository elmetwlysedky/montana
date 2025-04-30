

    @foreach ($items as $index => $item)


    <div>

        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto">{{__('main.products')}}<span class="text-danger">*</span></label>
                    <select class="form-control" wire:model.live="items.{{$index}}.id">
                        <option>{{__('main.choose_products')}}</option>
                        @foreach ($products as $product)
                           <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('items.'.$index.'.id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.quantity')}}<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" wire:model.live="items.{{$index}}.quantity">
                    @error('items.'.$index.'.quantity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.price')}}<span class="text-danger"></span></label>
                    <!-- <div class="col-sm-7"> -->
                    <input type="number"   wire:model="items.{{$index}}.productPrice"  class="form-control" readonly >
                    <!-- </div> -->

                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}<span class="text-danger"></span></label>
                    <!-- <div class="col-sm-7"> -->
                    <input type="number"  wire:model="items.{{$index}}.totalPrice"  class="form-control" readonly >
                    <!-- </div> -->
                </div>
            </div>


            <div class="col-sm-1">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto">{{__('main.delete')}}<span class="text-danger"></span></label>
                    <button type="button" wire:click="removeProduct({{$index}})" class="form-control btn btn-danger ">{{__('main.delete')}}</button>
                </div>
            </div>

        </div>
    </div>
    @endforeach



