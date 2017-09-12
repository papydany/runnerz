@extends('layout.main')
@section('title','HOME PAGE')
@section('content')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAcL8_s3AaxGO65a26fZSY-tmDcF1YYGso&sensor=false&libraries=places"></script>
    <script type="text/javascript">
    onload=function(){
        document.getElementById('submit_button').style.visibility= "hidden";

    document.getElementById('dvMap').style.visibility="visible";
  }
      
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
                    dvDistance.innerHTML += "Amount:" + "N" + number_format(amount);
                   document.getElementById('submit_button').style.visibility= "visible";
             document.getElementById("total_amount").value = amount;
             document.getElementById("total_distance").value = distance;
             document.getElementById("source").value = source;
             document.getElementById("destination").value = destination;
             document.getElementById('cal').style.visibility= "hidden";
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
/* number format function */
        function number_format (number, decimals, decPoint, thousandsSep) { 


number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''

  var toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec)
    return '' + (Math.round(n * k) / k)
      .toFixed(prec)
  }

  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }

  return s.join(dec)
}
    </script>

      <section>

      

                <div class="information-blocks hidden-xs">
                    <div class="navigation-banner-swiper">
                        <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide active" data-val="0"> 
                                    <div class="navigation-banner-wrapper align-2" style="background-image: url(img/logo/1cour.jpg);">
                                        <div class="navigation-banner-content">
                                            <div class="cell-view">
                                            <div class="col-sm-8 col-sm-offset-2" style="margin-top: 250px;">
                                            <div class="col-md-4">
                                              <a href="#delivery" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-bus"></i>&nbsp;Run Deliveries</a> 
                                              </div> 
                                              <div class="col-md-3">   <a href="{{url('erran')}}" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-motorcycle"></i>&nbsp;Run Errands</a> </div>
                                                  <div class="col-md-3 col-md-offset-1"><a href="{{url('custom')}}" class="btn  btn-lg"><i class="fa fa-fw fa-car"></i>&nbsp;Custom Errands </a>
                                                  </div>
                                                   </div>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-val="1"> 
                                    <div class="navigation-banner-wrapper align-2" style="background-image: url(img/logo/2cour.jpg);">
                                        <div class="navigation-banner-content">
                                            <div class="cell-view">
                                                <div class="col-sm-8 col-sm-offset-2" style="margin-top: 250px;">
                                            <div class="col-md-4">
                                              <a href="#delivery" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-bus"></i>&nbsp;Run Deliveries</a> 
                                              </div> 
                                              <div class="col-md-3">   <a href="{{url('erran')}}" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-motorcycle"></i>&nbsp;Run Errands</a> </div>
                                                  <div class="col-md-3 col-md-offset-1"><a href="{{url('custom')}}" class="btn  btn-lg"><i class="fa fa-fw fa-car"></i>&nbsp;Custom Errands </a>
                                                  </div>
                                                   </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                 <div class="swiper-slide" data-val="1"> 
                                    <div class="navigation-banner-wrapper align-2" style="background-image: url(img/logo/3cour.jpg);">
                                        <div class="navigation-banner-content"">
                                           <div class="col-sm-8 col-sm-offset-2" style="margin-top: 250px;">
                                            <div class="col-md-4">
                                              <a href="#delivery" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-bus"></i>&nbsp;Run Deliveries</a> 
                                              </div> 
                                              <div class="col-md-3 ">   <a href="{{url('erran')}}" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-motorcycle"></i>&nbsp;Run  Errands</a> </div>
                                                  <div class="col-md-3 col-md-offset-1"><a href="{{url('custom')}}" class="btn  btn-lg"><i class="fa fa-fw fa-car"></i>&nbsp;Custom Errands </a>
                                                  </div>
                                                   </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                 <div class="swiper-slide" data-val="0"> 
                                    <div class="navigation-banner-wrapper align-2" style="background-image: url(img/logo/4cour.jpg);">
                                        <div class="navigation-banner-content">
                                           <div class="col-sm-8 col-sm-offset-2" style="margin-top: 250px;">
                                            <div class="col-md-4">
                                              <a href="#delivery" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-bus"></i>&nbsp;Run Deliveries</a> 
                                              </div> 
                                              <div class="col-md-3">   <a href="{{url('erran')}}" class="btn btn-warning btn-lg"><i class="fa fa-fw fa-motorcycle"></i>&nbsp;Run Errands</a> </div>
                                                  <div class="col-md-3 col-md-offset-1"><a href="{{url('custom')}}" class="btn  btn-lg"><i class="fa fa-fw fa-car"></i>&nbsp;Custom Errands </a>
                                                  </div>
                                                   </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>
               <div class="information-blocks hidden-md hidden-sm hidden-lg">
                <div class="col-xs-10 col-xs-offset-1" style="margin-bottom: 5px;">
                <a href="#delivery" class="btn btn-warning btn-lg btn-block"><i class="fa fa-fw fa-bus"></i>&nbsp;Run Deliveries</a> 
                </div> 
                <div class="clear"></div>
              <div class="col-xs-10 col-xs-offset-1" style="margin-bottom: 5px;">   
              <a href="{{url('erran')}}" class="btn btn-warning btn-lg btn-block"><i class="fa fa-fw fa-motorcycle"></i>&nbsp;Run Errands</a> 
              </div>
              <div class="clear"></div>
                                                  
              <div class="col-xs-10 col-xs-offset-1" style="margin-bottom: 3px;">
              <a href="{{url('custom')}}" class="btn  btn-lg btn-block"><i class="fa fa-fw fa-car"></i>&nbsp;Custom Errands </a>
              </div>
                                                   <div class="clear"></div>
               </div>

<div class="row">
                <div class="col-sm-12">
 <p>At Runnarz we help you cut through your task so you can concentrate on more important things. We are your mobile workforce that gets you through mundane task. We network your errands in a way that saves you time and stress. With us you find a balance between work, business and family life. At Runnarz your errands is our priority!. </p>              
<p>Runnarz is out to strike a work life balance,Performs your time consuming YET essential tasks, so you can concentrate on the important things in life.</p>
<p> We manage your growing "to do" lists, easily and conveniently. We are built on the philosophy of making your life more flexible in a easy way. Finding a balance between your business and personal commitments and creating wellness in your life.</p>
                </div>
                </div>
           <div class="row" id="delivery">
            <div class="line" style="background-color: #FFA500;margin-top:20px; margin-bottom:10px;border-radius: 4px; color: #000;">
            <div class="col-xs-12">
           
               <h4 class="text-center">RUN DELIVERY</h4>
                 <hr/>
               </div>
               
          
            
             <div class="col-sm-12 col-md-5  margin-bottom">
             <form  method="post" action="{{url('process')}}">
             {{ csrf_field() }}
    <div class="form-group">
                
                <input type="text" class="form-control" id="txtSource"  value="" placeholder="Source"/>
                 <input type="hidden" class="form-control" id="source" name="source" value="" placeholder="Source"/>
                </div>
          
                <div class="form-group">
                 
                <input type="text" class="form-control" id="txtDestination"  value="" 
                placeholder="Destination" />
                 <input type="hidden" class="form-control" id="destination" name="destination" value="" />
               </div>
<div class="form-group">

 
                <select class="form-control" name="service" id="service">
                  <option value="">Select Service</option>
                  @foreach($sc as $v)
                 <option value="{{$v->amount}}">{{$v->service_name}}</option>
                  @endforeach
                </select>
                </div>
             
                 <div class="form-group">
                                <p class="text-success">Select Items</p>
                @foreach($it as $v) 
                <input type="checkbox" name="item[]" id="{{$v->id}}" value="{{$v->amount}}"/>
                 {{$v->item_name}}&nbsp;|&nbsp;
           @endforeach
               <input type="hidden" id="selectedservice" name="selectedservice" value="">     
                      <input type="hidden" id="selected_item_text" name="selected_item_text" value="">
                  <input type="hidden" id="total_amount" name="total_amount" value="">
                    <input type="hidden" id="total_distance" name="total_distance" value="">
                </div>

                <div class="form-group">
                <input type="button" id='cal' class="btn btn-default" value="Calculate" onclick="GetRoute()" />
 <div id="dvDistance" style="color: #000;">

                </div>

                 <div  id="submit_button">
<input type="submit" class="btn btn-danger" value="Continue">
        
              </div>
                </div>
               
                  

              </form>
             </div>
             <div class="col-sm-12 col-md-6 margin-bottom col-md-offset-1" id="dvMap" style="height:300px"></div>
             <div class="clear"></div>
             </div>
            


            </div>

     
        
         </div>

              

    @endsection      
