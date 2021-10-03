@extends('layouts.app')
@push('style')
	<style type="text/css">
		.my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}">Add New Employee</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->nama }}</td>
            <td>{{ $employee->company->nama}}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->jk }}</td>
            <td>
                <form action="{{ route('employee.destroy',$employee) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('employee.show',$employee) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{route('employee.edit',$employee->id) }}" >Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
    {!! $employees->links() !!}
</div>
</div>
</div>

@endsection