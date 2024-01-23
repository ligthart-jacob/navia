<x-layout>
    <meta name="_characters" content="{{json_encode($characters)}}">
    <x-update-character :series="$series" :current="$current" />
    <x-forms :series="$series" :current="$current" />
    <x-collection :order="$order" :sort="$sort">
        @unless (count($characters))
            <span class="text-gray-300 text-lg small-caps">no characters or series found...</span>
        @else
            @foreach ($characters as $character)
                <x-card :character="$character" />
            @endforeach
        @endunless
    </x-collection>
</x-layout>