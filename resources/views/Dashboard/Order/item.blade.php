



{{--@foreach ($selectedProducts as $index => $product)--}}


    <div wire:key="product_">

        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto">{{__('main.products')}}<span class="text-danger">*</span></label>
                    <select wire:model="selectedProducts..id" class="form-control">
                        <option value="">{{__('main.choose_products')}}</option>
{{--                        @foreach ($products as $product)--}}
{{--                            <option value="{{ $product->id }}">{{ $product->name }}</option>--}}
{{--                        @endforeach--}}
                    </select>
                    @error('selectedProducts.'.'.id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.quantity')}}<span class="text-danger">*</span></label>
                    <input type="number" wire:model="selectedProducts..quantity" class="form-control">
                    @error('selectedProducts.'.'.quantity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.price')}}<span class="text-danger"></span></label>
                    <!-- <div class="col-sm-7"> -->
                    <input type="number" wire:model="selectedProducts..productPrice"    class="form-control" readonly id="price">
                    <!-- </div> -->
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}<span class="text-danger"></span></label>
                    <!-- <div class="col-sm-7"> -->
                    <input type="number"  wire:model="selectedProducts..totalPrice"  class="form-control" readonly id="total">
                    <!-- </div> -->
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"><span class="text-danger"></span></label>
                <button type="button" wire:click="removeProduct()" class="form-control btn btn-danger ">{{__('main.delete')}}</button>
                </div>
            </div>

        </div>
    </div>

{{--@endforeach--}}

<div class="col-form-label col-sm-auto">
    <button type="button" wire:click="addProduct" class="btn btn-primary">{{__('main.add_product')}}</button>
</div>


