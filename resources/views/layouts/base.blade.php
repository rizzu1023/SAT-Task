@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts</title>

  </head>
  <body>

    <div class="main">
      @yield('content')
    </div>


    <script src="{{asset('assets/Admin/js/jquery-1.11.1.min.js')}}"></script>


   @yield('script')

	<script src="{{asset('assets/Admin/js/scripts.js')}}"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('assets/Admin/js/bootstrap.js')}}"> </script>
  </body>
</html>
