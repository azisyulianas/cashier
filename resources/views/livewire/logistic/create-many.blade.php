<div>
    @if(session()->has('error'))
        <div class="toast align-items-center text-bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session('error')}}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Input Barang</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UPC</th>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="" wire:model="upc.0">
                                    @error('upc.0')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="" wire:model="name.0">
                                    @error('name.0')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="" name="Harga Barang" wire:model="price.0">
                                    @error('price.0')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="" name="Harga Barang" wire:model="stock.0">
                                    @error('stock.0')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm mb-3" wire:click.prevent="add({{$i}})"><i class="fa-solid fa-plus"></i></button>
                            </td>
                        </tr>
                        @foreach($inputs as $key => $value)
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" wire:model="upc.{{ $value }}">
                                        @error('upc.'.$value)<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" wire:model="name.{{ $value }}">
                                        @error('name.'.$value)<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="" name="Harga Barang" wire:model="price.{{ $value }}">
                                        @error('price.'.$value)<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="" name="Harga Barang" wire:model="stock.{{ $value }}">
                                        @error('stock.'.$value)<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Save</button>
        </div>
    </div>
</div>
