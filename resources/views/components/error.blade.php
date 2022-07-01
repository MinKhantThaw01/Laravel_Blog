@props(['name'])
@error($name)
        <p class="center text-danger">{{ $message }}</p>
@enderror