<div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/backend') }}/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/backend') }}/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/backend') }}/images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/backend') }}/images/logo-dark-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="">
                            <img src="{{ asset('storage/profile/'.Auth::user()->image) }}" alt="user-image" height="50" width="50" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title">Navigation</li>

                        @if(Request::is('admin*'))

                        <li class="side-nav-item {{ Request::is('admin/appointment*') ? 'active' : '' }}">
                            <a href="{{ route('admin.appointment.index') }}" class="side-nav-link">
                            <i class="ri-briefcase-line"></i>
                            <span> Appointment </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.appointment.pending') }}" class="side-nav-link">
                            <i class="ri-briefcase-fill"></i>
                            <span> Pending Appointment </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                               <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                            <a href="{{ route('admin.category.index') }}" class="side-nav-link">
                            <i class=" uil-focus-add"></i>
                            <span> Category </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/blog*') ? 'active' : '' }}">
                            <a href="{{ route('admin.tag.index') }}" class="side-nav-link">
                               <i class="uil-tag"></i>
                                <span> Tag </span>
                            </a>
                        </li>

                        

                        <li class="side-nav-item {{ Request::is('admin/blog*') ? 'active' : '' }}">
                            <a href="{{ route('admin.blog.index') }}" class="side-nav-link">
                            <i class="uil-folder-plus"></i>
                            <span> Blog </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.blog.pending') }}" class="side-nav-link">
                            <i class="uil-file-check "></i>
                            <span> Pending Blog </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.comment.index') }}" class="side-nav-link">
                            <i class="uil-comment-alt"></i>
                            <span> Comments </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.contact.index') }}" class="side-nav-link">
                            <i class="ri-contacts-book-line"></i>
                            <span> Contact </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/service*') ? 'active' : '' }}">
                            <a href="{{ route('admin.service.index') }}" class="side-nav-link">
                               <i class="uil-calender"></i>
                                <span> Service </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/slider*') ? 'active' : '' }}">
                            <a href="{{ route('admin.slider.index') }}" class="side-nav-link">
                               <i class=" uil-diamond "></i>
                                <span> Slider </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/gallery*') ? 'active' : '' }}">
                            <a href="{{ route('admin.gallery.index') }}" class="side-nav-link">
                               <i class=" uil-scenery "></i>
                                <span> Gallery </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/team*') ? 'active' : '' }}">
                            <a href="{{ route('admin.team.index') }}" class="side-nav-link">
                               <i class="uil-users-alt "></i>
                                <span> Team </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/testimonial*') ? 'active' : '' }}">
                            <a href="{{ route('admin.testimonial.index') }}" class="side-nav-link">
                               <i class="uil-comment-medical"></i>
                                <span> Testimonial </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}" class="side-nav-link">
                               <i class="mdi mdi-account-edit me-1"></i>
                                <span> Settings </span>
                            </a>
                        </li>

                    </ul>

                        @endif



                        @if(Request::is('receptionist*'))

                        <li class="side-nav-item {{ Request::is('receptionist/dashboard*') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.dashboard') }}" class="side-nav-link">
                               <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('receptionist/appointment*') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.appointment.index') }}" class="side-nav-link">
                            <i class="ri-briefcase-line"></i>
                            <span> Appointment </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('receptionist.appointment.pending') }}" class="side-nav-link">
                            <i class="ri-briefcase-fill"></i>
                            <span> Pending Appointment </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('receptionist/category*') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.category.index') }}" class="side-nav-link">
                            <i class=" uil-focus-add"></i>
                            <span> Category </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('receptionist/blog*') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.tag.index') }}" class="side-nav-link">
                               <i class="uil-tag"></i>
                                <span> Tag </span>
                            </a>
                        </li>
                    
                        <li class="side-nav-item {{ Request::is('receptionist/blog*') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.blog.index') }}" class="side-nav-link">
                            <i class="uil-folder-plus"></i>
                            <span> Blog </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('receptionist.comment.index') }}" class="side-nav-link">
                            <i class="uil-comment-alt"></i>
                            <span> Comments </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('receptionist.contact.index') }}" class="side-nav-link">
                            <i class="ri-contacts-book-line"></i>
                            <span> Contact </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('receptionist/settings') ? 'active' : '' }}">
                            <a href="{{ route('receptionist.settings') }}" class="side-nav-link">
                               <i class="mdi mdi-account-edit me-1"></i>
                                <span> Settings </span>
                            </a>
                        </li>

                    </ul>

                        @endif


                        @if(Request::is('user*'))

                       <li class="side-nav-item {{ Request::is('user/dashboard*') ? 'active' : '' }}">
                            <a href="{{ route('user.dashboard') }}" class="side-nav-link">
                               <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>

                        
                        <li class="side-nav-item {{ Request::is('user/appointment*') ? 'active' : '' }}">
                            <a href="{{ route('user.appointment.index') }}" class="side-nav-link">
                            <i class="ri-briefcase-line"></i>
                            <span> Appointment </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('user/blog*') ? 'active' : '' }}">
                            <a href="{{ route('user.blog.index') }}" class="side-nav-link">
                            <i class="uil-folder-plus"></i>
                            <span> Blog </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('user.comment.index') }}" class="side-nav-link">
                            <i class="uil-comment-alt"></i>
                            <span> Comments </span>
                            </a>
                        </li>

                        <li class="side-nav-item {{ Request::is('user/settings') ? 'active' : '' }}">
                            <a href="{{ route('user.settings') }}" class="side-nav-link">
                               <i class="mdi mdi-account-edit me-1"></i>
                                <span> Settings </span>
                            </a> 
                        </li>

                        

                        
                    </ul>

                        @endif
                        
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>