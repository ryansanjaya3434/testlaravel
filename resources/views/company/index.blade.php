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
                <a class="btn btn-success" href="{{ route('company.create') }}">Add New Company</a>
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
            <th width="100px">Logo</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Total Employees</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/storage/app/company/{{ $company->logo }}" width="100" height="100"></td>
            <td>{{ $company->nama }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>{{ $company->employee->count() }}</td>
            <td>
                <form action="{{ route('company.destroy',$company) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('company.show',$company) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{route('company.edit',$company->id) }}" >Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
    {!! $companies->links() !!}
</div>
    </div>
    </div>
</div>

@endsection