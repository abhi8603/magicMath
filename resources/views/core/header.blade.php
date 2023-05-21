<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | <?php echo school_details(Auth::user()->school_id, 'school_name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <style>
        .error {
            color: red;

        }
        	.circle {
			font-size: x-large;
			padding: 20px;
			background: #e91e63;
			border-radius: 32px;
			color: #fff
		}

    </style>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
		<!--Bootstrap css -->
		<link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('assets/css/dark.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ URL::asset('assets/css/animated.css') }}" rel="stylesheet" />

		<!--Sidemenu css -->
       <link href="{{ URL::asset('assets/css/sidemenu.css') }}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{ URL::asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet" />

		<!-- Simplebar css -->
		<link rel="stylesheet" href="{{ URL::asset('assets/plugins/simplebar/css/simplebar.css') }}">

        <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
		<link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />


		<!-- INTERNAL Select2 css -->
		<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

	    <!-- Color Skin css -->
		<link id="theme" href="{{ URL::asset('assets/colors/color1.css') }}" rel="stylesheet" type="text/css"/>

   </head>

<body class="app sidebar-mini">
<div id="global-loader" >
			<img src="{{ URL::asset('assets/images/svgs/loader.svg') }}" alt="loader">
		</div>
    <div id="layout-wrapper">
	<div class="page">
			<div class="page-main">
            @include('core.sidebar')
            <div class="app-content main-content">
					<div class="side-app">

						<!--app header-->
						<div class="app-header header">
							<div class="container-fluid">
								<div class="d-flex">
									<a class="header-brand" href="{{url('dashboard')}}">
										<img src="<?php echo asset(school_details(Auth::user()->school_id, 'logo')); ?>" class="header-brand-img desktop-lgo" alt="Admintro logo">
										<img src="<?php echo asset(school_details(Auth::user()->school_id, 'logo')); ?>" class="header-brand-img dark-logo" alt="Admintro logo">
										<img src="<?php echo asset(school_details(Auth::user()->school_id, 'logo')); ?>" class="header-brand-img mobile-logo" alt="Admintro logo">
										<img src="<?php echo asset(school_details(Auth::user()->school_id, 'logo')); ?>" class="header-brand-img darkmobile-logo" alt="Admintro logo">
									</a>
									<div class="app-sidebar__toggle" data-toggle="sidebar">
										<a class="open-toggle" href="#">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
										</a>
									</div>
									<div class="mt-1">
										<form class="form-inline">
											<div class="search-element">
												<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
												<button class="btn btn-primary-color" type="submit">
													<svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
														<path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
													</svg>
												</button>
											</div>
										</form>
									</div><!-- SEARCH -->
									<div class="d-flex order-lg-2 ml-auto">
										<a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
											<svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
												<path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
											</svg>
										</a>
										<div class="dropdown   header-fullscreen" >
											<a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 4L8 4 8 8 4 8 4 10 10 10zM8 20L10 20 10 14 4 14 4 16 8 16zM20 14L14 14 14 20 16 20 16 16 20 16zM20 8L16 8 16 4 14 4 14 10 20 10z"/></svg>
											</a>
										</div>
										<div class="dropdown header-message">
											<a class="nav-link icon" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20,2H4C2.897,2,2,2.897,2,4v12c0,1.103,0.897,2,2,2h3v3.767L13.277,18H20c1.103,0,2-0.897,2-2V4C22,2.897,21.103,2,20,2z M20,16h-7.277L9,18.233V16H4V4h16V16z"/><path d="M7 7H17V9H7zM7 11H14V13H7z"/></svg>
												<span class="badge badge-success side-badge">3</span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
												<div class="dropdown-header">
													<h6 class="mb-0">Messages</h6>
													<span class="badge badge-pill badge-primary ml-auto">View all</span>
												</div>
												<div class="header-dropdown-list message-menu" id="message-menu">
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/1.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Jack Wright</h6>
																	<p class="fs-13 mb-1">All the best your template awesome</p>
																	<div class="small text-muted">
																		3 hours ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/2.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Lisa Rutherford</h6>
																	<p class="fs-13 mb-1">Hey! there I'm available</p>
																	<div class="small text-muted">
																		5 hour ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/3.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Blake Walker</h6>
																	<p class="fs-13 mb-1">Just created a new blog post</p>
																	<div class="small text-muted">
																		45 mintues ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/4.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Fiona Morrison</h6>
																	<p class="fs-13 mb-1">Added new comment on your photo</p>
																	<div class="small text-muted">
																		2 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/6.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Stewart Bond</h6>
																	<p class="fs-13 mb-1">Your payment invoice is generated</p>
																	<div class="small text-muted">
																		3 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/7.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Faith Dickens</h6>
																	<p class="fs-13 mb-1">Please check your mail....</p>
																	<div class="small text-muted">
																		4 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
												</div>
												<div class=" text-center p-2 border-top">
													<a href="#" class="">See All Messages</a>
												</div>
											</div>
										</div>
										<div class="dropdown header-notify">
											<a class="nav-link icon" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707C3.105 15.48 3 15.734 3 16v2c0 .553.447 1 1 1h16c.553 0 1-.447 1-1v-2c0-.266-.105-.52-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707C6.895 14.52 7 14.266 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zM12 22c1.311 0 2.407-.834 2.818-2H9.182C9.593 21.166 10.689 22 12 22z"/></svg>
												<span class="pulse "></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
												<div class="dropdown-header">
													<h6 class="mb-0">Notifications</h6>
													<span class="badge badge-pill badge-primary ml-auto">View all</span>
												</div>
												<div class="notify-menu">
													<a href="#" class="dropdown-item border-bottom d-flex pl-4">
														<div class="notifyimg bg-info-transparent text-info"> <i class="ti-comment-alt"></i> </div>
														<div>
															<div class="font-weight-normal1">Message Sent.</div>
															<div class="small text-muted">3 hours ago</div>
														</div>
													</a>
													<a href="#" class="dropdown-item border-bottom d-flex pl-4">
														<div class="notifyimg bg-primary-transparent text-primary"> <i class="ti-shopping-cart-full"></i> </div>
														<div>
															<div class="font-weight-normal1"> Order Placed</div>
															<div class="small text-muted">5  hour ago</div>
														</div>
													</a>
													<a href="#" class="dropdown-item border-bottom d-flex pl-4">
														<div class="notifyimg bg-warning-transparent text-warning"> <i class="ti-calendar"></i> </div>
														<div>
															<div class="font-weight-normal1"> Event Started</div>
															<div class="small text-muted">45 mintues ago</div>
														</div>
													</a>
													<a href="#" class="dropdown-item border-bottom d-flex pl-4">
														<div class="notifyimg bg-success-transparent text-success"> <i class="ti-desktop"></i> </div>
														<div>
															<div class="font-weight-normal1">Your Admin lanuched</div>
															<div class="small text-muted">1 daya ago</div>
														</div>
													</a>
												</div>
												<div class=" text-center p-2 border-top">
													<a href="#" class="">View All Notifications</a>
												</div>
											</div>
										</div>
										<div class="dropdown profile-dropdown">
											<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
												<span>
                                                @if(Auth::user()->image!="" || Auth::user()->image!=null)
													<img src="<?php echo asset(Auth::user()->image); ?>" alt="<?php echo Auth::user()->name; ?>" class="avatar avatar-md brround">
                                                    @else
                                                    <img src="<?php echo asset(school_details(Auth::user()->school_id, 'logo')); ?>" alt="<?php echo Auth::user()->name; ?>" class="avatar avatar-md brround">
                                                    @endif
                                                </span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
												<div class="text-center">
													<a href="#" class="dropdown-item text-center user pb-0 font-weight-bold"><?php echo Auth::user()->name; ?></a>
													<span class="text-center user-semi-title">{{ Auth::user()->mobile }}</span>
													<div class="dropdown-divider"></div>
												</div>
											
												
												
											<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex">
													<svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24">
														<g>
															<rect fill="none" height="24" width="24" />
														</g>
														<g>
															<path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z" />
														</g>
													</svg>
													Sign out</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
												</form>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@yield('content')

					</div>
				</div>
       
    </div>
    </div>
	<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2020 <a href="#">Abhijeet</a>. Designed by <a href="#">abhi</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
    </div>
  
    <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
    <input type="hidden" id="_url" value="{{url('/')}}">
	@csrf
    {{--Content File End Here--}}
  	<!-- Jquery js-->
		<script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js') }}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{ URL::asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!--Othercharts js-->
		<script src="{{ URL::asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

		<!-- Circle-progress js-->
		<script src="{{ URL::asset('assets/js/circle-progress.min.js') }}"></script>

		<!-- Jquery-rating js-->
		<script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

		<!--Sidemenu js-->
		<script src="{{ URL::asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- P-scroll js-->
		<script src="{{ URL::asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/p-scrollbar/p-scroll.js') }}"></script>

	
		<!-- INTERNAL Select2 js -->
		<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/select2.js') }}"></script>

		<!--INTERNAL Moment js-->
		<script src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>

		<!--INTERNAL Index js-->
		<script src="{{ URL::asset('assets/js/index1.js') }}"></script>


		<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>


        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>

        <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/datatables.js') }}"></script>


		<!-- Simplebar JS -->
		<script src="{{ URL::asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

		<!-- Custom js-->
		<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve',
            });
            // var table = $('.table').DataTable({
            //     "bPaginate": false,
            //     'bInfo': false
            // });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
    </script>
  
    <!--live chat script here-->
    {{--Custom JavaScript Start--}}

    @yield('script')

    {{--Custom JavaScript End Here--}}
</body>

</html>