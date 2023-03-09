    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="header">MAIN NAVIGATION</li>
                
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="material-icons">burst_mode</i>
                        <span>Sliders</span>
                    </a>
                </li>


                                <li class="{{ Request::is('admin/Setup*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Modules</span>
                    </a>
                    <ul class="ml-menu">

                        <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.index') }}">
                                <i class="material-icons"></i>
                                <span>Pages</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('admin/process*') ? 'active' : '' }}">
                            <a href="{{ route('admin.process.index') }}">
                                <i class="material-icons"></i>
                                <span>Work Process</span>
                            </a>
                        </li>
        
                        <li class="{{ Request::is('admin/experience*') ? 'active' : '' }}">
                            <a href="{{ route('admin.experience.index') }}">
                                <i class="material-icons"></i>
                                <span>Work Experience</span>
                            </a>
                        </li>
                        
                           <li class="{{ Request::is('admin/team*') ? 'active' : '' }}">
                            <a href="{{ route('admin.team.index') }}">
                                <i class="material-icons"></i>
                                <span>Our Team</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/client*') ? 'active' : '' }}">
                            <a href="{{ route('admin.client.index') }}">
                                <i class="material-icons"></i>
                                <span>Clients</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/contact-list') ? 'active' : '' }}">
                            <a href="{{ route('admin.contact') }}">
                                <i class="material-icons"></i>
                                <span>Contacts</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('admin/quotation-list') ? 'active' : '' }}">
                            <a href="{{ route('admin.quotation') }}">
                                <i class="material-icons"></i>
                                <span>qutation</span>
                            </a>
                        </li>
        
                        <li class="{{ Request::is('admin/service-list') ? 'active' : '' }}">
                            <a href="{{ route('admin.service') }}">
                                <i class="material-icons"></i>
                                <span>Service</span>
                            </a>
                        </li>                      
                    </ul>
                </li>

               

                <li class="{{ Request::is('admin/project*') ? 'active' : '' }}">
                    <a href="{{ route('admin.project.index') }}">
                        <i class="material-icons">burst_mode</i>
                        <span>Project</span>
                    </a>
                </li>
              
                <li class="{{ Request::is('admin/properties*') ? 'active' : '' }}">
                    <a href="{{ route('admin.properties.index') }}">
                        <i class="material-icons">home</i>
                        <span>Property</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
                    <a href="{{ route('admin.features.index') }}">
                        <i class="material-icons">star</i>
                        <span>Features</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}">
                        <i class="material-icons">wb_sunny</i>
                        <span>Services</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i class="material-icons">view_carousel</i>
                        <span>Testimonials</span>
                    </a>
                </li>

                <li class="header">Blog</li>
                <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="material-icons">category</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="header"> </li>
                <li class="{{ Request::is('admin/galleries*') ? 'active' : '' }}">
                    <a href="{{ route('admin.album') }}">
                        <i class="material-icons">view_list</i>
                        <span>Gallery</span>
                    </a>
                </li>
 
                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                            <a href="{{ route('admin.user.index') }}">
                                <span>users</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/changepassword') ? 'active' : '' }}">
                            <a href="{{ route('admin.changepassword') }}">
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                            <a href="{{ route('admin.message') }}">
                                <span>Message</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

            </ul>
        </div>
        <!-- #Menu -->
        
    </aside>