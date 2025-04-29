<div>


        <div class="form-group row">

            <div class=" container text-center">
                <h5 class="text-primary mb-2 mt-md-2">{{__('main.employee')}} : </h5>
                <h5 class="text-primary mb-2 mt-md-2">{{__('main.invoice_num')}} : {{$invoice_num}}</h5>

            </div>
        </div>



        <div class="form-group row">
            <div class="mb-4">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>{{__('main.name')}}</label>
                        <select wire:model="client" class="form-control">
                            <option selected ></option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}"> {{$client->name}}</option>
                            @endforeach
                        </select>
                        @error('clients') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                </div>
            </div>

        </div>


    <form wire:submit.prevent="saveInvoice">



        @include('livewire.item-order')

        <div class="col-form-label col-sm-auto">
            <button type="button" wire:click="addProduct" class="btn btn-primary">{{__('main.add_product')}}</button>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>
                    <input type="number"  wire:model="discount"  class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>
                    <input type="number"  wire:model="invoiceTotal" readonly class="form-control">
                </div>
            </div>




        <label class="col-form-label col-sm-auto"> {{__('main.save')}}</label>

        <div class="col-form-label col-sm-auto">
            <button type="submit"  class="btn btn-success">{{__('main.save')}}</button>
        </div>


        </div>

    </form>

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
