@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$pertanyaan}}</h3>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Jawaban</th>
                      <th>Like</th>
                      <th>Dislike</th>
                      <th>Vote</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allJawaban as $item)
                        <tr>
                            <td>{{$item->id_jawaban}}</td>
                            <td>{{$item->isi}}</td>
                            <td>{{$item->like}}</td>
                            <td>{{$item->dislike}}</td>
                            <td>{{$item->vote}}</td>
                        </tr>
                      @endforeach

                  </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-block btn-primary" onclick="addJawaban({{$pertanyaan_id}})">Tambah Jawaban</button>
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
    function addJawaban(pertanyaan_id){
        window.open('create/'+pertanyaan_id);
    }
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
