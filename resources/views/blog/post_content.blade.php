@extends('frontend.content')

@section('isi')

<div class="container">
	@foreach ($data as $content)
	<div class="section-row">
		<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url({{ asset($content->image) }});"  data-stellar-background-ratio="0.5"></div>
			{{-- <div class="page-header-bg" style="background-image: url({{ asset('assets/blog/img/header-1.jpg') }});"  data-stellar-background-ratio="0.5"></div> --}}
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $content->category->name }}</a>
						</div>
						<h1>{{$content->title}}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $content->users->name }}</a></li>
							<li>{{ $content->created_at->format("d F, Y") }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</div>
	
	
	<div class="col-md-8">
		
		<div class="section-row">
			
			<p>{!! $content->content !!}</p>
	
			
		</div>
		
	
		{{-- <div class="section-row">
			<blockquote class="blockquote">
				<p>Ei prima graecis consulatu vix, per cu corpora qualisque voluptaria. Bonorum moderatius in per, ius cu albucius voluptatum. Ne ius torquatos dissentiunt. Brute illum utroque eu quo. Cu tota mediocritatem vis, aliquip cotidieque eu ius, cu lorem suscipit eleifend sit.</p>
				<footer class="blockquote-footer">John Doe</footer>
			</blockquote>
		</div> --}}
		
	
	</div>
	@endforeach
@endsection

