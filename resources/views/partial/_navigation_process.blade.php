  <div id="topbar">
            <div class="line">
               <div class="s-12 m-6 l-6">
                  <p> CONTACT US: <strong>08092313447</strong> | <strong>hello@runnars.com,biz@runnarz.com</strong></p>
               </div>
               <div class="s-12 m-6 l-6">
 
                  <div class="social right" style="color:#fff;">
                  @if (Auth::guest())
                        
@else
{{ Auth::user()->name }}
<a style="color:#fff;" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out""></i>Logout</a>
                         
 @endif
               &nbsp; &nbsp;<a href="http://facebook.com/runnarz"> <i class="icon-facebook_circle"></i></a> <a https://twitter.com/Runnarzco><i class="icon-twitter_circle"></i></a> <a><i class="icon-google_plus_circle"></i></a> <a><i class="icon-instagram_circle"></i></a>
                  </div>
               </div>
            </div>  
         </div> 
         <nav>
            <div class="line">
               <div class="s-12 l-2">
                  <img src="img/logo.png" alt="">
               </div>
               <div class="top-nav s-12 l-10">
                  <p class="nav-text">Custom menu text</p>
                  <ul class="right">
                     <li class="active-item"><a href="{{'/'}}">Home</a></li>
                     

                  </ul>
               </div>
            </div>
         </nav>