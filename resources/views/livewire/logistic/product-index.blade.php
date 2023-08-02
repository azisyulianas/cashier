<div>
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
    @if(!$editProduct)
        @include('livewire.logistic.component.create')
    @else
        @include('livewire.logistic.component.edit')
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Logistic</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="input-group mb-3">
                        <input type="number" wire:model="numRow" max="{{$count}}" value="10" class="form-control">
                        <span class="input-group-text">Page</span>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" wire:model="seacrh" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row table-responsive">
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
                        @foreach ($products as $p)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $p->upc }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" wire:click="getProduct({{ $p->upc }})" >Edit</button>
                                <button class="btn btn-danger btn-sm" wire:click.prevent="getDelete({{ $p->upc }})" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                            </td>
                        </tr>
                        @endforeach
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
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Hapus Product {{$nameDelete}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $deleteId }})" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>