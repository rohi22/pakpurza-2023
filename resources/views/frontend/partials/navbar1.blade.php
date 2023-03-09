@php
$setting = App\Models\WebSetting::first(); 
@endphp

<nav class="navbar navbar-expand-lg bg-dark fixed-top hover-dropdown header-nav-bar">
   <!-- <a href="{{route('index')}}"-->
   <!--class="navbar-brand"><img src="frontend/images/Logo---Final-117x90.gif" alt="Pak Purza"></a>-->
     <a href="{{ url('/') }}">@if(!empty($setting))<img src="{{ URL::asset('assets/media/web-settings/'.$setting->logo) }}" class="width-100 " alt="Logo-Simsar" >@endif</a>
   <button class="navbar-toggler afexpand" type="button" data-toggle="collapse" data-target="#h5-info"
   aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
   <div class="collapse navbar-collapse" id="h5-info">
     <ul class="navbar-nav">
       <li  class="nav-item"> <a class="nav-link " href="{{route('index')}}"> <u style="color: burlywood;"><b> Home </b></u> </a></li>
       
       <li class="nav-item"> <a class="nav-link" href="{{route('about.us')}}"> <b> About </b></a></li>
       
       <li class="nav-item dropdown"> 
         <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
         data-bs-toggle="dropdown" aria-expanded="false">
         <b>Media</b>
       </a>
       <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="{{route('blog')}}"> Blogs</a>
           <ul class="dropdown-menu">
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Machine & Products</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Economics & Finance</a></li>
                 <li><a class="dropdown-item" href="#">Energy Saving</a></li>
                 <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                 <li><a class="dropdown-item" href="#">Textile Industry</a></li> 
               </ul>
             </li>
             <li><a class="dropdown-item" href="#">Safety & Firefighting</a></li>
             <li><a class="dropdown-item" href="#">Services</a></li>
             <li><a class="dropdown-item" href="#">Laptops</a></li>
             <li><a class="dropdown-item" href="#">Mobiles</a></li>
             <li><a class="dropdown-item" href="#">Tablets</a></li>                      
           </ul>
           
         </li>
         <li><a class="dropdown-item" href="{{route('news')}}">News</a></li>
         <li><a class="dropdown-item" href="{{route('careers')}}">Careers</a></li>
         
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="{{route('events')}}">Events</a>
           <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="#">All Events</a></li>
             
           </ul>
         </li>
         
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="{{route('articles')}}">Articles</a>
           <ul class="dropdown-menu">
             <a class="dropdown-item" href="#">Add Article</a>
             <li class="dropdown-submenu">
               
               <a class="dropdown-item dropdown-toggle">Article 1</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Sub-Article 1</a></li>
                 <li><a class="dropdown-item" href="#">Sub-Article 2</a></li>
                 <li><a class="dropdown-item" href="#">Sub-Article 3</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Article 2</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Sub-Article 1</a></li>
               </ul>
             </li>
             <li><a class="dropdown-item" href="#">niche 3</a></li>
             <li><a class="dropdown-item" href="#">niche 4</a></li>
             <li><a class="dropdown-item" href="#">niche 4</a></li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Electrical Engeneering Test</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Automation Test</a></li>
                 <li><a class="dropdown-item" href="#">Electrical Engin 2222</a></li> 
               </ul>
             </li>
             <li><a class="dropdown-item" href="#">shay Santiago</a></li>
           </ul>
         </li>
         
         
         
       </ul>
     </li>
     
     
     <li class="nav-item dropdown"> 
       <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
       data-bs-toggle="dropdown" aria-expanded="false">
       <b>Ads Categories</b> 
     </a>
     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
       <li><a class="dropdown-item" href="#">All Ads</a></li>
       <li><a class="dropdown-item" href="#">Featured</a></li>
       <li class="dropdown-submenu">
         <a class="dropdown-item dropdown-toggle" href="#"> Products</a>
         <ul class="dropdown-menu">
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Machines & Products</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="">Sugar Industry</a></li>
               <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
               <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
               <li><a class="dropdown-item" href="#">Cement Industry</a></li>
               <li><a class="dropdown-item" href="#">Textile Industry</a></li>
               <li><a class="dropdown-item" href="#">WHRP</a></li>
               <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
               <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
               <li><a class="dropdown-item" href="#">Power Plant</a></li>
               <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>
               <li><a class="dropdown-item" href="#">Food Beverage and Restaurant</a></li>
               <li><a class="dropdown-item" href="#">Agriculture</a></li>
               <li><a class="dropdown-item" href="#">Medical</a></li>   
               <li><a class="dropdown-item" href="#">Environmental</a></li>
               <li><a class="dropdown-item" href="#">Quality control</a></li>
               <li><a class="dropdown-item" href="#">Plastic and Pipe Industry</a></li>
               <li><a class="dropdown-item" href="#">All industries</a></li>
               <li><a class="dropdown-item" href="#">Flour Industry</a></li>
               <li><a class="dropdown-item" href="#">Home Appliances</a></li>
               <li><a class="dropdown-item" href="#">Glass Manufacturing</a></li>
               <li><a class="dropdown-item" href="#">Fertiliser Industry</a></li>
               <li><a class="dropdown-item" href="#">Civil Construction and Building Accessories </a></li>
               <li><a class="dropdown-item" href="#">Lathe and CNC machines</a></li>
               <li><a class="dropdown-item" href="#">Pharmaceutical Industry</a></li>
               <li><a class="dropdown-item" href="#">Small industry product</a></li>
               
             </ul>
           </li>  
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Spare Parts</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Electrical Machine and Equipment</a></li>
               <li><a class="dropdown-item" href="#">PLC and Communication Equipment</a></li>
               <li><a class="dropdown-item" href="#">Heavy Equipment Machine</a></li>
               <li><a class="dropdown-item" href="#">Computer and IT Equipment</a></li>
               <li><a class="dropdown-item" href="#">Automotive Machine</a></li>
               <li><a class="dropdown-item" href="#">Other Machine and Product</a></li>
               <li><a class="dropdown-item" href="#">Medical Machine and Equipment</a></li>
               <li><a class="dropdown-item" href="#">Dental Machine or Equipment</a></li>
               <li><a class="dropdown-item" href="#">Civil construction and Surveying equipment</a></li>
               <li><a class="dropdown-item" href="#">Lathe and CNC machine</a></li>
               <li><a class="dropdown-item" href="#">Tools</a></li>
               <li><a class="dropdown-item" href="#">Mechanical Machine and Equipment</a></li>
               <li><a class="dropdown-item" href="#">Electronics and Instrumentation</a></li>
               <li><a class="dropdown-item" href="#">Agriculture Machine</a></li>
               
             </ul>
           </li> 
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Tools</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Electrical Measuring Tools</a></li>
               <li><a class="dropdown-item" href="#">Mechanical Measuring Tools</a></li>
               <li><a class="dropdown-item" href="#">Civil and surveying Tools</a></li>
               <li><a class="dropdown-item" href="#">Automotive Tools</a></li>
               <li><a class="dropdown-item" href="#">Chemical Lab</a></li>
               <li><a class="dropdown-item" href="#">Process Measuring Tools</a></li>
               <li><a class="dropdown-item" href="#">General</a></li>
               <li><a class="dropdown-item" href="#">Surgical Tools</a></li>
               <li><a class="dropdown-item" href="#">Hand Tool</a></li>
               <li><a class="dropdown-item" href="#">Physics Lab</a></li>
               <li><a class="dropdown-item" href="#">Bio Lab</a></li>
               <li><a class="dropdown-item" href="#">Art and Craft Tools</a></li>
               <li><a class="dropdown-item" href="#">Quality Control</a></li>
               <li><a class="dropdown-item" href="#">Environmental Monitoring Tools</a></li>
               <li><a class="dropdown-item" href="#">Medical Tools</a></li>
               <li><a class="dropdown-item" href="#">Dental Tools</a></li>   
             </ul>
           </li> 
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Safety & Firefighting</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Safety</a></li>
               
               <li><a class="dropdown-item" href="#">Firefighting Equipment</a></li>
               <li><a class="dropdown-item" href="#">Fire Alarming System</a></li>
               <li><a class="dropdown-item" href="#">Firefighting Acessories</a></li>
             </ul>
           </li> 
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Lift Elevators & Escalator</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Mechanical Acessories</a></li>
               <li><a class="dropdown-item" href="#">Electrical Acessories</a></li>
               <li><a class="dropdown-item" href="#">Complete unit</a></li>
             </ul>
           </li> 
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">HVAC</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Complete unit</a></li>
               <li><a class="dropdown-item" href="#">Complete unit</a></li>
               <li><a class="dropdown-item" href="#">Chiller</a></li>
               <li><a class="dropdown-item" href="#">Window/Split AC</a></li> 
             </ul>
           </li> 
         </ul>
       </li>
       
       
       
       
       <li class="dropdown-submenu">
         <a class="dropdown-item dropdown-toggle" href="#">Services</a>
         <ul class="dropdown-menu">
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Rent a Machines</a>
             
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Electrical</a></li>
               <li><a class="dropdown-item"
                 href="#">Mechanical</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Civil</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Chemical</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Medical</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Mining</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Auto</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Communication</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Agriculture</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Textile</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Environmental </a>
               </li>
               <li><a class="dropdown-item"
                 href="#">General</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">electrical</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Heavy Equipment</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Loader </a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Lifter</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Crane</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Bulldozer</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Excavator</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Harvester</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Trencher</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Articulated Hauler</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Off Highway Truck</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Asphalt Paver</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Generator</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Cold Planer</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Motor Grader</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Compactor</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Drum Roller</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Compact Track and Multi-Terrain Loader</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Skidder</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Forwarder</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Knuckleboom Loader</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Transformer</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Core Cutting Machine</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Other</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">HVAC system</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Transformer</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Motor</a>
               </li>
               
             </ul>
           </li>  
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Repair & Maintenence</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>   
               <li><a class="dropdown-item"
                 href="#">Electrical Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Mechanical Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Civil and Surveying Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Lab Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Medical Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Heavy Machinery Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">IT Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Instrumentation and Communication Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Environmental Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Textile machine and  Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">General</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Electrical Motors</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Photostat Machine</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Generator</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Transformer</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Rotor</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Desktop</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Monitor</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">IT Equipment</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">VFD Cards</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Electronic Cards</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">HT Cable and Jointing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Other</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Automobile and Transport</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Small Industry Equipments</a>
               </li>
               <li><a class="dropdown-item"
                 href="# ">83</a>
               </li>
               
             </ul>
           </li> 
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Installation and Commissioning</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Civil Structure and Building</a></li>
               <li><a class="dropdown-item" href="#">Auto industry</a></li>
               <li><a class="dropdown-item" href="#">IT  Network</a></li>
               <li><a class="dropdown-item" href="#">Communication Equipments</a></li>
               <li><a class="dropdown-item" href="#">Textile</a></li>
               <li><a class="dropdown-item" href="#">Environmental</a></li>
               <li><a class="dropdown-item" href="#">General</a></li>
               <li><a class="dropdown-item" href="#">HVAC</a></li>
               <li><a class="dropdown-item" href="#">>Electrical equipment</a></li>
               <li><a class="dropdown-item" href="#">Mechanical equipment</a></li>
               <li><a class="dropdown-item" href="#">Other</a></li>
               <li><a class="dropdown-item" href="#">Security Cameras</a></li>
               <li><a class="dropdown-item" href="#">Medical Equipment</a></li>
               <li><a class="dropdown-item" href="#">Lab Equipments</a></li>   
             </ul>
           </li> 
           
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Paper Printing</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Offset Printing</a></li>
               <li><a class="dropdown-item" href="#">Digital Printing</a></li>
               <li><a class="dropdown-item" href="#">Screen Printing</a></li>
               <li><a class="dropdown-item" href="#">Flexography</a></li>
             </ul>
           </li> 
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Construction Services</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item" href="#">Surveying</a></li>
               <li><a class="dropdown-item" href="#">Road construction</a></li>
               <li><a class="dropdown-item" href="#">Building construction</a></li>
             </ul>
           </li> 
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle">Computer Soft Skills</a>
             <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                 <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                   <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                   <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                   <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                   <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                   <li><a class="dropdown-item" href="#">WHRP</a></li>
                   <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                   <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                   <li><a class="dropdown-item" href="#">Power Plant</a></li>
                   <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                 </ul>
               </li>  
               <li><a class="dropdown-item"
                 href="#">Web Development</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Video Editing </a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Other</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Graphic Designing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Storyboard Animation</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Whiteboard Animation</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">MS Excel</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">MS Word</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">MS PowerPoint</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">MS Project</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">MS Office</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Content Writing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Virtual Assistant</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Data Entry</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Social Media Marketing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Instagram Marketing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Facebook Marketing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Logo Making</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Youtube Marketing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">SEO</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Photo Editing</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Lightroom Expert</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Photoshop expert</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Illustration Making</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Wordpress</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Full Stack Website</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Autocad</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">3D Max</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Fusion 360</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Maya 3D</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">UX Designs</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Product Photography</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Video Production</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Book Keeping</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Drop Shipping</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Spotify Store</a>
               </li>
               <li><a class="dropdown-item"
                 href="#">Amazon Virtual Assistant</a>
               </li> </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">General</a>
               <ul class="dropdown-menu">
                 <li class="dropdown-submenu">
                   <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                     <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                     
                   </ul>
                 </li>  
                 <li><a class="dropdown-item" href="#">Rotor Balancing</a></li>
                 <li><a class="dropdown-item" href="#">Wheel Balancing</a></li>
                 <li><a class="dropdown-item" href="#">Other</a></li>
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Performance and Quality Testing</a>
               <ul class="dropdown-menu">
                 <li class="dropdown-submenu">
                   <a class="dropdown-item dropdown-toggle">Machines & Products</a>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item " href="#">Sugar Industry</a></li>
                     <li><a class="dropdown-item" href="#">Automotive and Transportation</a></li>
                     <li><a class="dropdown-item" href="#">Chemical Industry</a></li>
                     <li><a class="dropdown-item" href="#">Cement Industry</a></li>
                     <li><a class="dropdown-item" href="#">Textile Industry</a></li>
                     <li><a class="dropdown-item" href="#">WHRP</a></li>
                     <li><a class="dropdown-item" href="#">Steel ReRolling</a></li>
                     <li><a class="dropdown-item" href="#">Alternate Energy</a></li>
                     <li><a class="dropdown-item" href="#">Power Plant</a></li>
                     <li><a class="dropdown-item" href="#">Gas and Petroleum</a></li>                                  
                   </ul>
                 </li>  
                 <li><a class="dropdown-item" href="#">Electrical Machines and Equipment</a></li>
                 <li><a class="dropdown-item" href="#">Mechanical Machines and Equipment</a></li>
                 
               </ul>
             </li> 
           </ul>
         </li>
         
         
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="#">Laptops</a>
           <ul class="dropdown-menu">
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Apple</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Test</a></li>
                 <li><a class="dropdown-item" href="#">MacBook Air</a></li>
               </ul>
             </li>  
             
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Acer</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">uio</a></li>
                 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">HP</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Core i7</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Lenovo</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>     
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">MicroSoft</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>  
             
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Msi</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Razer</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Asus</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Dell</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Dell Inspiron</a></li>        
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Allienware</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Samsung</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
           </ul>
         </li>
         
         
         
         
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="#"> Mobiles</a>
           <ul class="dropdown-menu">
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Oppo</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Camera</a></li>
                 <li><a class="dropdown-item" href="#">Camera</a></li>
                 <li><a class="dropdown-item" href="#">A37</a></li>
               </ul>
             </li>  <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Apple</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Test</a></li>
                 <li><a class="dropdown-item" href="#">MacBook Air</a></li>
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Vivo</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">ioop</a></li>     
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Infinix</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Xiaomi</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Realme</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Huawei</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Honor</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Nokia</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Sony</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Techno</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">LG</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Samsung</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Acer</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">uio</a></li>     
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">HP</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Core i7</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Lenovo</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>     
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Motorola</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>  
             
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Meizu</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">HTC</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Razer</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Aser</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">ZTE</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>        
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Alcatel</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>        
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">QMobile</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>        
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Item</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">OnePlus</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Teleport</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Microsoft</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Blueberry</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Haier</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">JazzX</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Voice</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Callme</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Gright</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Gâ€™Five</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Club</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">OPhone</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             
           </ul>
         </li>
         
         
         <li class="dropdown-submenu">
           <a class="dropdown-item dropdown-toggle" href="#">Tablets</a>
           <ul class="dropdown-menu">
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Xiaomi</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Samsung</a></li>
                 
               </ul>
             </li>  <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Samsung</a>
               <ul class="dropdown-menu">
                 
                 <li><a class="dropdown-item" href="#">Samsung Galaxy Tab</a></li>
                 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Appale iPads 4</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">ipad air 4</a></li>     
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Google</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Lenovo</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Huawei</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Q Tabs</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Alcatel</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Amazon</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Mione</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">LG</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Wacom</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Asus</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">uio</a></li>     
               </ul>
             </li>
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">Huion</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li>     
               </ul>
             </li> 
             <li class="dropdown-submenu">
               <a class="dropdown-item dropdown-toggle">HTC</a>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#">Empty</a></li> 
               </ul>
             </li>  
             
           </ul>
         </li>
         
         
         
       </ul>
     </li>
     
     
     
     <!-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Ads Categories</a>
       <ul class="b-none dropdown-menu font-14 animated fadeInUp">
         <li><a class="dropdown-item" href="#">All Ads</a></li>
         <li><a class="dropdown-item" href="#"> Products</a></li>
         <li><a class="dropdown-item" href="#">Services</a></li>
         <li><a class="dropdown-item" href="#">Laptops</a></li>
         <li><a class="dropdown-item" href="#">Mobiles</a></li>
         <li><a class="dropdown-item" href="#">Tablets</a></li>
       </li>
     -->
    
   </ul>
 
  
<div class="header_r d-flex">
 <div class="loin"> <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i
   class="fa fa-user m-r-5"></i>Register/Sign In</a> </div>
   <ul class="ml-auto post_ad">
     <li class="nav-item search"><a class="nav-link" href="#">Post Your Ad</a></li> 
   </ul>
</div>

<div class="header_r" style="margin-right: 2%; ">
  
    <div class="social-menu">
      <ul class="navbar-nav sm-icons" style="flex-direction: row;">
      <li type="button" style="border-radius: 100%;" class="btn btn-social-icon btn-facebook btn-rounded"><a href="https://www.facebook.com/PakPurza/"><i class="fa fa-facebook"></i></a></li>                                      
      <li type="button" style="border-radius: 100%;" class="btn btn-social-icon btn-twitter btn-rounded"><a href="https://twitter.com/pakpurza"><i class="fa fa-twitter"></i></a></li>
      <li type="button" style="border-radius: 100%;" class="btn btn-social-icon btn-linkedin btn-rounded"><a href="https://www.linkedin.com/company/pakpurzaofficial/"><i class="fa fa-linkedin"></i></a></li>
      <li type="button" style="border-radius: 100%;" class="btn btn-social-icon btn-instagram btn-rounded"><a href="https://www.instagram.com/pakpurza"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    
  
 </div>


</div>

 </nav> 
  