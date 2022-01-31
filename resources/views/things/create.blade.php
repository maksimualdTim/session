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
                    <h4 style="border-bottom: 1px solid black;padding-bottom:15px;margin-bottom:35px;">Create New Thing</h4>
                    <form class="create" action="{{ route('saveNewThing') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name of thing</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Description</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Date wrnt</label>
                            <input type="date" class="form-control" id="exampleInputPassword2" name="wrnt">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>