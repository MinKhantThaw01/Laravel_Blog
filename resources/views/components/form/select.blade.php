@props(['blog','categories'])
<x-form.input-wrapper>
    <x-form.label name="category"></x-form.label>
    <select name="category_id" id="Category" class="form-control">
        @foreach ($categories as $category)
        <option {{ $category->id== old('category_id',$blog->category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</x-form.input-wrapper>