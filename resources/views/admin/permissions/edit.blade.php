<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-2">
                <div class="flex">
                    <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 text-slate-700 text-sm bg-slate-300 hover:bg-slate-400 rounded-md">Permissions Index</a>
                </div>
                <div class="flex flex-col py-2">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10 bg-slate-100 rounded p-6">
                        <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Permission name </label>
                                <div class="mt-1">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="block w-full appearance-none bg-white border border-gray-200 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           value="{{ $permission->name }}"
                                    />
                                </div>
                                @error('name') <span class="text-red-400 text-sm">This field is required</span> @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-6 py-2 text-sm bg-green-200 text-green-700 font-bold hover:bg-green-300 rounded-md">Update Permission</button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="mt-6 bg-slate-100 w-1/2 rounded p-6">
                    <h1 class="text-2xl font-semibold">
                        Roles
                    </h1>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($permission->roles)
                            @foreach($permission->roles as $permission_role)

                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $permission_role->name }}</button>
                                </form>

                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3">
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role') <span class="text-red-400 text-sm">This field is required</span> @enderror
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-6 py-2 text-sm bg-green-200 text-green-700 font-bold hover:bg-green-300 rounded-md">Assign Permission</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
