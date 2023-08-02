<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h5 class="card-text fs-3">Edit Barang</h5>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="upc" class="form-label">UPC</label>
                        <input type="text" class="form-control  @error('upc') is-invalid @enderror" id="upc" placeholder="xxxxxx..." name="upc" wire:model="upc" disabled>
                        @error('upc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <input type="number" class="form-control  @error('stock') is-invalid @enderror" id="stock" placeholder="0" name="stock" min="0" wire:model="stock">
                        <span class="input-group-text">pcs</span>
                        @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Susu" name="name" wire:model="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="" name="Harga Barang" wire:model="price">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row w-25">
                <button type="submit" class="btn btn-info w-50" wire:click.prevent="update({{$upc}})">Update</button>
                <button class="btn btn-danger w-50" wire:click.prevent="cancel()">Cancel</button>
            </div>
        </form>
    </div>
</div>