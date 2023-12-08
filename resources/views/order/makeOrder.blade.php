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
                                @foreach($types as $data)
                                <option value="{{$data->id}}" {{ old('type') || request('type') == $data->id ? 'selected' : '' }}>{{$data->type_name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <label for="size">{{__('Size of commission')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent rounded-md" name="size" id="size" title="{{__('Size of commission')}}" description="{{__('Select the size of commission')}}">
                                <option value="">{{__('Select an option')}}</option>
                                @foreach($sizes as $data)
                                <option value="{{$data->id}}" {{ old('size') || request('size') == $data->id ? 'selected' : '' }}>{{$data->size_name}}</option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('size')" />
                        </div>

                        <div>
                            <label for="characters">{{__('Amount of characters')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent rounded-md" name="characters" id="characters" title="{{__('Amount of characters')}}" description="{{__('Select the amount of characters')}}">
                                <option value="">{{__('Select an option')}}</option>
                                @foreach($chars as $data)
                                <option value="{{$data->id}}" {{ old('characters') || request('characters') == $data->id ? 'selected' : '' }}>{{$data->char_name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('characters')" />
                        </div>

                        <div>
                            <label for="background">{{__('Kind of background')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent rounded-md" name="background" id="background" title="{{__('Kind of background')}}" description="{{__('Select the kind of background')}}">
                                <option value="">{{__('Select an option')}}</option>
                                @foreach($bkgs as $data)
                                <option value="{{$data->id}}" {{ old('background') || request('background') == $data->id ? 'selected' : '' }}>{{$data->bkg_name}}</option>
                                @endforeach
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


                        <x-primary-button>{{__('Make the order')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>