<x-layout>

    <x-slot:heading>
        Create Job
    </x-slot:heading>
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-black/10 pb-12">
                <h2 class="text-base/7 font-semibold text-black">Create a New Job </h2>
                <p class="mt-1 text-sm/6 text-gray-400">Enter Details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-lable for="title">Title</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="title" type="text" name="title" placeholder="Director"
                                required />
                            <x-form-error name="title" />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-lable for="salary">Salary</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="salary" type="text" name="salary" placeholder="$50,000 Per Year"
                                required />
                            <x-form-error name="salary" />
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-black">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>

</x-layout>
