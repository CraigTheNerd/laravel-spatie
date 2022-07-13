<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <div class="flex">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 text-slate-700 text-sm bg-slate-300 hover:bg-slate-400 rounded-md">Role Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Role name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-200 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-6 py-2 text-sm bg-green-200 text-green-700 font-bold hover:bg-green-300 rounded-md">Create Role</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
