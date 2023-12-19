<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-prin mb-5">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('order.update',$order) }}">
                            
                                @csrf
                                @method('PUT')
                                <p>{{__('User')}} : {{$order->user->email}} </p>
                                <p>{{__('Type of commission')}} : {{$order->type->type_name}} </p>
                                <p>{{__('Size of commission')}} : {{$order->size->size_name}}</p>
                                <p>{{__('Amount of characters')}} : {{$order->character->char_name}}</p>
                                <p>{{__('Kind of background')}} : {{$order->background->bkg_name}}</p>
                                <p>{{__('Make it public')}} : {{$order->order_public == 1 ? __('Yes') : 'No'}}</p>
                                <p>{{__('Total price')}} : USD {{$order->order_totPrice}} </p>

                                <div>
                                    <p>{{__('Payment approved?')}} :
                                        <select name="order_pay" class="dark:bg-transparent">
                                            <option value="1" {{$order->order_pay === 1 ? 'selected' : '' }}>{{__('Yes')}}</option>
                                            <option value="2" {{$order->order_pay === 2 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </p>

                                </div>
                                <div>
                                    <p>{{__('Order state')}}

                                        <select name="state_id" class="dark:bg-transparent">
                                            <option value="1" {{$order->state_id === 1 ? 'selected' : '' }}>{{__('Working')}}</option>
                                            <option value="2" {{$order->state_id === 2 ? 'selected' : '' }}>{{__('Pending')}}</option>
                                            <option value="3" {{$order->state_id === 3 ? 'selected' : '' }}>{{__('Finished')}}</option>
                                        </select>
                                    </p>
                                </div>

                                <p>{{__('Creation date')}} : {{$order->created_at}} </p>
                                <p>{{__('Last modification')}} : {{$order->updated_at}} </p>

                                <x-primary-button>{{__('Modify')}}</x-primary-button>
                                <x-nav-link href="{{route('order.showOrders')}}">{{__('Cancel')}}</x-nav-link> </p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>