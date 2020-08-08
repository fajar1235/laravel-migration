@extends('layouts.master')

@section('content')
<div class="mt-3 ml-3">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Pertanyaan Table</h3>
        </div>

    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success')}}
        </div>
      @endif
      <a class="btn btn-primary mb-2" href="/pertanyaan/create">create new question</a>
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">id</th>
              <th>nama_lengkap</th>
              <th>isi</th>
              <th style="width: 40px">Action</th>
            </tr>
          </thead>
          <tbody>
              @forelse($pertanyaan as $key => $value)
              <tr>
                <td> {{ $key + 1 }} </td>
                <td> {{ $value->nama_lengkap }} </td>
                <td> {{ $value->isi }} </td>
                <td style ="display: flex;">
                  <a href="/pertanyaan/{{$value->id}}" class="btn btn-info btn-sm" > show</a>
                  <a href="/pertanyaan/{{$value->id}}/edit" class="btn btn-default btn-sm" > edit</a>
                  <form action="/pertanyaan/{{$value->id}}" method="post">
                  @csrf
                  @method('DELETE')
                      <input type="submit" value="delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr> 
              @empty
              <tr>
                <td colspan="4" align="center">No data</td>
              </tr>
              @endforelse
            </tbody>
        </table>
      </div>   
</div>
</div>
@endsection