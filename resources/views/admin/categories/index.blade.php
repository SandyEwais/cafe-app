
<x-admin-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end p-2 m-2">
                <a class="px-4 py-2 bg-indigo-600 rounded-lg hover:bg-indigo-400 text-white" href="{{route('admin.categories.create')}}">Create New Category</a>
            </div>
            
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->name}}
                </th>
                <td class="py-4 px-6">
                    <img class="w-16 h-16" src="{{asset('storage/'.$category->image)}}" alt="">
                </td>
                <td class="py-4 px-6">
                    {{$category->description}}
                </td>
                
                <td class="py-6 px-6">
                    <div class="flex space-x-2">
                        
                        <a href="{{route('admin.categories.edit',['category' => $category->id])}}" class="px-4 py-2 bg-slate-500 hover:bg-slate-700 rounded-md text-white">Edit</a>
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-md text-white"
                              action="{{route('admin.categories.destroy',['category' => $category->id])}}"
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
    <x-flash-message/>
</x-admin-layout>
