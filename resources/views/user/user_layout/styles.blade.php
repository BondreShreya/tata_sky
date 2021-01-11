<link rel="icon" href="{{ asset('adminAsset/img/icon.ico') }}" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="{{ asset('adminAsset/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: {"families":["Open+Sans:300,400,600,700"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('adminAsset/css/fonts.css') }}']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('adminAsset/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAsset/css/azzara.min.css') }}">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('adminAsset/css/demo.css') }}">