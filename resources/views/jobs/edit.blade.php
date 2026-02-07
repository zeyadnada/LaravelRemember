<x-layout>

    <x-slot:heading>
Edit Job: {{ $job->title }}
    </x-slot:heading>
<form method="POST" action="/jobs/{{ $job->id }}">
  @csrf
@method('PATCH')

  <div class="space-y-12">
    <div class="border-b border-black/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-black">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-black/5 pl-3 outline-1 -outline-offset-1 outline-black/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="title" type="text" name="title" value="{{ $job->title }}"  placeholder="Director" required class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-black placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
            </div>
            @error('title')
              <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>

          <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-black">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-black/5 pl-3 outline-1 -outline-offset-1 outline-black/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="salary" type="text" name="salary" value="{{ $job->salary }}" placeholder="$50,000 Per Year" required class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-black placeholder:text-gray-500 focus:outline-none sm:text-sm/6"  />
            </div>
               @error('salary')
              <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
            @enderror
           </div>
          </div>

         
      </div>
    </div>


   
  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center">
<button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
    </div>

    <div class="flex items-center gap-x-6">
    <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-black">Cancel </a>
    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
    </div>
   
  </div>
</form>

<form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')
</form>

</x-layout>

