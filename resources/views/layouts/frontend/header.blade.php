<div class="loader-content">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="sk-circle">
				<div class="sk-circle1 sk-child"></div>
				<div class="sk-circle2 sk-child"></div>
				<div class="sk-circle3 sk-child"></div>
				<div class="sk-circle4 sk-child"></div>
				<div class="sk-circle5 sk-child"></div>
				<div class="sk-circle6 sk-child"></div>
				<div class="sk-circle7 sk-child"></div>
				<div class="sk-circle8 sk-child"></div>
				<div class="sk-circle9 sk-child"></div>
				<div class="sk-circle10 sk-child"></div>
				<div class="sk-circle11 sk-child"></div>
				<div class="sk-circle12 sk-child"></div>
			</div>
		</div>
	</div>
</div>


<div class="navbar-area">

	<div class="mobile-nav align-items-center">
		@if($aplikasi->file_logo)
		<a href="{{url('/')}}" class="logo">
			<img src="{{ URL::asset($aplikasi->file_logo->url_stream) }}" height="30px" alt="logo">
		</a>
		@endif
	</div>

	<div class="main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				@if($aplikasi->file_logo)
				<a href="{{url('/')}}" class="navbar-brand">
					<img src="{{ URL::asset($aplikasi->file_logo->url_stream) }}" height="50px" alt="logo">
				</a>
				@endif
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav m-auto">
						@foreach($menu as $key => $val)
						<li class="nav-item">
							<a class="nav-link {{is_string($val) ? '' : 'dropdown-toggle'}}" href="{{is_string($val) ? $val : '#'}}">{{$key}}</a>
							@if(!is_string($val))
							<ul class="dropdown-menu">
								@foreach($val as $keydata => $data)
									@include('layouts.frontend.menu',['data'=>$data])
								@endforeach
							</ul>
							@endif
						</li>
						@endforeach
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
