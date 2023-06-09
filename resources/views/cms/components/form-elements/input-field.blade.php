@props([
    'type' => 'text',
    'label' => 'Default',
    'name' => 'Default',
    'placeholder' => NULL,
    'col' => '12',
    'required' => FALSE,
    'value' => NULL,
    'step' => 0,
    'autofocus' => FALSE,
    'info' => NULL,
    'dataRole' => null,
    'min' => null,
    'max' => null,
    'readonly' => null,
])

<div {{$attributes->merge(['class' => "col-md-{$col}"])}}>
    <div class="mb-3">
        <label for="{{$name}}" class="form-label">{{$label}}
            {{-- @if($name==="tags") <br><br>@else @endif --}}
            
            <small><code>{{$required == TRUE ? '[Required]' : ''}}</code></small>
            @if($info) <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $info }}" data-bs-original-title="{{ $info }}"><i class="mdi mdi-information-outline"></i></span> @endif
        </label>
        <input
                class="form-control @error($name) is-invalid @enderror"
                {{-- type="{{$type == 'date' ?  $type:'text'}}" --}}
                type="{{$type === 'date' ?  $type : 'text'}}"
                placeholder="{{$placeholder ?? 'Please enter ' . \Illuminate\Support\Str::lower($label) . ' here...'}}"
                id="{{$type == 'date' ? 'basic-datepicker' : $name}}"
                name="{{$name}}"
                @if($step != 0 && $type == 'number') step="{{$step}}" @endif
                @if(old($name, $value)) value="{{old($name, $value)}}" @endif
                {{$required == TRUE ? 'required' : ''}}
                {{$autofocus == TRUE ? 'autofocus' : ''}}
                {{$attributes->get('inputAttribute')}}
                @if ($dataRole) data-role="{{ $dataRole }}" @endif @if ($type == 'number')
                min="{{ $min }}"
                max="{{ $max }}"
                value="{{ $value }}"
                @endif
                @if ($readonly)
                    readonly="{{ $readonly }}"
                @endif
                >
        @error($name)
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
