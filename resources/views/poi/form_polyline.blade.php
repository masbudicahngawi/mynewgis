@extends('master')

@section('isi')

<div class="container mt-3 p-3">
	<h3>Daftar Polyline</h3>

	<table class="table table-bordered table-sm table-dark table-striped">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Deskripsi</th>
			<th class="text-center">Aksi</th>
		</tr>

		@foreach($data as $key => $value)

		<tr>
			<td class="text-center">{{ $key+ $data->firstItem() }}</td>
			<td>{{ $value->nama }}</td>
			<td>{{ $value->deskripsi }}</td>
			<td class="text-center"><a href="{{ route('polyline.detail', $value->id) }}">Detail</a></td>
		</tr>

		@endforeach

	</table>

	<div class="d-flex justify-content-center">
		{{-- {!! $lagus->links() !!} --}}
		{!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
	</div>
</div>

@endsection

