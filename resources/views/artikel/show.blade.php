@extends('layouts.master')

@section('content')
	<div class="card card-dark">
		<div class="card-body">
			<h4>
				judul : {{$artikel->title}}
			</h4>
			<p>
				Slug: {{$artikel->slug}}
			</p>
			<p>
				{{$artikel->content}}
			</p>
			<p>
				@foreach($artikel->tag() as $tag)
					<a href="{{url('tag', $tag)}}" class="btn btn-success">{{$tag}}</a>
				@endforeach
			</p>
		</div>
	</div>
@endsection