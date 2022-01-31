<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Places') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="create__link">
                        <a href="{{ route('createPlace') }}">
                            create new
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($places)
        @foreach ($places as $place)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200" style="display: flex; justify-content:space-between;">
                            <div>
                                <a href="{{ url('places', ['id' => $place->id]) }}">{{ $place->name }}</a>
                            </div>
                            <div>
                                <a href="{{ url('places', ['id' => $place->id]) }}/edit">Edit</a>
                                <a href="{{ url('places', ['id' => $place->id]) }}/delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</x-app-layout>
