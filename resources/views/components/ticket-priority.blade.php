@props([
    'ticket' => $ticket
])

<div x-data="{ priority: '{{ $ticket->priority }}' }" class="flex gap-1 items-center" >
    <span
        x-bind:class="{
            'bg-red-400': priority === 'alta',
            'bg-yellow-400': priority === 'media',
            'bg-green-400': priority === 'baja',
            '!bg-slate-400': status === 'resuelto'
        }"
        class="block w-3 h-3 "></span>

    <select
        data-id="{{ $ticket->id }}"
        name="prioridad"
        id="prioridad"
        x-model="priority"
        onchange="actualizarPrioridad(this)"
     >
        <option value="baja">Baja</option>
        <option value="media">Media</option>
        <option value="alta">Alta</option>
    </select>
</div>
