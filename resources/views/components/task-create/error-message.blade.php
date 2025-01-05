@props(['type'])

@error($type)
    <span class="text-red-600">
        {{ $message }}
    </span>
@enderror
