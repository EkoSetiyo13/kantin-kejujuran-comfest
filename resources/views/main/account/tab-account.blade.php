<div class="tab-pane fade  show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
    <h4>Data Diri Siswa</h4>
    <div class="row">
        <div class="col-md-6">
            <label><b>ID</b></label>
            <input class="form-control" type="text" value="{{Auth::user()->student_id}}" readonly>
        </div>
        <div class="col-md-6">
            <label><b>name</b></label>
            <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
        </div>
        <!-- <div class="col-md-12">
            <button class="btn">Update Account</button>
            <br><br>
        </div> -->
    </div>
</div>