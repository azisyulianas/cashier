<div>
    @if(session()->has('error'))
        <div class="toast align-items-center text-bg-danger border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session('error')}}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
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
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h5 class="card-text fs-3">Invoice</h5>
        </div>
        <div class="card-body">
            <div>
                <input type="text" class="form-control text-center" disabled wire:model="invoiceID">
            </div>
            <table class="table">
                @forelse ($items as $key=>$item)
                    <tr>
                        <td>{{ $item['name'] }} @ {{ $item['quantity'] }} x {{ $item['price'] }}</td>
                        <td>Rp{{ $item['total'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <h1>Kuintasi Kosong</h1>
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td>Total</td>
                    <td>Rp{{ $sum }}</td>
                </tr>
                <tr>
                    <td>Pembayaran</td>
                    <td>
                        <input type="number" class="form-control" name="pay" id="pay" min="0" wire:model="pay">
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>
                <button class="btn btn-primary btn-sm" wire:click.prevent="store">Buy</button>
                <button class="btn btn-danger btn-sm" wire:click.prevent="back">Back</button>
            </div>
            <div>
                Kembalian {{$kembalian}}
            </div>
        </div>
    </div>
</div>