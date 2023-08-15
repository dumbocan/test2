

<div x-data="{ start: '', finish: '', result: '', calculateDifference: function() {
                   const startParts = this.start.split(':');
                   const finishParts = this.finish.split(':');

                   const startHours = parseInt(startParts[0]);
                   const startMinutes = parseInt(startParts[1]);
                   const finishHours = parseInt(finishParts[0]);
                   const finishMinutes = parseInt(finishParts[1]);

                   const totalStartMinutes = startHours * 60 + startMinutes;
                   const totalFinishMinutes = finishHours * 60 + finishMinutes;

                   this.result = (totalFinishMinutes - totalStartMinutes) / 60; // La diferencia en horas
                } }">

    <div class="flex flex-col sm:flex-row">

        <div class="w-full sm:w-32">
            {!! Form::text($name . '_start_time', null, ['class' => 'border rounded-md p-2 mb-3 w-full', 'placeholder' => 'Selecciona una hora de comienzo', 'x-model' => 'start', 'list' => $listId]) !!}
        </div>
        <div class="w-full sm:w-32">
            {!! Form::text($name . '_finish_time', null, ['class' => 'border rounded-md p-2 mb-3 w-full', 'placeholder' => 'Selecciona una hora de finalizacion', 'x-model' => 'finish', '@input' => 'calculateDifference', 'list' => $listId]) !!}
        </div>
        <div class="w-full sm:w-32">
            {!! Form::text($name . '_effective_time', null, ['class' => 'border rounded-md p-2 mb-3 w-full', 'placeholder' => 'Tiempo efectivo del trabajo', 'x-model' => 'result']) !!}
        </div>

    </div>

    <datalist id="{{ $listId }}">
        {{ $options }}
    </datalist>
</div>
