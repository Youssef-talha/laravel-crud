@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update an employee</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post"  action="{{ url('/employees/update', ['id' => $employee->id]) }}"  >
            @csrf
            <div class="form-group">

                <label for="nom">Name:</label>
                <input type="text" class="form-control" name="nom" value={{ $employee->nom }} />
            </div>

            <div class="form-group">
                <label for="tel">Phone number:</label>
                <input type="text" class="form-control" name="tel" value={{ $employee->tel }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $employee->email }} />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" value={{ $employee->password }} />
            </div>
            <div class="form-group">
                <label for="cv">Country:</label>
                <input type="text" class="form-control" name="cv" value={{ $employee->cv }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection