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

                    <form class="flex flex-col justify-center items-center gap-4" method="POST" action="{{ route('order.store') }}" onsubmit="return validarFormulario()">

                        @csrf

                        <div>
                            <label for="type">{{__('Type of commission')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent rounded-md" name="type" id="type" title="{{__('Type of commission')}}" description="{{__('Select the type of commission')}}">
                                <option value="" selected>{{__('Select an option')}}</option>
                                <option value="1">Scketch</option>
                                <option value="2">Simple color</option>
                                <option value="3">Full color</option>
                            </select>
                            <div id="errortype" class="error-message"></div>
                        </div>

                        <div>
                            <label for="size">{{__('Size of commission')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="size" id="size" title="{{__('Size of commission')}}" description="{{__('Select the size of commission')}}">
                                <option value="" selected>{{__('Select an option')}}</option>
                                <option value="1">Icon</option>
                                <option value="2">Half body</option>
                                <option value="3">Full body</option>
                            </select>
                            <div id="errorsize" class="error-message"></div>
                        </div>

                        <div>
                            <label for="characters">{{__('Amount of characters')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="characters" id="characters" title="{{__('Amount of characters')}}" description="{{__('Select the amount of characters')}}">
                                <option value="" selected>{{__('Select an option')}}</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <div id="errorcharacters" class="error-message"></div>
                        </div>

                        <div>
                            <label for="bkg">{{__('Kind of background')}}</label>
                            <select class="flex-grow-0 form-select dark:bg-transparent" name="bkg" id="bkg" title="{{__('Kind of background')}}" description="{{__('Select the kind of background')}}">
                                <option value="" selected>{{__('Select an option')}}</option>
                                <option value="1">{{__('Transparent')}}</option>
                                <option value="2">{{__('Plain')}}</option>
                                <option value="3">{{__('Simple')}}</option>
                                <option value="4">{{__('Complex')}}</option>
                            </select>
                            <div id="errorbkg" class="error-message"></div>
                        </div>

                        <div>
                            <label for="pub">{{__('Make it public')}}</label>
                            <input type="checkbox" name="pub" id="pub" checked title="{{__('Make it public when it\'s finished')}}" description="{{__('Make it public when it\'s finished')}}">
                        </div>

                        <div class="popup hidden fixed w-1/3 h-1/3 flex flex-col gap-2 justify-center items-center bg-white border-2 border-#FF90AA">
                            <h1 class="text-2xl font-bold">{{__('Order review')}}</h1>

                            <p>{{__('Type of commission')}} : </p>
                            <p>{{__('Size of commission')}} : </p>
                            <p>{{__('Amount of characters')}} : </p>
                            <p>{{__('Kind of background')}} : </p>
                            <p>{{__('Make it public')}} : </p>
                            <p>{{__('Total price')}} : </p>



                            <p></p>


                            <div>
                                <x-primary-button class="sendOrder">{{__('Make the order')}}</x-primary-button>
                                <x-secondary-button class="send-close">{{__('Close and modify')}}</x-secondary-button>
                            </div>
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

<script>
    function validarFormulario() {
        var camposSelect = document.querySelectorAll('.form-select');
        var validacionCorrecta = true;

        camposSelect.forEach(function(campo) {
            var campoId = campo.id;
            var valorSeleccionado = campo.value;
            var errorCampo = document.getElementById('error' + campoId);

            if (valorSeleccionado === '') {
                errorCampo.innerHTML = "{{__('Please, select an option')}}";
                validacionCorrecta = false;
            } else {
                errorCampo.innerHTML = '';
            }
        });

        return validacionCorrecta;
    }
    document.querySelector(".send").addEventListener("click", function() {
        event.preventDefault();
        validacion = validarFormulario();
        if (validacion) {
            // Mostrar el pop up
            document.querySelector(".popup").classList.remove("hidden");
        }
    });


    document.querySelector(".send-close").addEventListener("click", function() {
        document.querySelector(".popup").classList.add("hidden");
        event.preventDefault();
    });
</script>