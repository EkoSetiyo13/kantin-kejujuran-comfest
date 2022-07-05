<div class="tab-pane fade" id="sales-tab" role="tabpanel" aria-labelledby="sales-nav">
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
                @foreach($sales as $key => $sales)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$sales->name}}</td>
                    <td>{{$sales->created_at}}</td>
                    <td>Rp. {{$sales->total_price}}</td>
                    <td>{{$sales->amount}}</td>
                </tr>
                @endforeach
                @if(empty($sales))
                <tr>
                    <td colspan="5">Tidak ada data</td>
                </tr>
                @endif
            </tbody>

        </table>
    </div>
</div>