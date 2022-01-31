<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Things') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="create" action="{{ url('places', ['id' => $place->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name of place</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $place->name }}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Description</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{ $place->description }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Repair</label>
                            <select name="repair" id="exampleInputPassword2">
                                <option @if ($repair === 0)
                                    selected
                                @endif value="0">Нигде</option>
                                <option @if ($repair === 1)
                                    selected
                                @endif value="1">мойка</option>
                                <option @if ($repair === 2)
                                    selected
                                @endif value="2">ремонт</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword3" class="form-label">Work</label>
                            <input type="checkbox" class="form-control" id="exampleInputPassword3" name="work" value="1" @if ($work)
                                checked
                            @endif>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
