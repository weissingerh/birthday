<x-base-layout>
    <x-slot name="content">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-white"> Merci {{ $guest->name }}! </h1>
            <p class="my-10 text-white">
                Schade, dass du nicht kommen kannst. Sollte sich was bei dir ändern, kannst du über den
                selben Link jederzeit angeben, dass du doch kommst!
            </p>
            <a class="inline-block w-full max-w-sm px-10 py-4 mx-auto font-bold text-center text-white rounded-lg bg-primary"
                href="/">zur
                Startseite</a>
        </div>
    </x-slot>
</x-base-layout>
