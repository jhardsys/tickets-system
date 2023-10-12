@extends('layouts.agentelayout')

@section('content')
        <!-- Tabla clientes -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 w-full">
                <h2 class="font-semibold text-gray-800">Clientes</h2>
            </header>
            <div class="p-3 w-full">
                <div class="overflow-x-scroll overflow-y-hidden">
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
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                        <div class="font-medium text-gray-800">{{ $cliente->fullname() }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">alexshatov@gmail.com</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $cliente->phone }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap w-12" >
                                     {{-- Modal --}}
                                    <div x-data="{open: false}" class="flex justify-center items-center py-1 rounded-sm cursor-pointer hover:bg-gray-300 transition ease-in relative"  @click="open=!open" @click.outside="open = false">
                                        <i class='bx bx-dots-vertical-rounded block'></i>
                                        <div :class="open ? '!visible' : ''" class="invisible absolute right-0 bottom-0 translate-y-full p-3 rounded flex flex-col w-[150px] bg-white z-50 shadow">
                                            <div class="flex gap-2 items-center hover:bg-gray-200 py-2 px-3">
                                                <i class='bx bxs-edit-alt'></i>
                                                <p>Editar</p>
                                            </div>
                                            <div class="flex gap-2 items-center hover:bg-gray-200 py-2 px-3" @click="modal = true">
                                                <i class='bx bx-trash' ></i>
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
        </div>

        {{-- Modal eliminar --}}
        <div class="fixed left-0 top-0 w-screen min-h-screen bg-blue-900 bg-opacity-25 z-50"  x-show=modal x-cloak >
            <div class="max-w-sm p-2 mx-auto bg-white border-[1px] border-gray-200 shadow rounded-xl hover:shadow-lg transition-all duration-150 ease-linear" x-show="modal"
            x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
            >
                    <div class="relative p-6">
                        <a href="#" x-on:click="modal = ! modal" class="absolute top-1.5 right-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer fill-current text-slate-500 hover:text-slate-900">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg>

                        </a>
                        <h1 class="text-2xl font-bold">Eliminar contacto</h1>
                        <p class="text-sm text-gray-500">¿Estas seguro que quieres eliminar este contacto?</p>
                        <div class="flex flex-row mt-6 space-x-2 justify-evenly">
                            <a href="#" class="w-full py-3 text-sm font-medium text-center text-white transition duration-150 ease-linear bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-500">Eliminar</a>
                            <a href="#" x-on:click="modal = ! modal" class="w-full py-3 text-sm text-center text-gray-500 transition duration-150 ease-linear bg-white border border-gray-200 rounded-lg hover:bg-gray-100">Cancelar</a>
                        </div>
                    </div>
            </div>
        </div>
@endsection

@push('script')
<script>

</script>
@endpush
