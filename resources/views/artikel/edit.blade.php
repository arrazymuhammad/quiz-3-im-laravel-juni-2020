@extends('layouts.master')

@section('content')
	<div class="card card-dark">
		<div class="card-header bg-dark">
			<div class="card-title text-white">
				Ubah Artikel
			</div>
		</div>
		<div class="card-body">
			<form action="{{url('artikel', $artikel->uuid)}}" method="post">
				@csrf
				@method('put')
				<div class="form-group">
					<label for="" class="control-label">Judul</label>
					<input type="text" name="title" value="{{$artikel->title}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="" class="control-label">Tags (*pisahkan dengan koma. misal : tag1, tag2, tag3)</label>
					<input type="text" name="tags" value="{{implode(", ",$artikel->tag())}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="" class="control-label">Isi</label>
					<textarea name="content" cols="30" rows="10" class="form-control">{{$artikel->content}}</textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection