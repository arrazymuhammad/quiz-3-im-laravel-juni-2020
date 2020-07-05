@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-default">
				<div class="card-header">
					<div class="float-right">
						<a href="{{url('artikel/create')}}" class="btn btn-dark"><i class="fa fa-plus"></i> Tambah Artikel</a>
					</div>
					<div class="card-title">
						<h4>
							Daftar Artikel
							@if(isset($tag)) (tag : '{{$tag}}') @endif
						</h4>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead class="bg-dark">
							<th class="text-white" width="50px">No</th>
							<th class="text-white" width="150px">Aksi</th>
							<th class="text-white">Judul</th>
							<th class="text-white" width="350px">Tags</th>
							<th class="text-white" width="150px">Tanggal Post</th>
						</thead>
						<tbody>
							@foreach($articles as $article)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<a href="{{url('artikel', $article->uuid)}}" class="btn btn-secondary"><i class="fa fa-info"></i></a>
										<a href="{{url('artikel', $article->uuid)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<form action="{{url('artikel', $article->uuid)}}" method="post" style="display:inline">
											@csrf
											@method('delete')
											<button class="btn btn-danger" onclick="return confirm('yakin menghapus data ini?')"><i class="fa fa-trash"></i></button>
										</form>
									</td>
									<td>{{$article->title}}</td>
									<td>
										@foreach($article->tag() as $tag)
											<a href="{{url('tag', $tag)}}" class="badge badge-dark text-white">{{$tag}}</a>
										@endforeach
									</td>
									<td>{{$article->created_at->diffForHumans()}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script>
	    Swal.fire({
	        title: 'Berhasil!',
	        text: 'Memasangkan script sweet alert',
	        icon: 'success',
	        confirmButtonText: 'Cool'
	    })
	</script>
@endpush