<x-admin-layout>
    <x-flash-message/>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end p-2 m-2">
                <a class="px-4 py-2 bg-indigo-600 rounded-lg hover:bg-indigo-400 text-white" href="{{route('admin.tables.create')}}">Create New Table</a>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Number of guests
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Location
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$table->name}}
                                </th>
                                <td class="py-4 px-6">
                                    {{$table->guest_number}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$table->status}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$table->location}}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex space-x-2">
                                        
                                        <a href="{{route('admin.tables.edit',['table' => $table->id])}}" class="px-4 py-2 bg-slate-500 hover:bg-slate-700 rounded-md text-white">Edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-md text-white"
                                              action="{{route('admin.tables.destroy',['table' => $table->id])}}"
                                              method="POST">
                                              @csrf
                                              @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
