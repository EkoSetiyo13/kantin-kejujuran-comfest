<div class="tab-pane fade" id="add-product-tab" role="tabpanel" aria-labelledby="add-product-nav">
    <h4><b>Tambah Produk</b></h4>
    <p>Jual barangmu di kantin kejujuran</p>
    <form action="{{ route('account.product.store') }}" method="post" autocomplete="on" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label>Nama</label>
                <input name="name" class="form-control" type="text" require>
            </div>
            <div class="col-md-12">
                <label>Description</label>
                <input name="description" class="form-control" type="text" require>
            </div>
            <div class="col-md-12">
                <label>Harga (Rp)</label>
                <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="price" class="form-control" type="text" require>
            </div>
            <div class="col-md-12">
                <label>Jumlah Barang</label>
                <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="amount" class="form-control" type="text" require>
            </div>
            <div class="col-md-12">
                <label>Gambar</label>
                <input name="image" type="file" class="form-control-file" id="image" require>
                <br>
                <img id="preview-image-before-upload" src="https://previews.123rf.com/images/kolibrico/kolibrico2002/kolibrico200200005/139369246-vector-empty-transparent-background-vector-transparency-grid-seamless-pattern-.jpg?fj=1" alt="preview image" style="max-height: 200px;">
                <br>
                <br>
            </div>
            <div class="col-md-12">
                <button class="btn">Simpan</button>
                <br><br>
            </div>
    </form>
</div>