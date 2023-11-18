@extends('layouts.ticketslayot')
@section('titulo-seccion', $ticket->subject)
@section('description', 'Creado el ' . $formattedDate . ' - a través de Portal')
@section('content')


    {{-- <div class="ticket__container">
        <div class="container" style="width: 100%; padding: 4px">
            <div class="header_message">
                <div class="header_datos_message">
                    <img class="image_ticket" alt="user" style="" src="{{ asset('assets/admin/img/user.png') }}" />
                    <div class="time_ago">
                        <a href="#" style="color: rgba(44, 92, 197, 1)"> {{ $name . ' ' . $apellido_pa }}</a>
                        &nbsp;reportado hace
                    </div>
                    <div class="margin_left">
                        <span class="status_ticket">{{ $ticket->status }}</span>
                    </div>
                </div>
                <div style="">
                    <button
                        style="padding: 4px 8px; border-radius: 4px;border: 1px solid rgba(0, 0, 0, 1);background-color:rgba(51, 80, 104, 1) ;  color: white">
                        Responder
                    </button>
                    <button
                        style="padding: 4px 8px;border-radius: 4px;border: 1px solid rgba(51, 80, 104, 1) ;background-color:rgba(255, 255, 255, 1);;color: rgba(51, 80, 104, 1)">
                        Cerrar el problema
                    </button>
                </div>
            </div>
            <div style="width: 100%; display: flex; flex-direction: column; padding-left: 3.2rem">

                <div>
                    {{ $description->body }}
                </div>
            </div>
            <div style="width: 100%; display: flex; flex-direction: column; padding-left: 3.2rem">
                a
            </div>


            <div style="display: flex; width: 100%; ">
                <img alt="user" style="align-self: flex-start ;width: 2rem;border-radius: 100% ;margin-right: 1rem"
                    src="{{ asset('assets/admin/img/user.png') }}" />
                <textarea id="miTextarea" rows="2"
                    style="resize: none; width: 100%;border-radius: 0.5rem; border: 1px solid rgba(146, 146, 146, 1)"
                    oninput="autoResize(this)"></textarea>
            </div>
            <div style="display: flex; flex-direction: column; width: 100%; padding-left: 3.2rem; margin-top: 2rem">
                <div class="container-input">
                    <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1"
                        data-multiple-caption="{count} archivos seleccionados" multiple />
                   <label for="file-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17"
                            viewBox="0 0 20 17">
                            <path
                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                            </path>
                        </svg>
                        <span class="iborrainputfile">Seleccionar archivo</span>
                    </label> 
                </div>
                <div style="margin-top: 1rem">
                    <button
                        style="padding: 4px 8px; border-radius: 4px;border: 1px solid rgba(0, 0, 0, 1);background-color:rgba(51, 80, 104, 1) ;  color: white">
                        Responder</button>
                    <button
                        style="padding: 4px 8px;border-radius: 4px;border: 1px solid rgba(51, 80, 104, 1) ;background-color:rgba(255, 255, 255, 1);;color: rgba(51, 80, 104, 1)">
                        Cancelar</button>

                </div>
            </div>

        </div>
        <style>
            .status_ticket {
                padding: 4px 8px;
                border-radius: 4px;
                border: 1px solid rgba(246, 80, 80, 1);
                background: rgba(255, 222, 224, 1);
                color: rgba(246, 80, 80, 1);
                font-size: 12px
            }

            .margin_left {
                margin-left: 2rem
            }

            .time_ago {
                display: flex;
                justify-content: start
            }

            .image_ticket {
                width: 2rem;
                border-radius: 100%;
                margin-right: 1rem
            }

            .header_message {
                width: 100%;
                display: flex;
                justify-content: space-between
            }

            .header_datos_message {
                display: flex
            }

            /* .container-input {
                                                                                                            text-align: center;
                                                                                                            background: #282828;
                                                                                                            border-top: 5px solid #c39f77;
                                                                                                            padding: 50px 0;
                                                                                                            border-radius: 6px;
                                                                                                            width: 50%;
                                                                                                            margin: 0 auto;
                                                                                                            margin-bottom: 20px;
                                                                                                        }

                                                                                                        .inputfile {
                                                                                                            width: 0.1px;
                                                                                                            height: 0.1px;
                                                                                                            opacity: 0;
                                                                                                            overflow: hidden;
                                                                                                            position: absolute;
                                                                                                            z-index: -1;
                                                                                                        }

                                                                                                        .inputfile+label {
                                                                                                            max-width: 80%;
                                                                                                            font-size: 1.25rem;
                                                                                                            font-weight: 700;
                                                                                                            text-overflow: ellipsis;
                                                                                                            white-space: nowrap;
                                                                                                            cursor: pointer;
                                                                                                            display: inline-block;
                                                                                                            overflow: hidden;
                                                                                                            padding: 0.625rem 1.25rem;
                                                                                                        }

                                                                                                        .inputfile+label svg {
                                                                                                            width: 1em;
                                                                                                            height: 1em;
                                                                                                            vertical-align: middle;
                                                                                                            fill: currentColor;
                                                                                                            margin-top: -0.25em;
                                                                                                            margin-right: 0.25em;
                                                                                                        }

                                                                                                        .iborrainputfile {
                                                                                                            font-size: 16px;
                                                                                                            font-weight: normal;
                                                                                                            font-family: 'Lato';
                                                                                                        }

                                                                                                        /* style 1 */

            /* .inputfile-1+label {
                                                                                    color: #fff;
                                                                                    background-color: #c39f77;
                                                                                }

                                                                                .inputfile-1:focus+label,
                                                                                .inputfile-1.has-focus+label,
                                                                                .inputfile-1+label:hover {
                                                                                    background-color: #9f8465;
                                                                                } */
        </style>
    </div>
    <script>
        const textarea = document.getElementById('miTextarea');

        // Asigna el evento 'input' al textarea para ajustar su altura al contenido
        textarea.addEventListener('input', function() {
            this.style.height = 'auto'; // Resetea la altura
            this.style.height = this.scrollHeight + 'px'; // Ajusta la altura
        });
    </script> --}}

    <div class="flex p-4 flex-col gap-2">
        <article class="bg-white p-5 flex flex-col gap-4">
            <div class="flex gap-4">
                <figure class="w-10 flex justify-center shrink-0">
                    {{-- <img src="{{ asset('assets/admin/img/phone.svg') }}" alt=""> --}}
                </figure>
                <p class="font-bold tracking-wide ">{{ $ticket->subject }}</p>
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
                    <img src="{{ asset('assets/client/img/logo-ticket.png') }}" alt="" class="w-4 h-4">
                </figure>
                <p class="text-blue-950 text-sm">{{ $ticket->description }} a</p>
            </div>
        </article>

        @forelse ($ticket->comments as $comment)
            @if (strpos($comment->commentable_type, 'Client') !== false)
                <article class="bg-gray-100 p-5 flex flex-col gap-4">
                    <div class="flex gap-4">
                        <figure class="w-10 flex justify-center items-center hrink-0">
                            <img src="{{ asset('assets/admin/img/user.png') }}" alt="" class="w-8 h-8 object-cover">
                        </figure>
                        <div>
                            <span class="text-blue-400">{{ $comment->commentable->first_name }}
                                {{ $comment->commentable->first_surname }}</span><span class="text-gray-500">
                                respondio</span>
                            <p class="italic text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 ">
                        <figure class="w-10 flex py-1 justify-center shrink-0 ">
                            <img src="{{ asset('assets/admin/img/email.svg') }}" alt="" class="w-4 h-4">
                        </figure>
                        <div class="flex flex-col gap-2">
                            <p class="font-bold text-sm text-blue-950">Para: {{ $comment->ticket->agent->first_name }}
                                {{ $comment->ticket->agent->first_surname }}</p>
                            <p class="text-blue-950 text-sm">
                                {{ $comment->body }}
                            </p>

                        </div>
                    </div>
                </article>
            @else
                <article class="bg-gray-100 p-5 flex flex-col gap-4">
                    <div class="flex gap-4">
                        <figure class="w-10 flex justify-center items-center hrink-0">
                            <img src="{{ asset('assets/admin/img/agent.png') }}" alt=""
                                class="w-8 h-8 object-cover">
                        </figure>
                        <div>
                            <span class="text-blue-400">{{ $comment->commentable->first_name }}
                                {{ $comment->commentable->first_surname }}</span><span class="text-gray-500">
                                respondio</span>
                            <p class="italic text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 ">
                        <figure class="w-10 flex py-1 justify-center shrink-0 ">
                            <img src="{{ asset('assets/admin/img/email.svg') }}" alt="" class="w-4 h-4">
                        </figure>
                        <div class="flex flex-col gap-2">
                            <p class="font-bold text-sm text-blue-950">Para: {{ $comment->ticket->client->first_name }}
                                {{ $comment->ticket->client->first_surname }}</p>
                            <p class="text-blue-950 text-sm">
                                {{ $comment->body }}
                            </p>

                        </div>
                    </div>
                </article>
            @endif
        @empty
            <div>
                <p class="italic text-sm text-gray-500">Sin respuesta</p>
            </div>
        @endforelse
        <article class="bg-white p-5 flex flex-col gap-4">
            <div class="flex gap-4 items-center">
                <figure class="w-10 flex justify-center items-center hrink-0">
                    <img src="{{ asset('assets/admin/img/user.png') }}" alt="" class="w-8 h-8 object-cover">
                </figure>
                <div class="flex items-center">
                    <p class="text-sm text-blue-950">De: <span class="font-bold "> {{ $ticket->client->first_name }}
                            {{ $ticket->client->first_surname }} </span></p>
                </div>
            </div>
            <div class="flex flex-col gap-2 items-end">
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Escribe aqui tu respuesta"></textarea>
                <button class="bg-blue-900 text-white font-bold px-5 py-2 rounded hover:bg-blue-950">Enviar</button>
            </div>
        </article>
    </div>
@endsection
