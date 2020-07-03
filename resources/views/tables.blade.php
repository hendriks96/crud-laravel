@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>id</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allData as $item)
                        <tr>
                            <td>{{$item->id_pertanyaan}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->isi}}</td>
                            <td>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success btn-block" onclick='tojawaban({{$item->id_pertanyaan}})'>Answer</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                      @endforeach

                  </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-block btn-primary" onclick="addPertanyaan();">Tambah Pertanyaan</button>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection

@push('scripts')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    function addPertanyaan(){
        window.open('pertanyaan/create');
    }

    function tojawaban(id){
        window.open('jawaban/'+id);
    }
    // console.log('good');
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush
