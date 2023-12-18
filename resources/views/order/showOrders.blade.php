<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($orders) >0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($orders as $order)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col justify-center items-center gap-4">

                            <p>{{__('User')}} : {{$order->user->email}} </p>
                            <p>{{__('Type of commission')}} : {{$order->type->type_name}} </p>
                            <p>{{__('Size of commission')}} : {{$order->size->size_name}}</p>
                            <p>{{__('Amount of characters')}} : {{$order->character->char_name}}</p>
                            <p>{{__('Kind of background')}} : {{$order->background->bkg_name}}</p>
                            <p>{{__('Make it public')}} : {{$order->order_public === 1 ? __('Yes') : 'No'}}</p>
                            <p>{{__('Total price')}} : USD {{$order->order_totPrice}} </p>
                            <p>{{__('Payment approved?')}} : {{$order->order_pay === 1 ? __('Yes') : 'No'}}</p>
                            <p>{{__('Order state')}} : {{$order->state->state_name}} </p>
                            <p>{{__('Creation date')}} : {{$order->created_at}} </p>
                            <p>{{__('Last modification')}} : {{$order->updated_at}} </p>

                            @if($role === 1)

                            <form method="GET">
                                <x-primary-button formaction="{{ route('order.edit',$order) }}">{{__('Modify')}}</x-primary-button>
                            </form>

                            <form method="POST" action="{{ route('order.delete',$order) }}">
                                @csrf
                                @method('DELETE')
                                <x-cancel-button>{{__('Delete')}}</x-cancel-button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin ">
                <div class="p-6 text-gray-900 dark:text-gray-100 gap-5 flex flex-col justify-center items-center">
                    @if($role === 1)
                    <p>{{__('There are no orders placed yet')}}</p>
                    @else
                    <p>{{__('You have not placed orders yet')}}</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>