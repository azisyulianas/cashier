<div>
    @if ($is_checkout)
        @livewire('cashier.check-out', ['context' => $context])
    @else
    @if(session()->has('success'))
        <div class="toast align-items-center text-bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session('success')}}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="card mb-2">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Keranjang</h5>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="row table-responsive" style="max-height: 300pt">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" wire:model="search" class="form-control">
                    </div>
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UPC</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $p)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $p->upc }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->stock }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" wire:click="addProduct({{ $p->upc }})" >Add to Cart</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" >
                                        <h1 class="text-center">Data Kosong</h1>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>UPC</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-info btn-sm" wire:click.prevent="show">Show</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Keranjang</h5>
        </div>
        <div class="card-body">
            <div class="row table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Code UPC</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inputs as $key=>$item)
                        <tr>
                            <td>{{ $item['upc'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['stock'] }}</td>
                            <td>
                                <div class="form-group">
                                    <input type="number" class="form-control @error('quantity.'.$key) is-invalid @enderror" placeholder="quantity" wire:model="quantity.{{ $key }}" max="{{$item['stock']}}">
                                    @error('quantity.'.$key)
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"><h1 class="text-center">Belum Masukan Barang</h1></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row d-flex justify-content-center">
                <div>
                    <button class="btn btn-info btn-sm" wire:click.prevent="checkout">Check Out</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
