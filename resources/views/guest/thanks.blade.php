<x-base-layout>
    <x-slot name="content">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-white"> Merci {{ $guest->name }}! </h1>
            <p class="my-10 text-white">
                Danke fürs Bescheid geben und dein künstlerisches Schaffen. Alle Infos findest du jederzeit auf der
                Startseite!
            </p>
            <a class="inline-block w-full max-w-sm px-10 py-4 mx-auto font-bold text-center text-white rounded-lg bg-tertiary"
                href="/">zur Startseite</a>
        </div>
    </x-slot>
</x-base-layout>
