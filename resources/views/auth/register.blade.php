<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-black/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <x-form-lable for="name">Name</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="name" type="text" name="name" required />
                            <x-form-error name="name" />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-lable for="email">Email</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="email" type="email" name="email" required />
                            <x-form-error name="email" />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-lable for="password">Password</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="password" type="password" name="password" required />
                            <x-form-error name="password" />
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <x-form-lable for="password_confirmation">Confirm Password</x-form-lable>
                        <div class="mt-2">
                            <x-form-input id="password_confirmation" type="password"
                                name="password_confirmation" required />
                            <x-form-error name="password_confirmation" />
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm/6 font-semibold text-black">Cancel</a>
                <x-form-button>Register</x-form-button>
            </div>
    </form>

</x-layout>
