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
    <div>
        {!! Form::text($name . '_start_time', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Selecciona una hora de comienzo', 'x-model' => 'start', 'list' => $listId]) !!}
    </div>
    <div>
        {!! Form::text($name . '_finish_time', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Selecciona una hora de finalizacion', 'x-model' => 'finish', '@input' => 'calculateDifference', 'list' => $listId]) !!}
    </div>
    <div>
        {!! Form::text($name . '_effective_time', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Tiempo efectivo del trabajo', 'x-model' => 'result']) !!}
    </div>
    <datalist id="{{ $listId }}">
        {{ $options }}
    </datalist>
</div>
