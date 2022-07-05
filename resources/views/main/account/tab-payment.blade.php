<div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
    <h3>Dompet</h3>
    <div class="row">
        <div class="col-3">
            <p>Total Saldo </p>
        </div>
        <div class="col-9"> <b>: Rp. {{Auth::user()->balance}}</b></div>
        <div class="col-3">
            <p>Total Pembelian </p>
        </div>
        <div class="col-9"><b>: Rp. {{$total_purchases}}</b></div>
        <div class="col-3">
            <p>Total Penjualan </p>
        </div>
        <div class="col-9"><b>: Rp. {{$total_sales}}</b></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <p><b>Topup</b></p>
            <form action="{{ route('account.topup.store') }}" method="post" autocomplete="on">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label>Nominal</label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="nominal" class="form-control" type="text" require>
                    </div>
                    <div class="col-md-12">
                        <button class="btn">Simpan</button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <p><b>Withdraw</b></p>
            <form action="{{ route('account.withdraw.store') }}" method="post" autocomplete="on">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label>Nominal</label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="nominal" class="form-control" type="text" require>
                    </div>
                    <div class="col-md-12">
                        <button class="btn">Simpan</button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>