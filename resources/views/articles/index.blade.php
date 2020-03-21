@extends('layout')


@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            @forelse ($articles as $article)
                <div class="title">
                    <h2> <a href="/articles/{{ $article->id }}">{{ $article->title }} </a></h2>
                </div>

            @empty
                <p>No relevant Articles </p>
            @endforelse
		</div>

	</div>
</div>


@endsection
