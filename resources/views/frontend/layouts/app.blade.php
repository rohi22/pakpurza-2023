<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Make this Dynamic -->
	<meta name="keywords" content=""/>
	<meta name="author" content=""/>
	<meta name="robots" content=""/>
	<meta name="description" content="Pak Purza"/>
	<meta property="og:title" content="Pak Purza"/>
	<meta property="og:description" content="Pak Purza"/>
	<meta property="og:image" content=""/>
	<meta name="format-detection" content="telephone=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pak Purza</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
   
    @yield('styles')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Pak Purza - Home</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owlcarousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="frontend/css/owlcarousel/owl.theme.default.min.css" />


</head>
       
<body class="home2">
           

            @include('frontend.partials.navbar1')
            <div class="main">
                @yield('content')
            </div>
             @include('frontend.partials.footer')
            
    
        <!-- JAVASCRIPT FILES ========================================= -->

          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('frontend/js/owlcarousel/owl.carousel.min.js') }}"></script>
{{-- <script src="{{ asset('frontend/js/custom.js') }}"></script> --}}
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
  <script type="text/javascript">
    $(function () {
      var code = "+92"; // Assigning value from model.
      $('#txtPhone1').val(code);
      $('#txtPhone1').intlTelInput({
        autoHideDialCode: true,
        autoPlaceholder: "ON",
        dropdownContainer: document.body,
        formatOnDisplay: true,
        hiddenInput: "full_number",
        initialCountry: "auto",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['US'],
        separateDialCode: true
      });
      $('#btnSubmit').on('click', function () {
        var code = $("#txtPhone1").intlTelInput("getSelectedCountryData").dialCode;
        var phoneNumber = $('#txtPhone1').val();
        var name = $("#txtPhone1").intlTelInput("getSelectedCountryData").name;
        alert('Country Code : ' + code + '\nPhone Number : ' + phoneNumber + '\nCountry Name : ' + name);
      });
    });
  </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>



    </body>
  </html>