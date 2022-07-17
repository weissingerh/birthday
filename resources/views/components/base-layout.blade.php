<!doctype html>
<html class="min-h-screen overflow-x-hidden text-white no-js bg-gradient-to-b from-blue to-orange" lang="de">
<x-head></x-head>

<body class="relative h-full px-2 md:px-6">
    <x-nav></x-nav>
    <main>
        {{ $content }}
    </main>
</body>
<script src={{ mix('js/app.js') }}></script>

</html>
