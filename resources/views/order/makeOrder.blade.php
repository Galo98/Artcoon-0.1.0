<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make an order') }}
        </h2>
        <!-- <table>
            <tr>
                <th></th>
                <th>Sketch</th>
                <th>Simple Color</th>
                <th>Full color</th>
            </tr>
            <tr>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
            </tr>
            <tr>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
            </tr>
            <tr>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
                <td>Icon</td>
            </tr>
        </table> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">

                    <form class="flex flex-col justify-center items-center gap-4" method="POST" action="{{ route('order.confirmOrder') }}">

                        @csrf

                        <div>
                            <label for="type">{{__('Type of commission')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent rounded-md" name="type" id="type" title="{{__('Type of commission')}}" description="{{__('Select the type of commission')}}">
                                <option value="">{{__('Select an option')}}</option>
                                <option value="1" {{ old('type') || request('type') == '1' ? 'selected' : '' }}>Scketch</option>
                                <option value="2" {{ old('type') || request('type') == '2' ? 'selected' : '' }}>Simple color</option>
                                <option value="3" {{ old('type') || request('type') == '3' ? 'selected' : '' }}>Full color</option>
                            </select>
                            <x-input-error :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <label for="size">{{__('Size of commission')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="size" id="size" title="{{__('Size of commission')}}" description="{{__('Select the size of commission')}}">
                                <option value="">{{__('Select an option')}}</option>
                                <option value="1" {{ old('size') || request('size') == '1' ? 'selected' : '' }}>Icon</option>
                                <option value="2" {{ old('size') || request('size') == '2' ? 'selected' : '' }}>Half body</option>
                                <option value="3" {{ old('size') || request('size') == '3' ? 'selected' : '' }}>Full body</option>
                            </select>
                            <x-input-error :messages="$errors->get('size')" />
                        </div>

                        <div>
                            <label for="characters">{{__('Amount of characters')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="characters" id="characters" title="{{__('Amount of characters')}}" description="{{__('Select the amount of characters')}}">
                                <option value="">{{__('Select an option')}}</option>
                                <option value="1" {{ old('characters') || request('characters') == '1' ? 'selected' : '' }}>One</option>
                                <option value="2" {{ old('characters') || request('characters') == '2' ? 'selected' : '' }}>Two</option>
                                <option value="3" {{ old('characters') || request('characters') == '3' ? 'selected' : '' }}>Three</option>
                            </select>
                            <x-input-error :messages="$errors->get('characters')" />
                        </div>

                        <div>
                            <label for="background">{{__('Kind of background')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="background" id="background" title="{{__('Kind of background')}}" description="{{__('Select the kind of background')}}">
                                <option value="">{{__('Select an option')}}</option>
                                <option value="1" {{ old('background') || request('background') == '1' ? 'selected' : '' }}>{{__('Transparent')}}</option>
                                <option value="2" {{ old('background') || request('background') == '2' ? 'selected' : '' }}>{{__('Plain')}}</option>
                                <option value="3" {{ old('background') || request('background') == '3' ? 'selected' : '' }}>{{__('Simple')}}</option>
                                <option value="4" {{ old('background') || request('background') == '4' ? 'selected' : '' }}>{{__('Complex')}}</option>
                            </select>
                            <x-input-error :messages="$errors->get('background')" />
                        </div>

                        <div>
                            <label for="pub">{{__('Make it public')}}</label>
                            <input type="checkbox" name="pub" id="pub" {{ old('pub') == 'on' || request('pub') == 'on'  ? 'checked' : '' }} title="{{__('Make it public when it\'s finished')}}" description="{{__('Make it public when it\'s finished')}}">
                        </div>

                        <!-- 
                        <x-dropdown>
                            <x-slot:trigger>titulo</x-slot:trigger>
                            <x-slot:content>A</x-slot:content>
                        </x-dropdown> -->


                        <x-primary-button class="send">{{__('Make the order')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>