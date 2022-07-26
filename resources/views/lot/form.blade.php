<div class="mb-3">
    <label for="title" class="form-label">{{ __('lot.form_title') }}</label>
    <input
        type="text"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        value="@if(isset($lot))@if($lot->title && !old('title')){{ $lot->title }}@endif @else{{ old('title') }}@endif"
        required>
    @error('title')
        <div id="validationServer05Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="lotDescription" class="form-label">{{ __('lot.form_description') }}</label>
    <textarea name="description" class="form-control" id="lotDescription" rows="5" required>@if(isset($lot))@if($lot->description && !old('description')){{ $lot->description }}@endif @else{{ old('description') }}@endif</textarea>
    @error('description')
        <div id="validationServer05Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="genresSelect" class="form-label">{{ __('lot.form_categories') }}</label>
    <select class="form-select" size="5" name="categories[]" multiple aria-label="multiple select example" id="genresSelect" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                    @if(isset($lot))
                        @foreach($lot->categories as $lotCategory)
                            @if($category->id == $lotCategory->id)
                                selected
                            @endif
                        @endforeach
                    @endif>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    @error('categories')
        <div id="validationServer05Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
