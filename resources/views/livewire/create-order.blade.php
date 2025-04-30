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

                    <div class="col-sm-3">
                        <label>{{__('main.name')}}</label>
                        <select wire:model="selectedClient" class="form-control">
                            <option selected>{{__('main.choose_client')}}</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}"> {{$client->name}}</option>
                            @endforeach
                        </select>
                        @error('selectedClient') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto"> {{__('main.address')}} :</label>
                            <input type="text"  wire:model="address"  class="form-control">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
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
            <div class="col-md-5">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.notes')}} :</label>
                    <input type="text"  wire:model="notes"  class="form-control">
                    @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>



            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>
                    <input type="number"  wire:model="discount"  class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.subtotal')}}</label>
                    <input type="number"  wire:model="subTotal" readonly class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label>{{__('main.payment')}}</label>
                <select wire:model="payment" class="form-control">
                    <option value="visa">{{__('main.visa')}}</option>
                    <option value="cash"> {{__('main.cash')}}</option>
                </select>
                @error('payment') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.delivery')}} :</label>
                    <input type="number"  wire:model="delivery"  class="form-control">
                    @error('delivery') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>
                    <input type="number"  wire:model="invoiceTotal" readonly class="form-control">
                </div>
            </div>


            <div class="col-sm-1">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto">{{__('main.save')}}</label>
                    <button type="submit"  class="form-control btn btn-success ">{{__('main.save')}}</button>
                </div>
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
