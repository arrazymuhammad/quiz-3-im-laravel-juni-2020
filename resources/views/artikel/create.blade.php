@extends('layouts.master')

@section('content')
	<div class="card card-dark">
		<div class="card-header bg-dark">
			<div class="card-title text-white">
				Membuat Artikel Baru
			</div>
		</div>
		<div class="card-body">
			<form action="{{url('artikel')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="" class="control-label">Judul</label>
					<input type="text" name="title" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="" class="control-label">Tags (*pisahkan dengan koma. misal : tag1, tag2, tag3)</label>
					<input type="text" name="tags" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="" class="control-label">Isi</label>
					<textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection