<x-base-layout>
    <x-slot name="content">
        <div class="container px-4 mx-auto">
            <h1 class="text-2xl font-bold text-white">Grüße, {{ $guest->name }}. 🌱</h1>
            <div class="max-w-xl my-4 text-white">
                <p class="mb-4 leading-relaxed">
                    Als wahre:r Naturbursch:in wurdest ausgewählt an der ersten Ausgabe von Hanna vs. Wild teilzunehmen!
                    Begib dich am <br><strong>18. Mai ab 15:00</strong> zu den Koordinaten <a class="underline"
                        href="https://goo.gl/maps/UgcAz1Kr1FmfBGCC9" target="_blank">48.251798, 16.383444</a>, um an dem
                    Outdoor-Spektakel in der Wildnis der Wiener Donauinsel teilzunehmen.
                </p>
                <p>Tritt gegen deine Konkurrent:innen in spannenden Spielen wie Flunkyball oder "wer brät das schönste
                    (Veggie)-Würstchen" an und beweise dich als wahre:r Survival-Queen/-King.*</p>
                <p class="mt-4">
                    Gegenstände die du mitbringen solltest:
                </p>
                <ul class="my-4 list-disc list-inside">
                    <li>Grillgut</li>
                    <li>Sonnenbrille</li>
                    <li>warme Kleidung für den Abend</li>
                </ul>
                <p>
                    Für gutes Wetter**, Bier und Wein & Beilagen wird wieder gesorgt sein, bring aber auch gerne selbst
                    was mit.
                </p>
                <p class="mt-4">
                    <small class="mt-2">* für das Stattfinden der Challenges wird keine Garantie gegeben. Und Eltern
                        haften für
                        ihre Kinder.
                        oder so. besonders bei den Trinkspielen.</small><br>
                    <small class="mt-2">** sollte es zu Lieferschwierigkeiten kommen, werden wir das Happening in die
                        Schönngasse 14/13, 1020
                        Wien verlegen.</small>
                </p>
            </div>
            <form method="post" action="/guest/update/{{ $guest->id }}" class="text-white" x-data="{ coming: {{ $guest->coming ?? 1 }}, plus_one: {{ $guest->plus_one ?? 0 }}, plus_one_name: '{{ $guest->plus_one_name }}' }">
                @csrf
                <div class="my-8">
                    <label for="coming" class="text-sm text-white">Ja, ich komme zur Feier! </label>
                    <div
                        class="relative inline-block w-20 mr-2 align-middle transition duration-200 ease-in select-none">
                        <input type="checkbox" name="coming" id="coming"
                            class="absolute w-8 h-8 text-white bg-white border-4 rounded-full appearance-none cursor-pointer border-fifthy lock toggle-checkbox focus:border-none"
                            x-bind:checked="coming === 1" x-model="coming" />
                        <label for="coming"
                            class="block h-8 overflow-hidden rounded-full cursor-pointer bg-fifthy toggle-label"></label>
                    </div>
                    <label for="coming" class="text-sm text-white">Nein, ich komme nicht 👹</label>
                </div>
                <div x-show="coming">
                    <div class="my-4">
                        <input name="plus_one" id="plus_one" type="checkbox"
                            class="border-white rounded-sm form-checkbox text-secondary" x-model="plus_one"
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
                            <input class=" text-fifthy" type="radio" name="beer" id="beer" value="1"
                                @checked($guest->beer === 1) />
                            <label for="beer">ich trinke lieber Bier 🍺</label>
                        </div>
                        <div>
                            <input class="text-fifthy" type="radio" name="beer" id="wine" value="0"
                                @checked($guest->beer === 0) />
                            <label for="wine">ich trinke lieber Wein 🍷</label>
                        </div>
                        <div>
                            <input class="text-fourthy" type="radio" name="beer" id="none" value=""
                                @checked($guest->beer === null) />
                            <label for="none">ich trinke garnicht 🧃</label>
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="wish">Wünsche, Beschwerden, Anregungen, Kapitulationen?</label> <br>
                        <textarea name="wish" id="wish" cols="30" rows="10"
                            class="w-full max-w-xl text-black rounded-lg form-input">{{ $guest->wish ?? null }}</textarea>
                    </div>
                </div>
                <div class="my-2 md:flex md:space-x-6">
                    <button
                        class="w-full px-6 py-4 my-2 mt-6 font-bold text-center rounded-lg md:mt-0 md:w-1/2 bg-secondary hover:opacity-80 focus:opacity-80"
                        type="submit">Weiter</button>
                    @if ($guest->coming != null)
                        <a class="inline-block w-full px-6 py-4 my-2 mt-0 font-bold text-center text-white rounded-lg h-14 md:w-1/2 bg-tertiary hover:opacity-80 focus:opacity-80"
                            href="/">direkt zur
                            Startseite</a>
                    @endif
                </div>
            </form>
        </div>
    </x-slot>
</x-base-layout>
