 <div class="header-wrapper style-4">
                <header class="type-2">
                    <div class="navigation-vertical-align">
                        <div class="cell-view logo-container">
                            <a id="logo" href="{{url('/')}}" style="z-index: 1000px;"><img src="img/logo/logo.jpg" alt="" /></a>
                        </div>
                        <div class="cell-view nav-container">
                            <div class="navigation">
                                <div class="navigation-header responsive-menu-toggle-class">
                                    <div class="title">Navigation</div>
                                    <div class="close-menu"></div>
                                </div>
                                <div class="nav-overflow">
                                    <nav>
                                        <ul>
                                                                                <li class="full-width">
                                        <a href="{{url('/')}}" class="active">Home</a>
                                     
                                    </li>
                                   
                                    <li class="simple-list">
                                        <a href="{{url('service')}}">SERVICES</a>
                                  
                                    </li>
                                    <li class="column-1">
                                        <a href="{{url('agent')}}">AGENTS REG</a>
                                     
                                    </li>
                                      
                                   
                                     <li class="column-1">
                                     <a href="{{url('merchant')}}" >
                                     
                                    MERCHANT REG</a>
                                  
                                    </li> 
                                    <li class="column-1">
                                        <a href="{{url('contact')}}">CONTACT US</a>
                                  
                                    </li>
                                   @if (Auth::guest())
                                   @else
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    @endif
                                        </ul>

                                        <div class="clear"></div>

                                        <a class="fixed-header-visible additional-header-logo" style="z-index: 1000px;"><img src="img/logo/logo.jpg" alt=""/></a>
                                    </nav>
                                    <div class="navigation-footer responsive-menu-toggle-class">
                                        <div class="socials-box">
                                            <a href="https://www.facebook.com/runnarz/?ref=page_internal" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="https://twitter.com/Runnarzco" target="_blank"><i class="fa fa-twitter"></i></a>
                                            
                                            <a href="https://www.linkedin.com/company/10903852" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            
                                            <div class="clear"></div>
                                        </div>
                                        <div class="navigation-copyright">Created by <a href="#">Runnarz</a>. All rights reserved</div>
                                    </div>
                                </div>
                            </div>
                            <div class="responsive-menu-toggle-class">
                                <a href="#" class="header-functionality-entry menu-button"><i class="fa fa-reorder"></i></a>
                             
                            </div>
                        </div>
                    </div>
                    <div class="close-header-layer"></div>
                </header>
                <div class="clear"></div>
            </div>