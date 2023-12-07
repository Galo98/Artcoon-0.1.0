<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Order review')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-1/3 h-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin ">
                <div class="p-6 text-gray-900 dark:text-gray-100 gap-5 flex flex-col justify-center items-center">
                    <form class="flex flex-col justify-center items-center gap-4">
                        @csrf
                        <!-- <div class="popup fixed w-1/3 h-1/3  bg-white border-2 border-#FF90AA"> -->
                        <input type="hidden" name="type" value="{{request('type')}}">
                        <input type="hidden" name="size" value="{{request('size')}}">
                        <input type="hidden" name="characters" value="{{request('characters')}}">
                        <input type="hidden" name="background" value="{{request('background')}}">
                        <input type="hidden" name="pub" value="{{request('pub')}}">
                        <input type="hidden" name="total" value="{{$total}}">

                        <p>{{__('Type of commission')}} : {{$typeDesc->type_name}} </p>
                        <p>{{__('Size of commission')}} : {{$sizeDesc->size_name}}</p>
                        <p>{{__('Amount of characters')}} : {{$charDesc->char_name}}</p>
                        <p>{{__('Kind of background')}} : {{$backDesc->bkg_name}}</p>
                        <p>{{__('Make it public')}} : {{is_null(request('pub')) ? 'No' : __('Yes')}}</p>
                        <p>{{__('Total price')}} : USD {{$total}} </p>
                        <p></p>
                        <div>
                            <x-primary-button formmethod="POST" formaction="{{ route('order.store') }}">{{__('Make the order')}}</x-primary-button>
                            <x-cancel-button formmethod="GET" formaction="{{ route('order.makeOrder') }}">{{__('Close and modify')}}</x-cancel-button>
                        </div>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>