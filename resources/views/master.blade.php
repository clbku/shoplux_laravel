<!DOCTYPE html>
<html lang="en">
@include ('layout.headtag')
<body>
@include ('layout.header-top')
@include ('layout.header-mid')
@include ('layout.header-bottom')
@yield ('content')
@include ('layout.footer')
@yield('script');
</body>
</html>