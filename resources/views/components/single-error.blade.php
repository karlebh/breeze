@props(['value'])

{{-- <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label> --}}

@error($value)
	<span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
@enderror
