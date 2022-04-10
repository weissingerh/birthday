<!doctype html>
<html class="no-js" lang="de">

<x-head></x-head>
<body class="h-screen px-6 bg-gradient-to-b from-purple to-orange">
    <x-nav></x-nav>
        <main>
            {{$content}}
        </main>
    <x-footer></x-footer>
    <script src={{ mix('js/app.js') }}></script>
</body>

</html>
