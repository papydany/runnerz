@extends('layout.main')
@section('title','CONTACT PAGE')
@section('content')

<div class="row" style="padding-top: 50px;">
<div class="col-sm-12">
  <div class="breadcrumb" style="margin-bottom:30px;">
                    <a href="{{'/'}}">Home</a> >>>
                    <span class="text-lg">Contact Us</span>
                </div>

             
           
               <h2 class="text-center text-success" style="margin-bottom: 50px;">Contact Us</h2>
              
                 

                  <div class="col-sm-12 col-md-6" style="padding: 0;">
                     <h3 class="text-danger">Call And Email Us</h3>
                     <address>


                        <p><strong class="text-warning">Phone:</strong>08092313447 and 08155200778</p>
                        <p><strong class="text-warning">Phone</strong> 08037093558(whats app) </p>
                        <p><strong class="text-warning">E-mail:</strong> hello@runnar.com , biz@runnarz.com</p>
                     </address>
                     <br />
                     <h3 class="text-danger">Social</h3>
                     <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/runnarz/?ref=page_internal" target="_blank">Runnarz Facebook</a></p>
                    
                     <p class="margin-bottom"><i class="icon-twitter icon"></i> <a href="https://twitter.com/Runnarzco" target="_blank">Runnarz Twitter</a></p>

                       <p class="margin-bottom"><i class="icon-linkedin icon"></i> <a href="https://www.linkedin.com/company/10903852" target="_blank">Runnarz Linkedin</a></p>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <h3 class="text-danger"> contact form </h3>
                    <form class="customform" action="">
                      <div class="s-12 form-group"><input name="" class="form-control" placeholder="Your e-mail" title="Your e-mail" type="text" /></div>
                      <div class="s-12 form-group"><input name="" placeholder="Your name" class="form-control" title="Your name" type="text" /></div>
                      <div class="s-12 form-group"><textarea placeholder="Your massage" class="form-control" name="" rows="5"></textarea></div>
                      <div class="s-12 m-12 l-4"><button class="btn btn-warning" type="submit">Submit</button></div>
                    </form>
                  </div>                
               </div>
            </div>
       
               

@endsection