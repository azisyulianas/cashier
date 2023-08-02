<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Edit Many</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center mb-2">
                <select name="products" id="products" class="form-select w-50" multiple="multiple" name="products" wire:model="lists">
                    <option value="none" selected>Silahkan Pilih Product</option>
                    @foreach ($items as $p)
                        <option value="{{ $p['upc'] }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-info btn-md" wire:click.prevent="showCart">Add</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Edit Many</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                @foreach ($editProducts as $item)
                    <tr>
                        <td>{{ $item->upc }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stock }}</td>
                    </tr>     
                @endforeach
            </table>
        </div>
    </div>

    @once
        @push('script')
            <!-- select2 -->
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        @endpush
    @endonce
</div>
