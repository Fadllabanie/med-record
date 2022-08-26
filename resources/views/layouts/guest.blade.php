
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>السجلات الطبية | @yield('title', '')</title>

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  <livewire:styles />
</head>
<body class="hold-transition login-page">

    {{ $slot }}

  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
  
  <livewire:scripts />
</body>
</html>
