
				<header class="app-header">

					<!-- Start::main-header-container -->
					<div class="main-header-container container-fluid">

						<!-- Start::header-content-left -->
						<div class="header-content-left">

							<!-- Start::header-element -->
							<div class="header-element">
								<div class="horizontal-logo">
									<a href="{{url('/')}}" class="header-logo">
										<img src="{{asset('build/assets/img/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
										<img src="{{asset('build/assets/img/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
									</a>
								</div>
							</div>
							<!-- End::header-element -->
							<!-- Start::header-element -->
							<div class="header-element">
								<!-- Start::header-link -->
								<div class="">
									<a class="sidebar-toggle sidemenu-toggle header-link" data-bs-toggle="sidebar" href="javascript:void(0);">
									<span class="sr-only">Toggle Navigation</span>
									<i class="ri-arrow-right-circle-line header-icon"></i>
									</a>
								</div>
								<!-- <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a> -->
								<!-- End::header-link -->
							</div>
							<!-- End::header-element -->

						</div>
						<!-- End::header-content-left -->

						<!-- Start::header-content-right -->
						<div class="header-content-right">
							<!-- Start::header-element -->
							{{--<div class="header-element header-search">
								<!-- Start::header-link -->
								<a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
									<i class="ri-search-2-line header-link-icon"></i>
								</a>
								<!-- End::header-link -->
							</div>--}}
							<!-- End::header-element -->

							<!-- Start::header-element -->
							<div class="header-element header-theme-mode">
								<!-- Start::header-link|layout-setting -->
								<a href="javascript:void(0);" class="header-link layout-setting">
									<span class="light-layout">
										<!-- Start::header-link-icon -->
									<i class="ri-moon-line header-link-icon"></i>
										<!-- End::header-link-icon -->
									</span>
									<span class="dark-layout">
										<!-- Start::header-link-icon -->
									<i class="ri-sun-line header-link-icon"></i>
										<!-- End::header-link-icon -->
									</span>
								</a>
								<!-- End::header-link|layout-setting -->
							</div>
							<!-- End::header-element -->

							<!-- Start::header-element -->
							<div class="header-element header-fullscreen">
								<!-- Start::header-link -->
								<a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
									<i class="ri-fullscreen-line full-screen-open header-link-icon"></i>
									<i class="ri-fullscreen-line full-screen-close header-link-icon d-none"></i>
								</a>
								<!-- End::header-link -->
							</div>
							<!-- End::header-element -->



							<!-- Start::header-element -->
							<div class="header-element header-shortcuts-dropdown">
								<!-- Start::header-link|dropdown-toggle -->
								<a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="notificationDropdown" aria-expanded="false">
									<i class="ri-bookmark-line header-link-icon"></i>
								</a>
								<!-- End::header-link|dropdown-toggle -->
								<!-- Start::main-header-dropdown -->
								<div class="main-header-dropdown header-shortcuts-dropdown dropdown-menu pb-0 dropdown-menu-end" aria-labelledby="notificationDropdown">
									<div class="header-dropdown bg-primary text-fixed-white rounded-top">
										<div class="d-flex align-items-center justify-content-between">
											<p class="mb-0 fs-15 fw-semibold">Shortcuts</p>
										</div>
									</div>
									<div class="dropdown-divider mb-0"></div>
									<div class="main-header-shortcuts p-2" id="header-shortcut-scroll">
										<div class="row drop-icon-wrap my-2  p-2">
											<!-- <div class="col-4">
												<a href="javascript:void(0);" class=" d-grid justify-content-center    rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-primary-transparent rounded-2 mx-auto">
															<i class="ri ri-mail-line fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">Mail Box</span>
													</div>
												</a>
											</div>
											<div class="col-4">
												<a href="javascript:void(0);" class=" d-grid justify-content-center mb-0   rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-secondary-transparent rounded-2 mx-auto">
															<i class="ri ri-chat-2-line fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">Chat</span>
													</div>
												</a>
											</div>
											<div class="col-4">
												<a href="javascript:void(0);" class=" d-grid justify-content-center   rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-warning-transparent rounded-2 mx-auto">
															<i class="ri ri-task-line  fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">Tasks</span>
													</div>
												</a>
											</div>
											<div class="col-4 mt-3">
												<a href="javascript:void(0);" class=" d-grid justify-content-center    rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-danger-transparent rounded-2 mx-auto">
															<i class="ri ri-calendar-event-line  fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">calendar</span>
													</div>
												</a>
											</div>
											<div class="col-4 mt-3">
												<a href="javascript:void(0);" class=" d-grid justify-content-center  rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-info-transparent rounded-2 mx-auto">
															<i class="ri ri-file-copy-2-line   fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">FileManager</span>
													</div>
												</a>
											</div> -->
											<div class="col-4 mt-3">
												<a href="javascript:void(0);" class=" d-grid justify-content-center rounded p-1 ">
													<div class="main-grid">
														<span class="avatar p-2  bg-success-transparent rounded-2 mx-auto">
															<i class="ri ri-group-line   fs-24"></i>
														</span>
														<span class="mt-2 fs-12  fw-semibold text-center">Leads</span>
													</div>
												</a>
											</div>
										</div>
									</div>
									<!-- <div class="p-3 border-top">
										<div class="d-grid">
											<a href="javascript:void(0);" class="btn btn-primary">View All</a>
										</div>
									</div> -->
								</div>
								<!-- End::main-header-dropdown -->
							</div>
							<!-- End::header-element -->


							<!-- Start::header-element -->
							<div class="header-element">
								<!-- Start::header-link|dropdown-toggle -->
								<a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
									<div class="d-flex align-items-center">
										<div class="">
											<img src="{{asset('build/assets/img/users/1.jpg')}}" alt="img" width="30" height="30" class="rounded-circle">
										</div>
									</div>
								</a>
								<!-- End::header-link|dropdown-toggle -->
								<div class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
									<div class="header-dropdown bg-primary text-fixed-white rounded-top">
										<div class="d-flex align-items-center">
											<div class="me-sm-2 me-0 avatar">
												<img src="{{asset('build/assets/img/users/1.jpg')}}" alt="img" class="rounded-circle">
											</div>
											<div class="d-sm-block d-none">
												<p class="fw-semibold mb-0 lh-1">{{\Auth::user()->name}}</p>
												<span class="op-7 fw-medium d-block fs-12">Admin</span>
											</div>
										</div>
									</div>
									<div class="dropdown-divider mb-0"></div>
									<ul class="list-unstyled">
										<li><a class="dropdown-item d-flex" href="javascript:void(0);"><i class="ti ti-user-circle fs-18 me-2"></i>Profile</a></li>
										<form action="{{route('logout')}}" method="post" id="logout">
                                            @csrf
                                            <li><a class="dropdown-item d-flex" href="javascript:void(0);" onclick="$('#logout').submit();"><i class="ti ti-logout fs-18 me-2"></i>Log Out</a></li>
                                        </form>
									</ul>
									</div>
							</div>
							<!-- End::header-element -->

						</div>
						<!-- End::header-content-right -->

					</div>
					<!-- End::main-header-container -->

				</header>
