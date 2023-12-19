<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sizes') }}
        </h2>

        <form method="POST" action="{{route('size.store')}}" class="flex gap-4 pt-4 justify-start items-center">

            @csrf

            <div>
                <input type="text" name="size_name" placeholder="{{__('Size name')}}" @if(old('size_name') !=null ) value="{{old('size_name')}}" @endif>
                <x-input-error :messages="$errors->get('size_name')" />
            </div>
            <div>
                <input type="text" name="size_price" pattern="^(0|\d{1,4}(\.\d{1,2})?)$" title="{{__('Please enter a valid number.Example:1234.56 or 0')}}" placeholder="{{__('Price')}}" @if(old('size_price') !=null ) value="{{old('size_price')}}" @endif>
                <x-input-error :messages=" $errors->get('size_price')" />
            </div>


            <x-primary-button>{{__('New size')}}</x-primary-button>

        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($sizes) >0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($sizes as $size)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex flex-col justify-center items-center gap-4">
                            <p>{{__('Size name')}} : {{$size->size_name}} </p>
                            <p>{{__('Size price')}} : {{$size->size_price}}</p>

                            <form method="GET">
                                <x-primary-button formaction="{{ route('size.edit',$size) }}">{{__('Modify')}}</x-primary-button>
                            </form>

                            <form method="POST" action="{{ route('size.destroy',$size) }}">
                                @csrf
                                @method('DELETE')
                                <x-cancel-button>{{__('Delete')}}</x-cancel-button>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin ">
                <div class="p-6 text-gray-900 dark:text-gray-100 gap-5 flex flex-col justify-center items-center">
                    <p>{{__('There is no background in the database')}}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>