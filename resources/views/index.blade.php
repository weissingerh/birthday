<x-base-layout>
    <x-slot name="content">
        <div class="container mx-auto">
            {{-- <img src="{{ 'storage/' . asset($drawings) }}" alt="test"> --}}
            <div>
                <img src="{{ asset('assets/logo-klausi.svg') }}" alt="hannapalooza" class="w-1/3 mx-auto md:max-w-xs" />
            </div>
            <div class="w-full mx-auto my-8 text-3xl text-center md:text-5xl lineup">
                <div class="my-4 text-xl text-center text-white md:text-2xl">
                    <span>Samstag, 13. August 2022</span> ∙
                    <a class="underline" href="https://goo.gl/maps/mQ6zS9iHGvQuwpLv7" target="_blank">An der Haid 7, 3500
                        Krems</a>
                </div>
                <div class="flapper S" id="Klausi"></div>
                @foreach ($guestNames as $guest)
                    <div class="flapper S" id="{{ $guest }}"></div>
                @endforeach
            </div>
            <div class="max-w-xl px-6 mx-auto mb-10 ">
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
            <div class="w-full mx-auto text-center lineup">
                <h2 class="text-xl text-center text-white md:text-2xl">Die Reisenden</h2>
                @if (count($drawings) > 0)
                    <div id="splide" class="py-10 mx-auto splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($guests as $guest)
                                    @if ($guest->img)
                                        <li class="p-2 splide__slide">
                                            <img src="storage/{{ $guest->img }}" alt="drawing" class="mb-2" />
                                            <span class="text-lg ">{{ $guest->name }}
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
