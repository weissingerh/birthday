<x-base-layout>
    <x-slot name="content">
        <div class="container mx-auto">
            <h1 class="text-5xl font-bold text-center uppercase text-tertiary">Hanna vs. Wild</h1>
            <div class="w-full mx-auto my-8 text-3xl text-center md:text-5xl lineup">
                <div class="my-4 text-xl text-center md:text-2xl text-fifthy">
                    <span>Donnerstag, 18. Mai 2023</span> 🔥
                    <a class="underline" href="https://goo.gl/maps/UgcAz1Kr1FmfBGCC9" target="_blank">48.251798,
                        16.383444</a>
                </div>
                <div class="w-full text-white">
                    <span class="text-4xl ">{{ $guestCount }} vs. Wild</span>
                </div>
            </div>
            <div class="max-w-xl px-6 mx-auto mb-10 text-white">
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
            <div class="w-full mx-auto text-center lineup">
                <h2 class="text-xl text-center md:text-2xl text-fifthy">Die Teilnehmer:innen</h2>
                @if (count($drawings) > 0)
                    <div id="splide" class="py-10 mx-auto splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($guests as $guest)
                                    @if ($guest->img)
                                        <li class="p-2 splide__slide">
                                            <img src="storage/{{ $guest->img }}" alt="drawing" class="mb-2" />
                                            <span class="text-lg text-white">{{ $guest->name }}
                                                {{ $guest->plus_one_name ? ' + ' . $guest->plus_one_name : '' }}
                                            </span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-base-layout>
