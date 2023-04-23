<!doctype html>
<html class="min-h-screen overflow-x-hidden no-js bg-primary from-secondary to-fourthy" lang="de">
<x-head></x-head>

<body class="relative h-full px-2 md:px-6">
    <x-nav></x-nav>
    <main>
        {{ $content }}
    </main>
</body>
<script src={{ mix('js/app.js') }}></script>

</html>
