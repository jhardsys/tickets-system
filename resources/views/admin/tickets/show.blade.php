@extends('layouts.adminlayout')
@section('content')
    <div class="flex p-4 flex-col gap-2">
        <article class="bg-white p-5 flex flex-col gap-4">
            <div class="flex gap-4">
                <figure class="w-10 flex justify-center shrink-0">
                    <img src="{{ asset('assets/admin/img/phone.svg') }}" alt="">
                </figure>
                <p class="font-bold">{{ $ticket->subject }}</p>
            </div>
            <div class="flex gap-4">
                <figure class="w-10 flex justify-center items-center hrink-0">
                    <img src="{{ asset('assets/admin/img/user.png') }}" alt="" class="w-8 h-8 object-cover">
                </figure>
                <div>
                    <p class="text-blue-400">{{ $ticket->client->first_name }} {{ $ticket->client->first_surname }}</p>
                    <p class="italic text-sm text-gray-500">{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex gap-4">
                <figure class="w-10 py-1 flex justify-center shrink-0">
                    <img src="{{ asset('assets/admin/img/phone.svg') }}" alt="" class="w-4 h-4">
                </figure>
                <p class="text-blue-950 text-sm">
                    Hola: <br>
                    Necesito actualizar mi dirección de correo electrónico. Quiero saber si al cambiarla perderé el acceso a
                    mi
                    cuenta. He añadido bastantes productos al carrito y no quiero tener que volver a buscarlos.Me gustaría
                    poder
                    seguir utilizando esta cuenta con mi nueva dirección de correo electrónico. Por favor, dígame si es
                    posible.
                    Un saludo,
                    Emily García
                </p>
            </div>
        </article>

        <article class="bg-gray-100 p-5 flex flex-col gap-4">
            <div class="flex gap-4">
                <figure class="w-10 flex justify-center items-center hrink-0">
                    <img src="{{ asset('assets/admin/img/agent.png') }}" alt="" class="w-8 h-8 object-cover">
                </figure>
                <div>
                    <span class="text-blue-400">Customer service</span><span class="text-gray-500"> respondio</span>
                    <p class="italic text-sm text-gray-500">Hace 5 dias</p>
                </div>
            </div>
            <div class="flex gap-4 ">
                <figure class="w-10 flex py-1 justify-center shrink-0 ">
                    <img src="{{ asset('assets/admin/img/phone.svg') }}" alt="" class="w-4 h-4">
                </figure>
                <div class="">
                    <p class="font-bold text-sm text-blue-950">Para: emily@gmail.com</p>
                    <p class="text-blue-950 text-sm">
                        Hola: <br>
                        Necesito actualizar mi dirección de correo electrónico. Quiero saber si al cambiarla perderé el
                        acceso a mi
                        cuenta. He añadido bastantes productos al carrito y no quiero tener que volver a buscarlos.Me
                        gustaría poder
                        seguir utilizando esta cuenta con mi nueva dirección de correo electrónico. Por favor, dígame si es
                        posible.
                        Un saludo,
                        Emily García
                    </p>
                </div>
            </div>
        </article>

        <article class="bg-white p-5 flex flex-col gap-4">
            <div class="flex gap-4 items-center">
                <figure class="w-10 flex justify-center items-center hrink-0">
                    <img src="{{ asset('assets/admin/img/agent.png') }}" alt="" class="w-8 h-8 object-cover">
                </figure>
                <div class="flex items-center">
                    <p class="text-sm text-blue-950">De: <span class="font-bold ">SENATI</span>(senati@suppor@.com)</p>
                </div>
            </div>
            <div class="flex flex-col gap-2 items-end">
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Escribe aqui tu respuesta"></textarea>
                <button class="bg-blue-900 text-white font-bold px-5 py-2 rounded hover:bg-blue-950">Enviar</button>
            </div>
        </article>
    </div>
@endsection
