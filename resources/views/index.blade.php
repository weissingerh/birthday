<x-base-layout>
    <x-slot name="content">
        <div class="container mx-auto">
            {{-- <img src="{{ 'storage/' . asset($drawings) }}" alt="test"> --}}
            <div>
                <img src="{{ asset('assets/hannapalooza.svg') }}" alt="hannapalooza"
                    class="w-1/3 mx-auto md:max-w-xs" />
            </div>
            <div class="w-full mx-auto my-8 text-3xl text-center md:text-5xl lineup">
                <div class="my-4 text-xl text-center md:text-2xl text-yellow">
                    <span>Samstag, 28. Mai 2022</span> ∙
                    <a class="underline" href="https://goo.gl/maps/zi1UhJrPcA2QqmK76" target="_blank">Grillplatz 10,
                        Donauinsel Wien</a>
                </div>
                <div class="w-full text-white">
                    <span class="text-4xl md:text-6xl">Hanna</span>
                    <div>
                        @foreach ($guestNames->chunk(4) as $chunk)
                            <div class="my-1">
                                @foreach ($chunk as $guest)
                                    <span class="font-bold uppercase">
                                        {{ $guest }}
                                        @if (!$loop->last)
                                            <span class="text-pink">∙</span>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="max-w-xl px-6 mx-auto mb-10 text-white">
                <p class="mb-4 leading-relaxed">
                    Das <span class="font-black">HANNAPALOOZA</span> feiert das 25. Jubiläum mit einer exklusiven
                    Sonderveranstaltung und du wurdest als Special Act ausgewählt! Die VIP Veranstaltung findet am 28.
                    Mai
                    ab 15 Uhr auf der Donauinsel beim Grillplatz 10 auf der Donauinsel statt. Bei Schlechtwetter wird in
                    der
                    Canisiusgasse 16 im Partykeller gefeiert, das wird rechtzeitig bekannt gegeben.
                </p>
                <p>
                    Komm in deinem besten Festival-Outfit und nimm dir etwas Grillbares mit. Ich werde Beilagen sowie
                    Bier
                    und Wein besorgen, bring gerne auch selbst was mit!
                </p>
            </div>
            <div class="w-full mx-auto text-center lineup">
                <h2 class="text-xl text-center md:text-2xl text-yellow">Line Up Gallery</h2>
                @if (count($drawings) > 0)
                    <div id="splide" class="py-10 mx-auto splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($guests as $guest)
                                    @if ($guest->img)
                                        <li class="py-2 splide__slide">
                                            <img src="{{ $guest->img }}" alt="drawing" class="mb-2" />
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
