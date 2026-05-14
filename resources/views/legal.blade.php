@extends('layouts.master')

@section('title', ($page->title ?? 'Page') . ' — ' . config('app.name', 'MDM'))

@section('content')
	<main id="content" class="wrapper layout-page">
		<section class="page-title z-index-2 position-relative">
			<div class="bg-body-secondary">
				<div class="container">
					<nav class="py-4 lh-30px" aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center py-1">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="text-center py-13">
				<div class="container">
					<h2 class="mb-0">{{ $page->title }}</h2>
				</div>
			</div>
		</section>

		<section class="container py-14 py-lg-18" style="max-width: 920px">
			<div class="bg-body p-8 p-lg-10 rounded-4 shadow-sm">
				{!! $page->content !!}
			</div>
		</section>
	</main>
@endsection

