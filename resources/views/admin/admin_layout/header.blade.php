<!--Navbar-->
<nav class="navbar-custom-menu navbar navbar-expand-xl m-0">
                    <div class="sidebar-toggle-icon" id="sidebarCollapse">
                        sidebar toggle<span></span>
                    </div>
                    <!--/.sidebar toggle icon-->
                    <div class="navbar-icon d-flex">
                        <ul class="navbar-nav flex-row align-items-center">
                            <!--/.dropdown-->
                            <li class="nav-item dropdown notification me-2">
                                <!-- <a class="nav-link dropdown-toggle badge-dot" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="typcn typcn-bell"></i>
                                </a> -->
                                <div class="dropdown-menu">
                                    <h6 class="notification-title">Notifications</h6>
                                    <p class="notification-text text-muted">You have 2 unread notification</p>
                                    <div class="notification-list">
                                        <a href="#" class="notification text-reset d-flex new">
                                            <div class="img-user flex-shrink-0"><img src="#"
                                                    alt=""></div>
                                            <div class="notification-body">
                                                <h6>Congratulate <strong>Socrates Itumay</strong> for work anniversaries
                                                </h6>
                                                <span class="text-muted"><i class="me-1 fst-normal" role="img"
                                                        aria-label="Emoji">💬</i> Just Now</span>
                                            </div>
                                        </a>
                                        
                                        <a href="#" class="notification text-reset d-flex new">
                                            <div class="img-user flex-shrink-0 online"><img
                                                    src="#" alt=""></div>
                                            <div class="notification-body">
                                                <h6><strong>Joyce Chua</strong> replied to your comment : "Hello world
                                                    😍"</h6>
                                                <span class="text-muted">Mar 13 04:16am</span>
                                            </div>
                                        </a>
                                        
                                        <a href="#" class="notification text-reset d-flex d-grid">
                                            <div class="img-user flex-shrink-0"><img src="#"
                                                    alt=""></div>
                                            <div class="notification-body">
                                                <div class="h6"><strong>Althea Cabardo</strong> commented
                                                    <blockquote class="mb-0">“I don’t think this really makes sense to
                                                        do without approval from Johnathan since he’s the one...”
                                                    </blockquote>
                                                </div>
                                                <span class="text-muted">Mar 13 02:56am</span>
                                            </div>
                                        </a>
                                        
                                        <a href="#" class="notification text-reset d-flex">
                                            <div class="img-user flex-shrink-0"><img src="#"
                                                    alt=""></div>
                                            <div class="notification-body">
                                                <h6><strong>Adrian Monino</strong> added new comment on your photo <span
                                                        class="badge bg-success">Review</span></h6>
                                                <span class="text-muted">Mar 12 10:40pm</span>
                                            </div>
                                        </a>
                                        
                                    </div>
                                    <!--/.notification -->
                                    <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>
                            <li class="nav-item dropdown user-menu">
                                <a class="bg-transparent border-0 dropdown-toggle nav-link p-0 text-start w-auto"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-element d-flex align-items-center flex-shrink-0 p-0">
                                        <div class="avatar online">
                                            <img src="/storage/{{auth()->user()->photo}}"
                                                class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <div class="profile-text">
                                            <h6 class="m-0">{{ auth()->user()->name }}</h6>
                                            <span>{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-sm-none">
                                        <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                    </div>
                                    <div class="user-header">
                                        <div class="img-user">
                                            <img src="/storage/{{auth()->user()->photo}}" alt="">
                                        </div>
                                        <!-- img-user -->
                                        <h6>{{ auth()->user()->name }}</h6>
                                        <span>{{ auth()->user()->email }}</span>
                                    </div>
                                    <!-- user-header -->
                                    <!-- <a href="account_profile.html" class="dropdown-item"><i
                                            class="typcn typcn-user-outline"></i> My Profile</a>
                                    <a href="settings.html" class="dropdown-item"><i
                                            class="typcn typcn-cog-outline"></i> Account Settings</a> -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item"><i class="typcn typcn-key-outline"></i> Log Out</a>
                                            </form>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>
                        </ul>
                    </div>
                </nav>
                @if ($errors->any())
                <div class="alert alert-danger" style="margin-left: 45px;margin-right: 45px;">
                    <div class="mb-4 position-relative">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if ($message = Session::get('admin_success'))
                <div class="" style="margin-left: 45px;margin-right: 45px;">
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                
                @endif
                @if ($message = Session::get('admin_exception'))
                

                <div class="" style="margin-left: 45px;margin-right: 45px;">
                    <div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <!--/.navbar-->