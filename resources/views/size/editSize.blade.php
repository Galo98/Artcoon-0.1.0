<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit sizes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST">
                            <div class="flex flex-col justify-center items-center gap-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <input type="text" class="dark:text-gray-900" name="size_name" placeholder="{{__('Size name')}}" @if(old('size_name') !=null ) value="{{old('size_name')}}" @elseif (isset($size)) value="{{$size->size_name}}" @endif>
                                    <x-input-error :messages="$errors->get('size_name')" />
                                </div>
                                <div>
                                    <input type="text" class="dark:text-gray-900" name="size_price" pattern="^(0|\d{1,4}(\.\d{1,2})?)$" title="{{__('Please enter a valid number.Example:1234.56 or 0')}}" placeholder="{{__('Price')}}" @if(old('size_price') !=null ) value="{{old('size_price')}}" @elseif (isset($size)) value="{{$size->size_price}}" @endif>
                                    <x-input-error :messages=" $errors->get('size_price')" />
                                </div>



                                <x-primary-button formaction="{{ route('size.update',$size) }}">{{__('Modify')}}</x-primary-button>
                                <x-nav-link href="{{route('size.index')}}">{{__('Cancel')}}</x-nav-link> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>