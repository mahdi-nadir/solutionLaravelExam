<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Question 3') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-6xl">
                    <form method="GET" action="{{ route('question.3') }}" class="mt-6 space-y-6">

                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <x-input-label for="col" :value="__('Column')" />
                                <select id="col" name="col">
                                    <option value="">{{ __('Select a column') }}</option>
                                    <option value="id" @selected(request('col') == 'id')>{{ __('id') }}</option>
                                    <option value="foo" @selected(request('col') == 'foo')>{{ __('foo') }}</option>
                                    <option value="bar" @selected(request('col') == 'bar')>{{ __('bar') }}</option>
                                    <option value="baz" @selected(request('col') == 'baz')>{{ __('baz') }}</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="dir" :value="__('Direction')" />
                                <select id="dir" name="dir">
                                    <option value="">{{ __('Select a direction') }}</option>
                                    <option value="asc" @selected(request('dir') == 'asc')>{{ __('Acensing') }}</option>
                                    <option value="desc" @selected(request('dir') == 'desc')>{{ __('Descending') }}</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="lim" :value="__('Limit')" />
                                <select id="lim" name="lim" >
                                    <option value="">{{ __('Select a limit') }}</option>
                                    <option @selected(request('lim') == '5')>5</option>
                                    <option @selected(request('lim') == '10')>10</option>
                                    <option @selected(request('lim') == '15')>15</option>
                                    <option @selected(request('lim') == '20')>20</option>
                                    <option @selected(request('lim') == '50')>50</option>
                                </select>
                            </div>

                            <div>
                                <x-secondary-button type="submit">{{ __('Sort') }}</x-secondary-button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-6">
                        <table cellpadding="4" class="w-full">
                            <tr>
                                <th>id</th>
                                <th>foo</th>
                                <th>bar</th>
                                <th>baz</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                            @foreach ($question3 as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->foo }}</td>
                                    <td>{{ $row->bar }}</td>
                                    <td>{{ $row->baz }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
