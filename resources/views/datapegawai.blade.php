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
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <a href="/tambahpegawai" type="button" class="btn btn-primary">Tambah +</a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/pegawai/search" method="GET">
          <input type="text" id="search" name="search" class="form-control">
        </form>
      </div>  
    </div>
  
    <div class="row">
  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">NIM</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Religion</th>
                <th scope="col">Mobile</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
  
            @php
               $no = 1; 
            @endphp
  
            @foreach ($data as $index => $row)
            <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>
                <img src="{{ asset('employeePhoto/'.$row->photo) }}" alt="" style="width: 50px;">
                </td>
                <td>{{ $row->nim }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->dob }}</td>
                <td>{{ $row->gender }}</td>
                <td>{{ $row->age }}</td>
                <td>{{ optional($row->religion)->name }}</td>
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->created_at->diffForHumans() }}</td>
  
                <td><a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete</a>
                    <a href="tampilkandata/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                </td>
                
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
          </div> --}}
          </div><br><br>
  
          {{ $data->links() }}


  
    </div>
  </div>
</div>
@endsection

@push('scripts')
     <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <!--
 
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 -->
</body>

<script>

 $('.delete').click(function(){
   var employeeId = $(this).attr('data-id');
   var employeeName = $(this).attr('data-name');

   swal({
title: "Are you sure?",
text: "You will delete employee data by id "+employeeName+" !",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
 window.location = "/deletedata/"+employeeId+""
 swal("Data deleted successfully!", {
   icon: "success",
 });
} else {
 swal("Data canceled deleted!");
}
});
 });



</script>

<script>
 @if (Session::has('success'))
 toastr.success("{{ Session::get('success') }}")
 @endif

</script>
@endpush