<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Question 4') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('question.4.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="foo" :value="__('Foo')" />
                            <x-text-input id="foo" name="foo" type="number" :value="old('foo')" class="mt-1 block w-full"/>
                            <x-input-error :messages="$errors->get('foo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="bar" :value="__('Bar')" />
                            <x-text-input id="bar" name="bar" type="text" :value="old('bar')" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('bar')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="baz" :value="__('Baz')" />
                            <x-text-input id="baz" name="baz" type="date" :value="old('baz')" class="mt-1 block w-full"/>
                            <x-input-error :messages="$errors->get('baz')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="qux" :value="__('Qux')" />
                            <textarea id="qux" name="qux" rows="3">{{ old('qux') }}</textarea>
                            <x-input-error :messages="$errors->get('qux')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            @if (session('success'))
                            <p  x-data="{ show: true }" 
                                x-show="show" 
                                x-transition
                                x-init="setTimeout(() => show = false, 3000)" 
                                class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ session('success') }}
                            </p>                                
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
