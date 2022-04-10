<!doctype html>
<html class="no-js" lang="de">

<x-head></x-head>
<body>
    <x-nav></x-nav>
        <main>
            {{$slot}}
        </main>
    <x-footer></x-footer>
    <script src={{ mix('js/app.js') }}></script>
</body>

</html>
