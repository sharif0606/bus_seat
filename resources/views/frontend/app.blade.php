@php $site_setting=\App\Models\Setting::first(); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Seat | @yield('siteTitle', 'Home')</title>
    <!-- Roboto Font CDN-->
    <link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">

    <!-- Bootstrap CDN Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style Css Link -->
    <link rel="stylesheet" href="{{asset('assets/bus_tour/css/style.css')}}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@stack('styles') 
</head>

<body>
    
    <header>
      <nav class="navbar navbar-expand-lg bg-white bg-light navbar-light shadow-sm">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="{{asset('assets/bus_tour/images/logo_army.png')}}" class="bg-black bg-dark" alt="" width="40" height="45"/>
            </a>
              <button class="navbar-toggler text-light"  type="button"  data-bs-toggle="collapse" data-bs-target="#btn"      aria-controls="btn" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="btn">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3">
                        <a class="nav-link active navLinkText fw-600" aria-current="page" href="{{route('home')}}">Home</a >
                    </li>
                </ul>
          </div>
        </div>
      </nav>
    </header>
    @yield('content')
</body>
<!-- Bootstrap Cdn js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
<script type="text/javascript">  
    function change_language(e){
        var url = "{{ route('LangChange') }}";
        window.location.href = url + "?lang="+ e.value;
    }
</script>

@stack('scripts')
</html>