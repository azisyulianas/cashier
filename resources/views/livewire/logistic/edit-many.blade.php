<div>
    {{-- The best athlete wants his opponent at his best. --}}
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
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Edit Many</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center mb-2">
                <select name="products" id="products" class="form-select w-50" multiple="multiple" name="products" wire:model="lists">
                    @foreach ($items as $p)
                        <option value="{{ $p['upc'] }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-info btn-md" wire:click.prevent="show">Add</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Edit Many</h5>
        </div>
        <div class="card-body">
            <div class="table-revonsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>UPC</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    @foreach ($upc as $key => $value)
                        <tr>
                            <td>{{ $value['upc'] }}</td>
                            <td>
                                <input type="text" class="form-control" wire:model="name.{{$key}}">
                            </td>
                            <td>
                                <input type="number" class="form-control" wire:model="stock.{{$key}}">
                            </td>
                            <td>
                                <input type="number" class="form-control" wire:model="price.{{$key}}">
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <th>UPC</th>
                            <th>Name</th>
                            <th>Stock</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <button class="btn btn-info btn-sm" wire:click.prevent="update">Update</button>
        </div>
    </div>

    @once
        @push('script')
            <!-- Select2 -->
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <!-- Datatables -->
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready(function() {
                    $('#products').select2();
                    $('#products').on('change', function (e) {
                        let data = $(this).val();
                        @this.set('lists', data);
                    });
                    window.livewire.on('productStore', () => {
                        $('#products').select2();
                    });
                    
                });
            </script>
        @endpush
        @push('stlye')
            <!-- select2 -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <!-- Datatables -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        @endpush
    @endonce
</div>
