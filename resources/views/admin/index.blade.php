<x-base-layout>
    <x-slot name="content">
        <table class="table border">
            <thead>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">zugesagt</th>
                <th class="p-2 border">URL</th>
                <th class="p-2 border">+1</th>
                <th class="p-2 border">+1 Name</th>
                <th class="p-2 border">Beer</th>
                <th class="p-2 border">Wünsche</th>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                    <tr class="border @if ($guest->coming === 0) line-through @endif">
                        <td class="p-2 border"><strong>{{ $guest->name . ' ' . $guest->last_name }}</strong></td>
                        <td class="p-2 border">{{ $guest->coming }}</td>
                        <td class="p-2 border"><a href="{{ $guest->url }}" class="hover:underline">URL</a></td>
                        <td class="p-2 border">{{ $guest->plus_one }}</td>
                        <td class="p-2 border">{{ $guest->plus_one ? $guest->plus_one_name : '/' }}</td>
                        <td class="p-2 border">{{ $guest->beer }}</td>
                        <td class="p-2 border">{{ $guest->wish }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-base-layout>
