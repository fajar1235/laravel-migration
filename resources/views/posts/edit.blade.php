@extends('layouts.master')

@section('content')
<div class="ml-3 mt-3">
  <div class="card card-primary">
       <div class="card-header">
         <h3 class="card-title">Edit Post {{$pertanyaan->id}}</h3>
       </div>
        <!-- /.card-header -->
        <!-- form start -->
         <form role="form" action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
         @csrf 
         @method('PUT')
           <div class="card-body">
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value=" {{ old('nama_lengkap', $pertanyaan->nama_lengkap)}}" placeholder="Enter Nama" required>
                  @error('nama_lengkap')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              <div class="form-group">
                  <label for="isi">Isi</label>
                  <input type="text" class="form-control" id="isi" name="isi" value=" {{ old('isi', $pertanyaan->isi)}}" placeholder="Masukkan Isi" required>
                  @error('isi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>  
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
          </form>
  </div>
</div>  
@endsection

