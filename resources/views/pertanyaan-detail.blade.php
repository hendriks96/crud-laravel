@extends('layouts.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Pertanyaan</h3>
            </div>
            <div class="card-body">
                <div class="timeline-item">
                    <h3 class="timeline-header">{{$pertanyaan->judul}}</h3>
                    <div class="timeline-body">
                    {{$pertanyaan->isi}}
                    </div>
                    <br>
                    <div class="timeline-footer">
                        <button class="btn btn-primary btn-sm" onclick="toEdit({{$pertanyaan->id_pertanyaan}});">Edit</button>
                        <form action="http://localhost/crud-laravel/public/pertanyaan/{{$pertanyaan->id_pertanyaan}}"style="display: inline;" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                        </form>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="time"><i class="fas fa-clock"></i> Created At : {{$created}}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="time"><i class="fas fa-clock"></i> Updated At : {{$updated}}</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jawaban</h3>
            </div>
            <div class="card-body">
                <div class="timeline-item">
                    @if (count($jawaban) > 0)
                        @foreach ($jawaban as $item)
                        <br>
                        <span class="time"><i class="fas fa-clock"></i> Created At : {{$item['created_at']}}</span>

                        <div class="row">
                            <div class="col-md-1">
                                <i class="fas fa-comments bg-yellow"></i>
                            </div>
                            <div class="col-md-11">
                            <div class="color-palette-set">
                                <div class="timeline-body">
                                {{$item['isi']}}
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    function toEdit(id){
        window.open(id+'/edit', '_self');
    }
</script>

@endpush
