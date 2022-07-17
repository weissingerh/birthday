<x-base-layout>
    <x-slot name="content">
        <div class="container px-4 mx-auto">
            <h1 class="text-2xl font-bold">Cheese!</h1>
            <p class="my-2">
                Wir benötigen noch ein Bild für die Reiseunterlagen.
                @if ($guest->plus_one)
                    Bitte zeichne ein Portrait von dir und deiner Begleitung!
                @else
                    Bitte zeichne ein Portrait von dir!
                @endif
            </p>
            @if ($guest->img)
                <div class="w-full px-4 py-2 my-2 rounded bg-orange">
                    Achtung! Deine bereits gespeicherte Zeichnung wird überschrieben, wenn du auf "Weiter" drückst. Wenn
                    du das verhindern möchtest, geh auf "direkt zur Startseite".
                </div>
            @endif
            <form method="post" class="drawing-form" action="{{ route('guest.draw.save', $guest) }}">
                @csrf
                <button type="reset" id="clear-canvas"
                    class="px-4 my-2 rounded-lg cursor-pointer bg-pink">rückgängig</button>
                <span id="undo-canvas" class="px-4 my-2 rounded-lg cursor-pointer bg-blue">von vorne beginnen</span>

                <div id="canvas-container"
                    class="my-4 mx-auto w-full max-w-[450px] h-[600px] mb-10 bg-[#78716C] rounded-lg">
                    <canvas id="canvas" class="w-full h-full"></canvas>
                    <input type="hidden" name="drawing">
                </div>

                <div class="md:flex md:space-x-6">
                    <button id="submit-drawing"
                        class="w-full px-6 py-4 my-2 text-center text-white rounded-lg bg-green hover:opacity-80 focus:opacity-80">Weiter</button>
                    @if ($guest->img)
                        <a class="inline-block w-full px-6 py-4 my-2 text-center text-white rounded-lg h-14 md:w-1/2 bg-blue hover:opacity-80 focus:opacity-80"
                            href="/">direkt zur
                            Startseite</a>
                    @endif
                </div>
            </form>
        </div>
    </x-slot>
</x-base-layout>
