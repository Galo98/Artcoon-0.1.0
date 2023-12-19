<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Characters') }}
        </h2>

        <form method="POST" action="{{route('char.store')}}" class="flex gap-4 pt-4 justify-start items-center">

            @csrf

            <div>
                <input type="text" name="char_name" placeholder="{{__('Character name')}}" @if(old('char_name') !=null ) value="{{old('char_name')}}" @endif>
                <x-input-error :messages="$errors->get('char_name')" />
            </div>
            <div>
                <input type="text" name="char_price" pattern="^(0|\d{1,4}(\.\d{1,2})?)$" title="{{__('Please enter a valid number.Example:1234.56 or 0')}}" placeholder="{{__('Price')}}" @if(old('char_price') !=null ) value="{{old('char_price')}}" @endif>
                <x-input-error :messages=" $errors->get('char_price')" />
            </div>


            <x-primary-button>{{__('New character')}}</x-primary-button>

        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($chars) >0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($chars as $char)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex flex-col justify-center items-center gap-4">
                            <p>{{__('Background name')}} : {{$char->char_name}} </p>
                            <p>{{__('Background price')}} : {{$char->char_price}}</p>

                            <form method="GET">
                                <x-primary-button formaction="{{ route('char.edit',$char) }}">{{__('Modify')}}</x-primary-button>
                            </form>

                            <form method="POST" action="{{ route('char.destroy',$char) }}">
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
                    <p>{{__('There is no characters in the database')}}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>