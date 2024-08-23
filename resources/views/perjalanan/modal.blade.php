<div class="modal fade" id="formModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="perjalanan" class="form-horizontal">
                @csrf
                  <div id="method"></div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="waktu" name="waktu" placeholder="Waktu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="suhu_tubuh" class="col-sm-2 col-form-label">Suhu Tubuh</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="suhu_tubuh" name="suhu_tubuh" placeholder="Suhu">
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- /.card-body -->
                {{-- <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div> --}}
                <!-- /.card-footer -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
      </div>
    </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>