<x-base-layout>
    <x-slot name="content">
        <h1 class="text-2xl font-bold text-white"> Hi {{$guest->name}} 🙋🏻‍♀️ </h1>
        <p class="text-white">
            hard facts
        </p>
        <form method="post" action="/guest/update/{{$guest->id}}" class="text-white" x-data="{coming: {{$guest->coming}}, plus_one : {{$guest->plus_one}}, plus_one_name: '{{$guest->plus_one_name}}'}">
            @csrf
            <div class="my-8">
                {{-- <input type="radio" name="coming" id="true" value="true" class="my-2 form-radio text-purple"/> <label class="" for="true">Ja, ich komme zur Feier!</label><br>
                <input type="radio" name="coming" id="false" value="false" class="my-2 form-radio text-purple"/> <label class="" for="false">Nein, ich komme nicht 👹</label><br> --}}

                <label for="coming" class="text-sm text-white">Ja, ich komme zur Feier! </label>
                <div class="relative inline-block w-20 mr-2 align-middle transition duration-200 ease-in select-none">
                    <input type="checkbox" name="coming" id="coming" class="absolute w-8 h-8 text-white bg-white border-4 rounded-full appearance-none cursor-pointer border-green lock toggle-checkbox focus:border-none" x-bind:checked="coming === 1" x-model="coming"/>
                    <label for="coming" class="block h-8 overflow-hidden rounded-full cursor-pointer bg-green toggle-label"></label>
                </div>
                <label for="coming" class="text-sm text-white">Nein, ich komme nicht 👹</label>
            </div>
            <div x-show="coming">
                <div class="my-4">
                    <input name="plus_one" x-bind:checked="plus_one === 1" id="plus_one" type="checkbox" class="border-white rounded-sm form-checkbox text-purple" x-model="plus_one"/>
                    <label for="plus_one" class="text-sm">Ich nehme eine +1 mit<br> <span class="text-xs leading-tight">PartnerInnen, FreundInnen, GspusInnen und Herzensmenschen - alle willkommen :)</span></label>
                </div>
                <div class="my-4" x-show="plus_one">
                    <label class="block text-sm" for="plus_one_name ">Name der +1 (optional, just because I'm nosey)</label>
                    <input type="text" class="text-black rounded-lg form-input" name="plus_one_name" id="plus_one_name" x-model="plus_one_name" />
                </div>
            </div>
            <button class="w-full px-6 py-4 my-6 font-bold text-center rounded-lg bg-purple hover:opacity-80 focus:opacity-80" type="submit">Weiter</button>
        </form>
    </x-slot>
</x-base-layout>
