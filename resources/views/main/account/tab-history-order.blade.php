<div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>Rp. {{$order->total_price}}</td>
                    <td>{{$order->amount}}</td>
                </tr>
                @endforeach
                @if(empty($orders))
                <tr>
                    <td colspan="5">Tidak ada data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>