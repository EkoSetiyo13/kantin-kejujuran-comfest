<div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>Rp. {{$product->price}}</td>
                    <td>{{$product->amount}}</td>
                    <!-- <td><button class="btn">View</button></td> -->
                </tr>
                @endforeach
                @if($products->isEmpty())
                <tr>
                    <td colspan="5">Tidak ada data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>