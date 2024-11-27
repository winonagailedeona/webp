	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('home') }}">
								<img src="{{ asset('images/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="{{ route('home') }}">Home</a>
								</li>
								<li><a href="{{ route('about') }}">About</a></li>
								<li><a href="{{ route('news') }}">News</a>
								</li>
								<li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a><i class="fa fa-user"></i></a>
									<ul class="sub-menu">
										<li><a href="{{ route('login') }}">Login</a></li>
										<li><a href="single-{{ route('register') }}">Register</a></li>
									</ul>
								</li>
							</ul>
						</nav>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->