			<aside class="app-sidebar" id="sidebar">

				<!-- Start::main-sidebar-header -->
				<div class="main-sidebar-header">
					<a href="{{route('admin.dashboard.index')}}" class="header-logo">
						<img src="{{asset('build/assets/img/brand-logos/desktop-dark.png')}}" alt="logo" class="main-logo desktop-dark">
						<img src="{{asset('build/assets/img/brand-logos/toggle-dark.png')}}" alt="logo" class="main-logo toggle-dark">
					</a>
				</div>
				<!-- End::main-sidebar-header -->

				<!-- Start::main-sidebar -->
				<div class="main-sidebar " id="sidebar-scroll">

					<!-- Start::nav -->
					<nav class="main-menu-container nav nav-pills flex-column sub-open">
						<div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
								height="24" viewBox="0 0 24 24">
								<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
							</svg></div>
						<ul class="main-menu">
							<!-- Start::slide__category -->
							<!-- <li class="slide__category"><span class="category-name">Main</span></li> -->
							<!-- End::slide__category -->

							<!-- Start::slide -->
							<li class="slide">
								<a href="{{route('admin.dashboard.index')}}" class="side-menu__item">
									<i class="ri-home-8-line side-menu__icon"></i>
									<span class="side-menu__label">Dashboards</span>
								</a>
							</li>
							<!-- End::slide -->

                            <!-- Start::slide -->
							
							<!-- End::slide -->

					<!-- Start::slide -->
					<li class="slide has-sub">
						<a href="javascript:void(0);" class="side-menu__item">
							<i class="ti ti-users side-menu__icon"></i>
							<span class="side-menu__label">Customers</span>
							<i class="ri ri-arrow-right-s-line side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1">
							<li class="slide"><a href="{{route('admin.customers.index')}}" class="side-menu__item">List customers</a></li>
							<li class="slide"><a href="{{route('admin.customer.add')}}" class="side-menu__item">Add customer</a></li>
						</ul>
					</li>
					<!-- End::slide -->

					<!-- Start::slide -->
					<li class="slide has-sub">
						<a href="javascript:void(0);" class="side-menu__item">
							<i class="ti ti-messages side-menu__icon"></i>
							<span class="side-menu__label">Conversations</span>
							<i class="ri ri-arrow-right-s-line side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1">
							<li class="slide"><a href="{{ route('admin.conversations.index') }}" class="side-menu__item">List conversations</a></li>
							<li class="slide"><a href="{{ route('admin.conversation.add') }}" class="side-menu__item">Add conversation</a></li>
						</ul>
					</li>
					<!-- End::slide -->
                  
                           
						</ul>
						<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
								height="24" viewBox="0 0 24 24">
								<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
							</svg></div>
					</nav>
					<!-- End::nav -->

				</div>
				<!-- End::main-sidebar -->

			</aside>
