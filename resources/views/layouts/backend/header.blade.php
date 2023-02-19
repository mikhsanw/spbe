<header class="main-header">
	<div class="d-flex align-items-center logo-box">
		<a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block mx-10 push-btn" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="{{url('/home')}}" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
		  	  <span class="light-logo"><img src="{{ $aplikasi->file_logo?asset($aplikasi->file_logo->url_stream):asset($aplikasi->file_favicon->url_stream) }}" width="30px" class="text-left" alt="logo"> {{$aplikasi->singkatan??''}}</span>
			  <span class="dark-logo"><img src="{{ $aplikasi->file_logo?asset($aplikasi->file_logo->url_stream):asset($aplikasi->file_favicon->url_stream) }}" width="30px" class="text-left" alt="logo"> {{$aplikasi->singkatan??''}}</span>
			  
			  <!-- <span class="light-logo"><img src="{{url('backend/images/logo-light-text.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{url('backend/images/logo-light-text.png')}}" alt="logo"></span> -->
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-10">
		<div class="container">
		  <!-- Sidebar toggle button-->
		  <div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group nav-item d-md-none">
					<a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu" role="button">
						<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
					</a>
				</li>
				<li class="btn-group nav-item d-none d-xl-inline-block">
					<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded full-screen" title="Full Screen">
						<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
			</ul> 
		  </div>

		  <div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">		  
				
			  <!-- Notifications -->
			  <li class="dropdown notifications-menu">
				<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
				  <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
				</a>
				<ul class="dropdown-menu animated bounceIn">

				  <li class="header">
					<div class="p-20">
						<div class="flexbox">
							<div>
								<h4 class="mb-0 mt-0">Notifications</h4>
							</div>
							<div>
								<a href="#" class="text-danger">Clear All</a>
							</div>
						</div>
					</div>
				  </li>

				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu sm-scrol">
					  <li>
						<a href="#">
						  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer">
					  <a href="#">View all</a>
				  </li>
				</ul>
			  </li>	

			  <!-- User Account-->
			  <li class="dropdown user user-menu">
				<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
					<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
				</a>
				<ul class="dropdown-menu animated flipInX">
				  <li class="user-body">
					 <a class="dropdown-item" href="{{url('user/ubahpassword/'.$user->id)}}"><i class="ti-user text-muted mr-2"></i> Ubah Password</a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item keluar" href="#keluar"><i class="ti-lock text-muted mr-2"></i>  {{ __('Logout') }}
                                    </a>

				  </li>
				</ul>
			  </li>	

			  <!-- Control Sidebar Toggle Button -->
			  <li>
				  <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
					<i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
				  </a>
			  </li>

			</ul>
		  </div>
		</div>
    </nav>
  </header>