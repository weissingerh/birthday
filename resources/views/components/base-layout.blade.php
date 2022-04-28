<!doctype html>
<html class="overflow-x-hidden no-js " lang="de">
<x-head></x-head>

<body class="relative h-full min-h-screen px-2 md:px-6 bg-gradient-to-b from-purple to-orange">
    <x-nav></x-nav>
    <main>
        {{ $content }}
    </main>
</body>
<script src={{ mix('js/app.js') }}></script>

</html>
