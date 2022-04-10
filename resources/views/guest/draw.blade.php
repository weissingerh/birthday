<x-base-layout>
    <x-slot name="content">
        <form method="post" class="drawing-form" action="{{route('guest.draw.save', $guest)}}">
            @csrf
            <div class="w-4 h-4 my-2 rounded-lg cursor-pointer bg-blue" onClick="window.clearCanvas">x</div>
            <div id="canvas-container" class="h-[600px] mb-10 bg-white rounded-lg">
                <div id="canvas" class="w-full h-full"></div>
                <input type="hidden" name="drawing">
                <button id="submit-drawing" class="w-full px-6 py-4 my-6 font-bold text-center rounded-lg bg-purple hover:opacity-80 focus:opacity-80">Weiter</button>
            </div>
        </form>
    </x-slot>
</x-base-layout>
