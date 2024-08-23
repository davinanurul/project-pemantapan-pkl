@extends('templates/header')
    @push('style')
      <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset ('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="{{ asset ('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="{{ asset ('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
      <style>
        .password-column {
          max-width: 150px; /* Sesuaikan dengan lebar yang diinginkan */
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
      </style>
    @endpush
@section('content')

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus-square"></i> Data Penduduk
                </button>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"
                  aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Sukses! </h5>
              {{ session('success') }}.
            </div>
          @endif
              
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"
                  aria-hidden="true">x</button>
              <h5><i class="icon fas fa-ban"></i> Data Gagal Disimpan! </h5>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
          @endif

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($penduduks as $penduduk)
                  <tr>
                    <td>{{ $i= (isset($i)?++$i:$i=1) }}</td>
                    <td>{{$penduduk->nik}}</td>
                    <td>{{$penduduk->nama}}</td>
                    <td class="password-column">{{ \Illuminate\Support\Str::limit($penduduk->password, 10, '...') }}</td>
                    <td>{{$penduduk->JK}}</td>
                    <td>{{$penduduk->alamat}}</td>
                    <td>
                        <button class="btn bg-success" type="button" data-toggle="modal" data-target="#formModal"
                            data-mode="edit" data-id="{{ $penduduk->id }}" 
                            data-nik="{{ $penduduk->nik }}"
                            data-nama="{{ $penduduk->nama }}" 
                            data-password="{{ $penduduk->password }}"
                            data-JK="{{ $penduduk->JK }}"
                            data-alamat="{{ $penduduk->alamat}}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <form action="penduduk/{{ $penduduk->id }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-danger delete-data" type="button">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> --}}
                </table>
              </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      </div>
<!-- content -->     
@include('penduduk.modal')
@endsection

@push('script')
  
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  
  <!-- Page specific script -->
<script>
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
  $('#formModal').on('shown.bs.modal', function(e){
  console.log('penduduk')
  const btn = $(e.relatedTarget)
  const mode = btn.data('mode')
  const id = btn.data('id')
  const nik = btn.data('nik')
  const nama = btn.data('nama')
  const password = btn.data('password')
  const JK = btn.data('JK')
  const alamat = btn.data('alamat')
  const modal = $(this)

    if(mode==='edit'){
      modal.find('.modal-title').text('Edit Data penduduk')
      modal.find('#nik').val(nik)
      modal.find('#nama').val(nama)
      modal.find('#password').val(password)
      modal.find('#JK').val(JK)
      modal.find('#alamat').val(alamat)
      modal.find('.modal-body form').attr('action', '{{ url("penduduk") }}/'+id)
      modal.find('#method').html('@method("PATCH")')
  }else{
    modal.find('.modal-title').text('Input Data penduduk')
    modal.find('#nik').val('');
    modal.find('#nama').val()
    modal.find('#password').val()
    modal.find('#JK').val()
    modal.find('#alamat').val()
    modal.find('#method').html('')
    modal.find('.modal-body form').attr('action', '{{ url("penduduk")}}')
  }
});


// script edit end

// script delete start
$('.delete-data').click(function(e){
  e.preventDefault()
  const data = $(this).closest('tr').find('td:eq(1)').text()
  Swal.fire({
    title: 'Data akan hilang!',
    text: `Apakah penghapusan data ${data} akan dilanjutkan?`,
    icon: 'warning',
    showDenyButton: true,
    confirmButtonText: 'Ya',
    denyButtonText: 'Tidak',
    focusConfirm: false
  })
  .then((result) => {
    if(result.isConfirmed) $(e.target).closest('form').submit()
    else swal.close()
  })
});

</script>
@endpush