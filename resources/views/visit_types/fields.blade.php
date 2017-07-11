{{ csrf_field() }}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', 0, ['class' => 'form-control']) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-2">
    {!! Form::label('icon', 'Icon:') !!}
    <select style="font-family: 'FontAwesome';" class="form-control" id="icon" name="icon">
        @foreach($icons as $key => $icon)
        <option value="{{ $key }}"
        {{-- UX: Select previous value --}}
            @if ($visitType->icon == $key)
                selected
            @endif
        >
            {{ $icon['unicode'] }}
        </option>
        @endforeach
    </select>
</div>

<!-- Color Field -->
<div class="form-group col-sm-4">
    {!! Form::label('color', 'Color:') !!}
    <select class="form-control" id="color" name="color">
        @foreach($colors as $key => $color)
        <option class="bg-{{$color}}" value="{{ $key }}"
        {{-- UX: Select previous value --}}
        @if ($visitType->color == $key)
            selected
        @endif
        >
            {{ $color }}
        </option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('visitTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
