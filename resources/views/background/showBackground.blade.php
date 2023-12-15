<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Backgrounds') }}
        </h2>

        <form method="POST" action="{{route('bkg.storeBackground')}}" class="flex gap-4 pt-4 justify-start items-center">

            @csrf

            <div>
                <input type="text" name="bkgName" placeholder="{{__('Background name')}}" @if(old('bkgName') !=null ) value="{{old('bkgName')}}" @endif>
                <x-input-error :messages="$errors->get('bkgName')" />
            </div>
            <div>
                <input type="text" name="bkgPrice" pattern="^(0|\d{1,4}(\.\d{1,2})?)$" title="{{__('Please enter a valid number.Example:1234.56 or 0')}}" placeholder="{{__('Price')}}" @if(old('bkgPrice') !=null ) value="{{old('bkgPrice')}}" @endif>
                <x-input-error :messages=" $errors->get('bkgPrice')" />
            </div>


            <x-primary-button>{{__('New background')}}</x-primary-button>

        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($bkgs) >0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($bkgs as $back)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex flex-col justify-center items-center gap-4">
                            <p>{{__('Background name')}} : {{$back->bkg_name}} </p>
                            <p>{{__('Background price')}} : {{$back->bkg_price}}</p>

                            <form method="GET">
                                <x-primary-button formaction="{{ route('bkg.editBackground',$back) }}">{{__('Modify')}}</x-primary-button>
                            </form>

                            <form method="POST" action="{{ route('bkg.deleteBackground',$back) }}">
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