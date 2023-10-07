@extends('layout.admin')

@section('content')
<body>
  <br>
  <br>
  <h1 class="text-center mb-4 mt-5">Tambah Data Pegawai</h1>

  <div class="container mb-5">
      <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf 
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('dob')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gender</label><br>
                    <select class="form-select" name="gender" aria-label="Default select example">
                      <option selected>Choose Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama</label><br>
                    <select class="form-select" name="id_religions" aria-label="Default select example">
                      <option selected>Choose Religion</option>
                      @foreach ($dataagama as $data)
                      <option value="{{ $data->id }}">{{ $data->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('mobile')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Insert Photo</label>
                    <input type="file" name="photo" class="form-control">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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