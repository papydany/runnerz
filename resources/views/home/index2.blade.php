@extends('layout.main2')
@section('title','HOME PAGE')
@section('content')

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAcL8_s3AaxGO65a26fZSY-tmDcF1YYGso&sensor=false&libraries=places"></script>
    <script type="text/javascript">
    onload=function(){document.getElementById('submit_button').style.visibility= "hidden";}
      
        var source, destination, service_type, item,item_check; 
        var directionsDisplay;
        var amount;
       
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function getSum(total, num) {
    return total + num;
}

function getLabelText(needle) {
    var labels = document.getElementsByTagName("label");
    var texts = [];
    for (var i = 0; i < labels.length; i++) {
        var label = labels[i];
        if(label.getAttribute("for") == needle) {
           
            texts.push(label.innerText);
        }
    }
    return texts;
}
function GetRoute() {
       
            var mumbai = new google.maps.LatLng(6.465422,3.406448);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
           source = document.getElementById('txtSource').value;
           destination = document.getElementById('txtDestination').value;
           var e=document.getElementById("service");
service_type=e.options[e.selectedIndex].value;

var selectedservice =e.options[e.selectedIndex].text;
document.getElementById("selectedservice").value = selectedservice;        
           
           
            //var selectedservice =e.options[e.selectedIndex].text;
              //item = document.getElementById("item").value;
           // item_check = document.getElementById("item").value;
        var checkboxes = document.getElementsByName('item[]');
     var selected = [];
   var selected_item_text = [];
for (var i=0; i<checkboxes.length; i++) {
 if (checkboxes[i].checked) {
      selected.push(Number(checkboxes[i].value));

     selected_item_text.push(getLabelText(checkboxes[i].id));
     }

}

 
 document.getElementById("selected_item_text").value = selected_item_text;
 // total item

 if(source == "")
            {
              alert('your need to select source');
              return false;
            }
             if(destination == "")
            {
              alert('your need to select destination');
              return false;
            }
            if(service_type == "")
            {
              alert('your need to select service type');
              return false;
            }
            total_item = selected.reduce(getSum); 
            if(total_item == "")
            {
              alert('your need to select item');
              return false;
            }
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));
 
            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;
          

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                var  total_distance = distance.replace('km','');
                     amount = Number(total_distance)* Number(service_type) *Number(total_item);
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration + "<br />";
                    dvDistance.innerHTML += "Amount:" + amount;
                   document.getElementById('submit_button').style.visibility= "visible";
             document.getElementById("total_amount").value = amount;
             document.getElementById("total_distance").value = distance;
             document.getElementById("source").value = source;
             document.getElementById("destination").value = destination;
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
      <section>
 
         <!-- CAROUSEL --> 
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme"> 
               <div class="item">
                  <img src="img/first.jpg" alt="">
                  <div class="line"> 
                     <div class="text hide-s">
                        <div class="line"> 
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div> 
                        <h2>Good Service Make A difference</h2>
                        
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/second.jpg" alt="">
                  <div class="line">
                     <div class="text hide-s"> 
                        <div class="line"> 
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div> 
                        <h2>Fully Responsive Components</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/third.jpg" alt="">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line"> 
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div> 
                        <h2>Build new Layout in 10 minutes!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIRST BLOCK -->
         <div id="first-block">
            <div class="line">
               <h1>INITIATE REQUEST</h1>
             <div class="s-12 m-5  margin-bottom">
             <form  method="post" action="{{url('process')}}">
             {{ csrf_field() }}
    <div class="form-group">
                  <p style="color: #fff;">Source:</p>
                <input type="text" class="form-control" id="txtSource"  value="" placeholder="Source"/>
                 <input type="hidden" class="form-control" id="source" name="source" value="" placeholder="Source"/>
                </div>
          
                <div class="form-group">
                 <p style="color: #fff;">Destination:</p>
                <input type="text" class="form-control" id="txtDestination"  value="" 
                placeholder="Destination" />
                 <input type="hidden" class="form-control" id="destination" name="destination" value="" />
               </div>
<div class="form-group">

 <p style="color: #fff;">Select Service</p>
                <select class="form-control" name="service" id="service">
                  <option value="">Select Service</option>
                  @foreach($sc as $v)
                 <option value="{{$v->amount}}">{{$v->service_name}}</option>
                  @endforeach
                </select>
                </div>
             
                 <div class="form-group">
                                <p style="color: #fff;">Select Your Items</p>
                @foreach($it as $v)
    
                <div class="checkbox">
             
              
               <p>
                <input type="checkbox" name="item[]" id="{{$v->id}}" value="{{$v->amount}}"/>
                 <label for="{{$v->id}}">{{$v->item_name}}</label></p>
                </div>

                @endforeach
               <input type="hidden" id="selectedservice" name="selectedservice" value="">     
                      <input type="hidden" id="selected_item_text" name="selected_item_text" value="">
                  <input type="hidden" id="total_amount" name="total_amount" value="">
                    <input type="hidden" id="total_distance" name="total_distance" value="">
                </div>

                <div class="form-group">
                <input type="button" class="btn btn-success" value="Calculate" onclick="GetRoute()" />
                </div>
                <div id="dvDistance" style="color: #fff;">

                </div>
                  
 <div  class="form-group" id="submit_button">
<input type="submit" class="btn btn-danger" value="Continue">
        
              </div>
              </form>
             </div>

            
            
                <div class="s-12 m-6 margin-bottom col-md-offset-1" id="dvMap" style="height:500px">
               
                </div>
            </div>
         </div>
         <!-- FEATURES -->
         <div id="features">
            <div class="line">
               <div class="margin">
                  <div class="s-12 m-4 margin-bottom">
                     <i class="icon-tablet icon3x"></i>
                     <h2>STRATEGY</h2>
                     <p>
We operate strategically to meet up with your demand at good and efficient pace. When your business grow-we-grow, putting that in mind gives us an impetus to not only carry out devilries but also help you meet expectations and expand your business channels through targeted sales. For a merchant we are your best bet. send […]</p>
                  </div>
                  <div class="s-12 m-4 margin-bottom">
                     <i class="icon-isight icon3x"></i>
                     <h2>CUSTOMER SERVICE</h2>
                     <p>
Our customer service team are always on hand to serve you better, to give quick answers to your questions. That is the driving force of our business.To get started its way easy, individuals can go to our initiate request page to get started. Merchants can send us a mail and we will be right on […]</p>
                  </div>
                  <div class="s-12 m-4 margin-bottom">
                     <i class="icon-star icon3x"></i>
                     <h2>NETWORK DELIVERY</h2>
                     <p>
Sometimes it’s hard to find time to cut a spare key, re-heel your favorite shoes or collect that parcel waiting at the post office. Our team of vetted, Lagos-based errand runners are on hand to help with every request; irrespective of its size or complexity. Going the extra mile is our business, Logistics basically is […]</p>
                  </div>
                 
               </div>
            </div>
         </div>
         <!-- ABOUT US -->
         <div>
           
            <article class="s-12 ">
               <h2>About Us</h2>

               <p>Runnarz is a first class concierge errand service firm based in Lagos Nigeria.We provide strategic errand solution to both individuals and corporate bodies. </p>
               <p>Our strategy is different, we provide tailored network errand solutions that suit your business and endear you to your local customer base and also help your business grow by expanding your business online real time. With us you have more time to focus on running your business, powering through to-do lists and taking care of the mundane tasks. Our service is fast, efficient and completely reliable. While we take care of your devilries you can take care of your business in a relaxed way. Our team of vetted, Lagos-based errand managers are on hand to help with every request; irrespective of its size or complexity. The strategic word is “network delivery” this way we deliver in a very prompt and efficient way; hand-delivering priceless items and picking up forgotten ones.<p>
               <p> Our errand runners go beyond the call of duty to ensure we save you time and money. Whether you require on-going personal support or would like us to facilitate errand requests for your staff or clients, Do my bidding will be happy to be of service.</p>
               </p>
              
            </article>
         </div>
          
         <!-- SERVICES -->
         <div>
            <div class="line">
               <h2 class="section-title">Special Order</h2>
               <div class="margin">
                  <div class="s-12 margin-bottom">
                
                     <div class="service-text">
                       
                        <p>We can run structured errands for you like moving goods in bulk, provision of workers for special assignments, contractual errands,  scheduled pick up and drop off for individuals or groups, booking vehicles for special events or parties, special errands for your household, firm or organization, etc.

Are you relocating or even trying trying to move goods and people to-and-from. Thats our job, lets run it in a professional way. just send us a mail biz@runnarz.com</p>
                     </div>
                  </div>
                
               </div>
            </div>
         </div>
        
         <!-- CONTACT -->
         <div>
            <div class="line">
               <h2 class="section-title">Contact Us</h2>
               <div class="margin">
                  
                  <div class="s-12 m-12 l-6 margin-bottom right-align">
                     <h3>Call And Email Us</h3>
                     <address>

                        <p><strong>Phone:</strong>08092313447</p>
                        <p><strong>Phone</strong> 08037093558(whats app) and 08155200778</p>
                        <p><strong>E-mail:</strong> hello@runnars.com,biz@runnarz.com</p>
                     </address>
                     <br />
                     <h3>Social</h3>
                     <p><i class="icon-facebook icon"></i> <a href="http://facebook.com/runnarz">Runnarz Facebook</a></p>
                    
                     <p class="margin-bottom"><i class="icon-twitter icon"></i> <a href="https://twitter.com/Runnarzco">Runnarz Twitter</a></p>

                       <p class="margin-bottom"><i class="icon-linkedin icon"></i> <a href="https://twitter.com/Runnarzco">Runnarz Twitter</a></p>
                  </div>
                  <div class="s-12 m-12 l-5">
                    <h3> contact form </h3>
                    <form class="customform" action="">
                      <div class="s-12 form-group"><input name="" class="form-control" placeholder="Your e-mail" title="Your e-mail" type="text" /></div>
                      <div class="s-12 form-group"><input name="" placeholder="Your name" class="form-control" title="Your name" type="text" /></div>
                      <div class="s-12 form-group"><textarea placeholder="Your massage" class="form-control" name="" rows="5"></textarea></div>
                      <div class="s-12 m-12 l-4"><button class="btn btn-success" type="submit">Submit Button</button></div>
                    </form>
                  </div>                
               </div>
            </div>
         </div>
    
      </section>
      @endsection
      <!-- FOOTER -->
 