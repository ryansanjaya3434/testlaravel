@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('company.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <table class="table">
            <th align=center><img src="/storage/app/company/{{ $company->logo }}" width="100" height="100"></th>
            <th align=center>{{ $company->nama }}</th>
            <th align=center>{{ $company->email }}</th>
            <th align=center>{{ $company->website }}</th>
            <th align=center>{{ $company->employee->count() }}</th>
    </table>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
        </tr>
        @foreach ($company->employee as $e)
       <tr>
            <td>{{ ++$i }}</td>
            <td>{{$e->nama}}</td>
            <td>{{$e->email}}</td>
            <td>{{$e->jk}}</td>
        </tr>
        @endforeach
        </table>
        <div class="pull-left">
            <a href="{{action('App\Http\Controllers\CompanyController@downloadPDF', $company->id)}}" class="btn btn-primary btn-danger"> Print</a>
            </div>
    </div>
    
</div>
    @endsection