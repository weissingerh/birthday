<x-base-layout>
    <x-slot name="content">
        <div class="px-4">
            <h1 class="text-2xl font-bold text-white"> Hi {{ $guest->name }} 🙋🏻‍♀️ </h1>
            <div class="max-w-xl my-4 text-white">
                <p class="mb-4 leading-relaxed">
                    Das <span class="font-black">HANNAPALOOZA</span> feiert das 25. Jubiläum mit einer exklusiven
                    Sonderveranstaltung und du wurdest als Special Act ausgewählt! Die VIP Veranstaltung findet am 28.
                    Mai ab 15 Uhr auf der Donauinsel beim Grillplatz 10 auf der Donauinsel statt. Bei Schlechtwetter
                    wird in der Canisiusgasse 16 im Partykeller gefeiert, das wird rechtzeitig bekannt gegeben.
                </p>
                <p>
                    Komm in deinem besten Festival-Outfit und nimm dir etwas Grillbares mit. Ich werde Beilagen sowie
                    Bier und Wein besorgen, bring gerne auch selbst was mit!
                </p>
            </div>
            <form method="post" action="/guest/update/{{ $guest->id }}" class="text-white"
                x-data="{ coming: {{ $guest->coming ?? 1 }}, plus_one: {{ $guest->plus_one ?? 0 }}, plus_one_name: '{{ $guest->plus_one_name }}' }">
                @csrf
                <div class="my-8">
                    <label for="coming" class="text-sm text-white">Ja, ich komme zur Feier! </label>
                    <div
                        class="relative inline-block w-20 mr-2 align-middle transition duration-200 ease-in select-none">
                        <input type="checkbox" name="coming" id="coming"
                            class="absolute w-8 h-8 text-white bg-white border-4 rounded-full appearance-none cursor-pointer border-green lock toggle-checkbox focus:border-none"
                            x-bind:checked="coming === 1" x-model="coming" />
                        <label for="coming"
                            class="block h-8 overflow-hidden rounded-full cursor-pointer bg-green toggle-label"></label>
                    </div>
                    <label for="coming" class="text-sm text-white">Nein, ich komme nicht 👹</label>
                </div>
                <div x-show="coming">
                    <div class="my-4">
                        <input name="plus_one" id="plus_one" type="checkbox"
                            class="border-white rounded-sm form-checkbox text-purple" x-model="plus_one"
                            @checked($guest->plus_one) />
                        <label for="plus_one" class="text-sm">Ich nehme eine +1 mit<br> <span
                                class="text-xs leading-tight">PartnerInnen, FreundInnen, GspusInnen und Herzensmenschen
                                - alle willkommen :)</span></label>
                    </div>
                    <div class="my-4" x-show="plus_one">
                        <label class="block text-sm" for="plus_one_name ">Name der +1 (optional, just because I'm
                            nosey)</label>
                        <input type="text" class="text-black rounded-lg form-input" name="plus_one_name"
                            id="plus_one_name" x-model="plus_one_name" value="{{ $guest->plus_one_name }}" />
                    </div>
                    <div>
                        <div>
                            <input class=" text-yellow" type="radio" name="beer" id="beer" value="1"
                                @checked($guest->beer === 1) />
                            <label for="beer">ich trinke lieber Bier 🍺</label>
                        </div>
                        <div>
                            <input class="text-green" type="radio" name="beer" id="wine" value="0"
                                @checked($guest->beer === 0) />
                            <label for="wine">ich trinke lieber Wein 🍷</label>
                        </div>
                        <div>
                            <input class="text-orange" type="radio" name="beer" id="none" value=""
                                @checked($guest->beer === null) />
                            <label for="none">ich trinke garnicht 🧃</label>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full px-6 py-4 my-6 font-bold text-center rounded-lg bg-purple hover:opacity-80 focus:opacity-80"
                    type="submit">Weiter</button>
            </form>
        </div>
    </x-slot>
</x-base-layout>
