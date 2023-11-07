@extends('layouts.adminlayout')
@section('content')
    <section class="py-1 bg-blueGray-50 container m-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Lista de Clientes</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ url('app/admin/clients/create') }}">
                            <button type="button"
                                class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                Agregar cliente
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full  px-4 mx-auto ">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded ">
                    <div class="container mx-auto p-4">
                        <table class="items-center bg-transparent w-full border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        ID</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nombre</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Primer Apellido</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Segundo Apellido</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Teléfono</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Correo</th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left text-blueGray-700">
                                            {{ $client->id }}</td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $client->first_name }}</td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $client->first_surname }}</td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $client->second_surname }}</td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $client->phone }}</td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                        </td>
                                        <td
                                            class="grid border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 gap-2">
                                            <a href="{{ route('admin.clients.edit', ['client' => $client->id]) }}">
                                                <button type="button"
                                                    class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2  transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                                    Editar
                                                </button>
                                            </a>
                                            {{-- TODO: HACER MODAL PARA ACTIVAR CLIENTE --}}
                                            <!-- Modal toggle -->
                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                type="button">
                                                Eliminar
                                            </button>

                                            <!-- Main modal -->
                                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Eliminar cliente
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="default-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                                                            method="post">
                                                            <!-- Modal body -->
                                                            <div class="p-6 space-y-6">
                                                                <p class="text-white">
                                                                    ¿Está seguro que desea eliminar el cliente
                                                                    {{ $client->first_name }}?
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                <button data-modal-hide="default-modal" type="submit"
                                                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                                                <button data-modal-hide="default-modal" type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cerrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
