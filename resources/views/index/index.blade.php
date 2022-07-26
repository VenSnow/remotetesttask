@extends('layouts.app')

@section('title')
    {{ __('index.title') }}
@endsection

@section('app')
    <div class="container">
        <div class="row">
            <div class="col-2 my-2 mx-1">
                <h4>{{ __('navbar.categories_page') }}</h4>
                <form action="{{ route('index') }}" id="categoryForm" onchange="formSubmit()">
                    @foreach($categories as $category)
                        <div class="mb-3">
                            <div class="form-check">
                                <input
                                    name="category[]"
                                    type="checkbox"
                                    value="{{ $category->id }}"
                                    class="form-check-input"
                                    id="check-0-{{ $loop->iteration }}"
                                    @if(isset($request->category))
                                        @foreach($request->category as $key => $value)
                                            @if($value == $category->id) checked @endif
                                        @endforeach
                                    @endif
                                />
                                <label class="form-check-label" for="check-0-{{ $loop->iteration }}">
                                    {{ $category->title }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" id="sendFormButton" style="visibility: hidden">Send</button>
                </form>
            </div>
            <div class="col my-2">
                <h4>{{ __('navbar.lots_page') }}</h4>
                @foreach($lots as $lot)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lot->title }}</h5>
                            <p class="card-subtitle mb-2 text-muted"> {{ __('index.card_categories') }}:
                                @foreach($lot->categories as $lotCategory)
                                    <a href="">{{ $lotCategory->title }}</a> @if(!$loop->last),@endif
                                @endforeach
                            </p>
                            <p class="card-text">{{ $lot->getShortDescription() }}</p>
                            <a href="{{ route('lot.show', $lot) }}" class="card-link">{{ __('index.card_read') }}</a>
                        </div>
                    </div>
                @endforeach
                {{ $lots->links() }}
            </div>
        </div>
    </div>
@endsection
