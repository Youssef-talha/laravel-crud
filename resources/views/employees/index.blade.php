<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
@extends('base')

@section('main')
<div class="row">
<div>
    <a style="margin: 19px;" href="{{ url('employees/create')}}" class="btn btn-primary">New employee</a>
</div>
<div class="col-sm-12">
    <h1 class="display-3">Employees</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Phone number</td>
          <td>Email</td>
          <!-- <td>Password</td> -->
          <!-- <td>CV</td> -->
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->nom}} </td>
            <td>{{$employee->tel}} </td>
            <td>{{$employee->email}}</td>
            <!-- <td>{{$employee->password}}</td> -->
            <!-- <td>{{$employee->cv}}

            <img src="{{url('employees/downloadFile', $employee->cv)}}" />
            </td> -->
            <td>
                <a href="{{ url('/employees/edit',$employee->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ url('/employees/delete', $employee->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection