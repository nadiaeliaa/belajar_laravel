@extends('layout.admin')

@section('content')
<body>
  <br>
  <br>
  <br>
  <h1 class="text-center mb-4"> Edit Data Mahasiswa</h1>

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                  @csrf 

                  @if ($data->photo)
                    <div class="mb-3">
                      <img src="{{ asset('employeePhoto/'.$data->photo) }}" alt="" style="max-width: 100px;max-height: 100px">
                    </div>
                  @endif
                  
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Insert Photo</label>
                    <input type="file" value="{{ $data->photo }}" name="photo" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input type="text" value="{{ $data->nim }}" value="Disabled readonly input" name="nim" class="form-control" id="exampleInputEmail1" aria-label="Disabled input example" disabled readonly aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" value="{{ $data->address }}" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                    <input type="date" value="{{ $data->dob }}" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('dob')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gender</label><br>
                    <select class="form-select" value="{{ $data->gender }}" name="gender" aria-label="Default select example">
                      <option selected>{{ $data->gender }}</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Age</label>
                    <input type="text" value="{{ $data->age }}" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Religion</label><br>
                    <input class="form-control" type="text" class="form-select" value="{{ optional($data->religion)->name }}" aria-label="Disabled input example" disabled>                   
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                    <input type="text" value="{{ $data->mobile }}"name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
                <br>
                <br>
              </div>
          </div>
      </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
@endsection