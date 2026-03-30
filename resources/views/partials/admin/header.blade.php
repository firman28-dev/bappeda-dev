 <!-- Page Header Start-->
 <div class="page-header">
     <div class="header-wrapper row m-0">
         <form class="form-inline search-full col" action="#" method="get">
             <div class="form-group w-100">
                 <div class="Typeahead Typeahead--twitterUsers">
                     <div class="u-posRelative">
                         <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                             placeholder="Search Anything Here..." name="q" title="" autofocus>
                         <div class="spinner-border Typeahead-spinner" role="status"><span
                                 class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                     </div>
                     <div class="Typeahead-menu"></div>
                 </div>
             </div>
         </form>
         <div class="header-logo-wrapper col-auto p-0">
             <div class="logo-wrapper">
                <a href="">
                    <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                    <img class="img-fluid for-dark"src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="">
                </a>
            </div>
             <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
             </div>
         </div>
         <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
             <div class="notification-slider">
                 <div class="d-flex h-100"> <img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                     <h6 class="mb-0 f-w-400">
                        <span class="font-primary">Selamat Datang! </span>
                    </h6>
                    {{-- <i class="icon-arrow-top-right f-light"></i> --}}
                 </div>
                 <div class="d-flex h-100"><img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                     <h6 class="mb-0 f-w-400"><span class="f-light">DI Website Bappeda! </span></h6>
                 </div>
             </div>
         </div>
         <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
             <ul class="nav-menus">
                <li class="hide-on-mobile" style="padding: 0px 5px;">
                    <a class="btn btn-warning btn-xs btn-pill hide-on-mobile" target="_blank" type="button" href="/">Ke Halaman Landing</a>
                </li>

                <li class="tahun-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang">
                                <i class="fa fa-calendar"></i>
                                <span class="lang-txt" id="current-year">{{ session('tahun_terpilih', date('Y')) }}</span>
                            </div>
                        </div>
                        <div class="more_lang">
                            @for ($tahun = date('Y'); $tahun >= 2024; $tahun--)
                                <div class="lang tahun-option {{ session('tahun_terpilih') == $tahun ? 'selected' : '' }}" data-value="{{ $tahun }}">
                                    <i class="fa fa-calendar"></i>
                                    <span class="lang-txt">{{ $tahun }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </li>

                <li class="fullscreen-body"> 
                <span>
                        <svg id="maximize-screen">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#full-screen') }}"></use>
                        </svg>
                    </span>
                </li>
            
                <li>
                    <div class="mode">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#moon') }}"></use>
                        </svg>
                    </div>
                </li>

                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex profile-media">
                    @if (auth()->user()->photo)
                        <img src="{{ asset('uploads/photo/' . auth()->user()->photo) }}" alt="user" />
                    @else
                        <img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}" alt="">
                    @endif
                    {{-- <img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}" alt=""> --}}
                    <div class="flex-grow-1">
                        <span>{{ auth()->user()->username ?? 'User' }}</span>
                        <p class="mb-0">{{ auth()->user()->_group->name ?? '' }} 
                            <i class="middle fa-solid fa-angle-down"></i>
                        </p>
                    </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                        <a href="{{route('user.profile')}}">
                            <i data-feather="user"></i>
                            <span>Account </span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('logout.perform')}}">
                            <i data-feather="log-in"> </i>
                            <span>Log out</span>
                        </a>
                        </li>
                    </ul>
                </li>
             </ul>
         </div>
         <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">name</div>
            </div>
            </div>
          </script>
         <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
     </div>
 </div>
 <!-- Page Header Ends-->
