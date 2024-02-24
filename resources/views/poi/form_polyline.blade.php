@extends('master')

@section('isi')

<div class="container mt-3 p-3">
	<h3>Daftar Polyline</h3>

	<table class="table table-bordered table-sm table-dark table-striped">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Koordinat Polygon</th>
			<th class="text-center">Aksi</th>
		</tr>

		@foreach($data as $key => $value)

		<tr>
			<td>{{ $key+1 }}</td>
			<td>{{ $value->nama }}</td>
			<td>{{ $value->koordinat_polygon }}</td>
			<td><a href="{{ route('polyline.detail', $value->id) }}">Detail</a></td>
		</tr>

		@endforeach

	</table>
</div>

@endsection

