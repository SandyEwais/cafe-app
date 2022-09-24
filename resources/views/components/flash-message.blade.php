

@if (Session::has('store'))
    <div x-data={show:true} x-init="setTimeout(() => show =false,3000)" x-show="show" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">Success alert! </span> {{Session::get('store')}}
    </div>
@endif
@if (Session::has('delete'))
<div x-data={show:true} x-init="setTimeout(() => show =false,3000)" x-show="show" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <span class="font-medium">Deletion alert! </span> {{Session::get('delete')}}
</div>
@endif
@if (Session::has('update'))
<div x-data={show:true} x-init="setTimeout(() => show =false,3000)" x-show="show" class="p-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-700 dark:text-blue-300" role="alert">
    <span class="font-medium">Update alert! </span> {{Session::get('update')}}
</div>
@endif

{{-- <div x-data={show:true} x-init="setTimeout(() => show =false,3000)" class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
</div> --}}

{{-- <div x-data={show:true} x-init="setTimeout(() => show =false,3000)" class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
    <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
</div> --}}


  