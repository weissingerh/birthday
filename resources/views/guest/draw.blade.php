<x-base-layout>
    <x-slot name="content">
        <h1 class="text-2xl font-bold text-white">Headshot!</h1>
        <p class="my-2 text-white">
            Wir benötigen noch ein Bild fürs Lineup.
            @if ($guest->plus_one)
                Bitte zeichne ein Portrait von dir und deiner Begleitung!
            @else
                Bitte zeichne ein Portrait von dir!
            @endif
        </p>

        <form method="post" class="drawing-form" action="{{ route('guest.draw.save', $guest) }}">
            @csrf
            <button type="reset" id="clear-canvas"
                class="px-4 my-2 text-white rounded-lg cursor-pointer bg-pink">reset</button>
            <div id="canvas-container" class="h-[450px] mb-10 bg-white rounded-lg">
                <canvas id="canvas" class="w-full h-full"></canvas>
                <input type="hidden" name="drawing">
            </div>
            <button id="submit-drawing"
                class="w-full px-6 py-4 my-6 font-bold text-center rounded-lg bg-purple hover:opacity-80 focus:opacity-80">Weiter</button>
        </form>
    </x-slot>
</x-base-layout>
