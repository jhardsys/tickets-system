@extends('layouts.agentelayout')

@section('content')
    <!-- Tabla clientes -->
    <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200" x-data={modalEdit:false}>
        <header class="px-5 py-4 border-b border-gray-100 w-full">
            <h2 class="font-semibold text-gray-800">Clientes</h2>
        </header>
        <div class="p-3 w-full">
            <div class="overflow-x-scroll overflow-y-hidden pb-16">
                <table class="w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Contacto</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Telefono</div>
                            </th>
                            <th class="p-2 whitespace-nowrap w-12">
                                <div class="font-semibold text-center"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">

                        @forelse ($clientes as $cliente)
                            <tr class="hover:bg-gray-100 transition ease-in">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                            <img class="rounded-full"
                                                src="{{ asset('assets/admin/img/avatar-profile-anonymous.jpg') }}"
                                                width="40" height="40" alt="Alex Shatov">
                                        </div>
                                        <a href="{{ route('agent.clientes.show', $cliente->id) }}"
                                            class="font-medium text-gray-800 hover:cursor-pointer hover:text-blue-700 hover:underline">{{ $cliente->fullname() }}</a>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">alexshatov@gmail.com</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $cliente->phone }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap w-12">
                                    {{-- Modal opciones: editar - eliminar --}}
                                    <div x-data="{ open: false }"
                                        class="flex justify-center items-center py-1 rounded-sm cursor-pointer hover:bg-gray-300 transition ease-in relative"
                                        @click="open=!open" @click.outside="open = false">
                                        <i class='bx bx-dots-vertical-rounded block'></i>
                                        <div :class="open ? '!visible' : ''"
                                            class="invisible absolute right-0 bottom-0 translate-y-full p-3 rounded flex flex-col w-[150px] bg-white z-50 shadow">
                                            <div data-cliente-id="{{ $cliente->id }}"
                                                class="flex gap-2 items-center hover:bg-gray-200 py-2 px-3"
                                                @click="modalEdit=true"
                                                onclick="setIdActualizarModal(this.dataset.clienteId)">
                                                <i class='bx bxs-edit-alt'></i>
                                                <p>Editar</p>
                                            </div>
                                            <div class="flex gap-2 items-center hover:bg-gray-200 py-2 px-3"
                                                @click="modal=true" data-cliente-id="{{ $cliente->id }}"
                                                onclick="establecerIdModal(this.dataset.clienteId)">
                                                <i class='bx bx-trash'></i>
                                                <p>Eliminar</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty
                        @endforelse



                    </tbody>
                </table>
            </div>
        </div>


        {{-- Modal editar cliente --}}
        <div x-data="{ errors: {} }" id="modal-edit"
            class="fixed z-50 left-0 top-0 w-screen h-screen bg-blue-900 bg-opacity-25" x-cloak
            :class="modalEdit ? '' : 'translate-x-full'">
            <div class="absolute z-[60] top-0 right-0 bg-white h-screen w-[calc(50%-60px)] transition duration-300"
                :class="modalEdit ? '' : 'translate-x-full'">
                {{-- Boton cerrar modal --}}
                <div class="absolute bg-blue-900 -translate-x-full flex cursor-pointer" @click="modalEdit=false,errors={}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                        <path
                            d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                        </path>
                    </svg>
                </div>

                <div class="bg-white w-full h-full py-5 px-10">
                    <h3 class="text-2xl font-semibold text-blue-950 mb-7">Editar cliente</h3>

                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-1">
                            <label for="first_name" class="text-gray-500 font-semibold text-[12px]">Nombre</label>
                            <input type="text" name="first_name" id="first_name"
                                class= "text-sm font-semibold px-3 py-1 border border-1 border-gray-400 rounded-[5px] focus:outline-none focus:border-blue-600  focus:border-1 transition ease-in focus:shadow-[0_0_0_2px_rgba(0,0,0,0.3)] focus:shadow-blue-300"
                                :class="{ 'border-red-500': errors.first_name }">
                            <small x-show="errors.first_name" x-text="errors.first_name" class="text-red-500"></small>

                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="first_surname" class="text-gray-500 font-semibold text-[12px]">Apellido</label>
                            <input type="text" name="first_surname" id="first_surname"
                                class= "text-sm font-semibold px-3 py-1 border border-1 border-gray-400 rounded-[5px] focus:outline-none focus:border-blue-600  focus:border-1 transition ease-in focus:shadow-[0_0_0_2px_rgba(0,0,0,0.3)] focus:shadow-blue-300"
                                :class="{ 'border-red-500': errors.first_surname }">
                            <small x-show="errors.first_surname" x-text="errors.first_surname" class="text-red-500"></small>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="first_surname" class="text-gray-500 font-semibold text-[12px]">Telefono</label>
                            <input type="text" name="phone" id="phone"
                                class= "text-sm font-semibold px-3 py-1 border border-1 border-gray-400 rounded-[5px] focus:outline-none focus:border-blue-600  focus:border-1 transition ease-in focus:shadow-[0_0_0_2px_rgba(0,0,0,0.3)] focus:shadow-blue-300"
                                :class="{ 'border-red-500': errors.phone }">
                            <small x-show="errors.phone" x-text="errors.phone" class="text-red-500"></small>
                        </div>
                    </div>
                    <div class=" py-4 flex justify-end gap-2">
                        <button @click="modalEdit=false,errors={}"
                            class="bg-gray-100 border border-1 transition ease-in hover:bg-gray-200 rounded-sm text-blue-950 py-2 px-4">Cancelar</button>
                        <button id="btn-update" class="bg-blue-900 hover:bg-blue-950 text-white px-4 py-2 rounded"
                            @click="actualizarCliente($el,$data)">Guardar</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- Modal eliminar --}}
    <div id="modal-delete" class="fixed left-0 top-0 w-screen min-h-screen bg-blue-900 bg-opacity-25 z-50" x-show=modal
        x-cloak>
        <div class="max-w-sm p-2 mx-auto bg-white border-[1px] border-gray-200 shadow rounded-xl hover:shadow-lg transition-all duration-150 ease-linear"
            x-show="modal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <div class="relative p-6">
                <a href="#" x-on:click="modal = ! modal" class="absolute top-1.5 right-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 cursor-pointer fill-current text-slate-500 hover:text-slate-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </a>
                <h1 class="text-2xl font-bold">Eliminar contacto</h1>
                <p class="text-sm text-gray-500">¿Estas seguro que quieres eliminar este contacto?</p>
                <div class="flex flex-row mt-6 space-x-2 justify-evenly">
                    <a @click.prevent="eliminarCliente($el)" id="btn-delete" href="#"
                        class="w-full py-3 text-sm font-medium text-center text-white transition duration-150 ease-linear bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-500">Eliminar</a>
                    <a href="#" @click.prevent="modal=!modal"
                        class="w-full py-3 text-sm text-center text-gray-500 transition duration-150 ease-linear bg-white border border-gray-200 rounded-lg hover:bg-gray-100">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        //Establecer el id del cliente en el boton del modal para eliminar
        function establecerIdModal(id) {
            document.querySelector('#btn-delete').setAttribute('data-id', id);
        }

        //Eliminar cliente por ajax
        function eliminarCliente(elemento) {
            //Obtener id a eliminar
            const id = elemento.dataset.id;

            // Enviar peticion por ajax
            fetch(`/app/agent/clientes/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(() => {
                    location.reload()
                })
        }

        //Establecer id del cliente en el modal editar cliente
        function setIdActualizarModal(id) {
            document.querySelector('#modal-edit').setAttribute('data-id', id);
            document.querySelector('#btn-update').setAttribute('data-id', id);

            obtenerDatosEditModal(id)
        }

        //Cargar los datos en el modal editar cliente por ajax
        function obtenerDatosEditModal(id) {
            modal = document.querySelector('#modal-edit');
            fetch(`/app/agent/clientes/ajax/${id}`)
                .then(response => response.json())
                .then(data => {
                    const {
                        first_name,
                        first_surname,
                        phone
                    } = data.data;
                    modal.querySelector('#first_name').value = first_name;
                    modal.querySelector('#first_surname').value = first_surname;
                    modal.querySelector('#phone').value = phone;
                })

        }

        /**
         * Función para actualizar un cliente mediante Ajax.
         * @param {HTMLElement} elemento - Botón de guardar del modal Editar cliente.
         * @param {object} objErrors - Objeto de Alpine.js x-data={errors: {}} que contiene los errores de validación.
         */
        function actualizarCliente(elemento, { errors: objErrors }) {
            // Obtener el ID del cliente desde el atributo 'data-id' del elemento
            const id = elemento.dataset.id;

            // Obtener el modal de edición por su ID
            const modal = document.querySelector('#modal-edit');

            // Obtener los valores de los campos del formulario
            const first_name = modal.querySelector('#first_name').value;
            const first_surname = modal.querySelector('#first_surname').value;
            const phone = modal.querySelector('#phone').value;

            // Realizar una solicitud de actualización mediante una petición PUT a Laravel
            fetch(`/app/agent/clientes/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agregar el token CSRF
                },
                body: JSON.stringify({
                    id,
                    first_name,
                    first_surname,
                    phone
                })
            })
            .then(response => response.json())
            .then(({ errors }) => {
                // Si hay errores de validación de Laravel
                if (errors.length !== 0) {
                    // Asignar los errores de Laravel al objeto de alpine js x-data={errors:{}}  para mostrar en el formulario
                    // Asignar el error correspondiente al objeto 'objErrors'
                    for (const key in errors) {
                        objErrors[key] = errors[key];
                    }

                    // Eliminar los errores cuando la validacion es correcta
                    for (const key in objErrors) {
                        // Si la clave no existe en 'errors', eliminar la propiedad de 'objErrors'
                        if (!errors.hasOwnProperty(key)) {
                            delete objErrors[key];
                        }
                    }
                } else {
                    // No hay errores, recargar la página para reflejar los cambios
                    location.reload();
                }
            })
            .catch(error => {
                // Manejar errores en la solicitud Fetch
                console.error('Error:', error);
            });
        }
    </script>
@endpush
