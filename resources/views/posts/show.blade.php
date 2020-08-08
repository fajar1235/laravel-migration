@extends('layouts.master')

@section('content')
<div class="mt-3 ml-3 mb-3">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pertanyaan Table</h3>
        </div>

        <div class="card-body">
        <h4>{{ $pertanyaan->nama_lengkap }}</h4>
        <p>{{ $pertanyaan->isi}}</p>
    </div>
    
</div>  
</div>  
@endsection