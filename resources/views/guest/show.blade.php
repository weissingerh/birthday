<x-base-layout>
    <x-slot name="content">
        <div class="container px-4 mx-auto">
            <h1 class="text-2xl font-bold "> Hi {{ $guest->name }} 🙋🏻‍♂️ </h1>
            <div class="max-w-xl my-4">
                <p class="mb-4 leading-relaxed">
                    Die Urlaubssaison ist in vollem Gange und ich möchte euch am <strong>13. August</strong> zu einem
                    Abend im 5-Sterne
                    <strong>Clubresort An der Haid 7 </strong> einladen. Ab <strong>19 Uhr </strong> coole Drinks und
                    ein gegrilltes
                    Menü auf euch,
                    bitte lasst mich über das Formular wissen wie ihr euch am liebsten ernährt.
                    Ihr könnt euch gerne dem Anlass entsprechend kleiden mit: Sandalen und Socken, Hawaiihemd, Kamera,
                    Sonnenhut usw…
                </p>
            </div>
            <form method="post" action="/guest/update/{{ $guest->id }}" x-data="{ coming: {{ $guest->coming ?? 1 }}, plus_one: {{ $guest->plus_one ?? 0 }}, plus_one_name: '{{ $guest->plus_one_name }}' }">
                @csrf
                <div class="my-8">
                    <label for="coming" class="text-sm">Ja, ich komme zur Feier! </label>
                    <div
                        class="relative inline-block w-20 mr-2 align-middle transition duration-200 ease-in select-none">
                        <input type="checkbox" name="coming" id="coming"
                            class="absolute w-8 h-8 text-white bg-white border-4 rounded-full appearance-none cursor-pointer border-green lock toggle-checkbox focus:border-none"
                            x-bind:checked="coming === 1" x-model="coming" />
                        <label for="coming"
                            class="block h-8 overflow-hidden rounded-full cursor-pointer bg-green toggle-label"></label>
                    </div>
                    <label for="coming" class="text-sm">Nein, ich komme nicht 👹</label>
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
                        <label class="block text-sm" for="plus_one_name">Name der +1</label>
                        <input type="text" class="text-black border-white rounded-lg form-input" name="plus_one_name"
                            id="plus_one_name" x-model="plus_one_name" value="{{ $guest->plus_one_name }}" />
                    </div>
                    <div>
                        <div>
                            <input class="text-red" type="radio" name="food_choice" id="meat" value="meat"
                                @checked($guest->food_choice === 'meat') />
                            <label for="meat">ich esse Fleisch</label>
                        </div>
                        <div>
                            <input class="text-green" type="radio" name="food_choice" id="vegetarian"
                                value="vegetarian" @checked($guest->food_choice === 'vegetarian') />
                            <label for="vegetarian">ich esse vegetarisch</label>
                        </div>
                        <div>
                            <input class=" text-green ring-green" type="radio" name="food_choice" id="vegan"
                                value="vegan" @checked($guest->food_choice === 'vegan') />
                            <label for="vegan">ich ernähre mich vegan</label>
                        </div>
                    </div>
                    <div class="my-4">
                        <label class="block mb-2" for="food_notes">Wünsche / Anmerkungen zu Essen</label>
                        <textarea name="food_notes" value="{{ $guest->food_notes }}" cols="30" rows="10"
                            class="w-full text-black border-white rounded-lg"></textarea>
                    </div>
                </div>
                <div class="my-2 md:flex md:space-x-6">
                    <button
                        class="w-full px-6 py-4 my-2 mt-6 font-medium text-center rounded-lg md:mt-0 md:w-1/2 bg-green hover:opacity-80 focus:opacity-80"
                        type="submit">Weiter</button>
                    @if ($guest->coming != null)
                        <a class="inline-block w-full px-6 py-4 my-2 mt-0 text-center text-white rounded-lg h-14 md:w-1/2 bg-blue hover:opacity-80 focus:opacity-80"
                            href="/">direkt zur
                            Startseite</a>
                    @endif
                </div>
            </form>
        </div>
    </x-slot>
</x-base-layout>
