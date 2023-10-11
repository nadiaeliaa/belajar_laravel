@extends('layout.admin')

@push('css')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Agama</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Agama</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <a href="/tambahagama" type="button" class="btn btn-primary">Tambah +</a>
  
    <div class="row mt-4">
  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Religion Name</th>
                {{-- <th scope="col">Action</th> --}}
              </tr>
            </thead>
            <tbody>
  
            @php
               $no = 1; 
            @endphp
  
            @foreach ($data as $index => $row)
            <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>{{ $row->name }}</td>
                
                {{-- button delete dan edit --}}
                {{-- <td><a href="deletedataagama/{{ $row->id }}" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete</a>
                    <a href="tampilkandataagama/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                </td> --}}
                
            </tr>
            @endforeach
              
            </tbody>
          </table>
  
          {{-- <div class="container">
          <a href="/exportpdf" type="button" class="btn btn-info">Export PDF</a>
          <a href="/exportexcel" type="button" class="btn btn-success">Export Excel</a>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Import Data
          </button>
  
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Masukkan File Excel</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
  
                <form action="/importexcel" method="POST" enctype="multipart/form-data">
                  @csrf
      
                  <div class="modal-body">
                   <div class="formgroup">
                    <input type="file" name="file" required>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
  
              </div>
            </div>
          </div>
          </div><br><br> --}}
  
          {{ $data->links() }}


  
    </div>
  </div>
</div>
@endsection

@push('scripts')
</body>

@endpush