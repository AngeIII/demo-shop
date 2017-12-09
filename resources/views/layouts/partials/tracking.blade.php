@if (App::environment() === 'live')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-38016369-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag () {dataLayer.push(arguments);}

      gtag('js', new Date());

      gtag('config', 'UA-38016369-3');
    </script>
@endif
