    {{-- <select class="form-control">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
    </select> --}}
    @props(['disabled' => false])

    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>{{ $slot }} </select>
