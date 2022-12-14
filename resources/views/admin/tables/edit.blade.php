
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            

            
<form method="POST" action="{{route('admin.tables.update',['table' => $table->id])}}">
    @csrf
    @method('PUT')
    <div class="relative z-0 mb-6 w-full group">
        <input value="{{$table->name}}" type="text" name="name" id="floating_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
        <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
        <p class="text-sm text-red-600">
            @error('name')
                {{$message}}
            @enderror
        </p>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        <input value="{{$table->guest_number}}" type="text" name="guest_number" id="floating_guest_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
        <label for="floating_quest_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number Of Guests</label>
        <p class="text-sm text-red-600">
            @error('guest_number')
                {{$message}}
            @enderror
        </p>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select Status</label>
        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
            @foreach (App\Enums\TableStatus::cases() as $status)
                <option {{$table->status == $status->value ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
            @endforeach
        </select>
        <p class="text-sm text-red-600">
            @error('status')
                {{$message}}
            @enderror
        </p>

    </div>
    <div class="relative z-0 mb-6 w-full group">
        
        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select Location</label>
        <select name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach (App\Enums\TableLocation::cases() as $location)
                <option {{$table->location == $location->value ? 'selected' : ''}} value="{{$location->value}}">{{$location->name}}</option>
            @endforeach
        </select>
        <p class="text-sm text-red-600">
            @error('location')
                {{$message}}
            @enderror
        </p>

    </div>
    


    
   <div class="flex space-x-2">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    <a class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800" href="{{url()->previous()}}">Back</a>
   </div>
    
  </form>
  
            



        </div>
    </div>
</x-admin-layout>
