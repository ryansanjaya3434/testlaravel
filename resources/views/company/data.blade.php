<html>
<head>
	<title>PRINT DATA Employee</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
    <img src="/storage/app/company/{{ $company->logo }}" width="100" height="100">
		<h5>List Employee From {{$company->nama}}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($company->employee as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->email}}</td>
				<td>{{$p->jk}}</td>
				<td>{{$p->alamat}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>