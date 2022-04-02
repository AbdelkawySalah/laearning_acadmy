<!doctype html>
<html lang="en">

<head>
    @include('front.layouts.head')
</head>

<body>
    <!--::header part start::-->
      @include('front.layouts.navbar')
    <!-- Header part end-->
       @yield('content')
        
    <!--::blog_part end::-->

    <!-- footer part start-->
       @include('front.layouts.footer')
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
      @include('front.layouts.footer_scripts')

</body>

</html>