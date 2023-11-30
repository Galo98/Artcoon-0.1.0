<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make an order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="flex flex-col justify-center items-center gap-4" method=" POST">

                        @csrf

                        <div>
                            <label for="type">{{__('Type of commission')}}</label>
                            <select class="bg-transparent flex-grow-0" name="type" id="type" title="{{__('Type of commission')}}" description="{{__('Select the type of commission')}}">
                                <option value="argentina">Scketch</option>
                                <option value="brasil">Simple color</option>
                                <option value="chile">Full color</option>
                            </select>
                        </div>

                        <div>
                            <label for="size">{{__('Size of commission')}}</label>
                            <select class="bg-transparent flex-grow-0" name="size" id="size" title="{{__('Size of commission')}}" description="{{__('Select the size of commission')}}">
                                <option value="argentina">Icon</option>
                                <option value="brasil">Half body</option>
                                <option value="chile">Full body</option>
                            </select>
                        </div>

                        <div>
                            <label for="amount">{{__('Amount of characters')}}</label>
                            <select class="bg-transparent flex-grow-0" name="amount" id="amount" title="{{__('Amount of characters')}}" description="{{__('Select the amount of characters')}}">
                                <option value="argentina">1</option>
                                <option value="brasil">2</option>
                                <option value="chile">3</option>
                            </select>
                        </div>

                        <div>
                            <label for="kind">{{__('Kind of background')}}</label>
                            <select class="bg-transparent flex-grow-0" name="kind" id="kind" title="{{__('Kind of background')}}" description="{{__('Select the kind of background')}}">
                                <option value="argentina">{{__('Transparent')}}</option>
                                <option value="brasil">{{__('Plain')}}</option>
                                <option value="chile">{{__('Simple')}}</option>
                                <option value="chile">{{__('Complex')}}</option>
                            </select>
                        </div>

                        <x-primary-button>{{__('Make an order')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>