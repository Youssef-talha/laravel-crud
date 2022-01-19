@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add an Employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="/employees/store" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-4">    
              <label for="nom">Name:</label>
              <input type="text" class="form-control" name="nom"/>
          </div>

          <div class="form-group  mb-4">
              <label for="tel">Phone number :</label>
              <input type="text" class="form-control" name="tel"/>
          </div>

          <div class="form-group mb-4">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group mb-4">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group mb-4">
              <label for="cv">CV:</label>
              <input type="file" class="form-control" name="cv"/>
          </div>                         

          <button type="submit" class="btn btn-primary">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection