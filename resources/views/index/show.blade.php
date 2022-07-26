@extends('layouts.app')

@section('title')
    {{ $lot->title }}
@endsection

@section('app')
    <div class="py-5">
        <div class="row">
            <div class="col-2">
                <h4>{{ __('navbar.categories_page') }}</h4>
                <form action="{{ route('index') }}" id="categoryForm" onchange="formSubmit()">
                    @foreach($categories as $secondCategory)
                        <div class="mb-3">
                            <div class="form-check">
                                <input
                                    name="category[]"
                                    type="checkbox"
                                    value="{{ $secondCategory->id }}"
                                    class="form-check-input"
                                    id="check-0-{{ $loop->iteration }}"
                                    @if(isset($request->category))
                                        @foreach($request->category as $key => $value)
                                            @if($value == $secondCategory->id) checked @endif
                                        @endforeach
                                    @endif
                                />
                                <label class="form-check-label" for="check-0-{{ $loop->iteration }}">
                                    {{ $secondCategory->title }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" id="sendFormButton" style="visibility: hidden">Send</button>
                </form>
            </div>
            <div class="col">
                <div class="row">
                    <h2>
                        {{ $lot->title }}
                    </h2>
                    <div class="row">
                        <div class="card" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lot->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    @foreach($lot->categories as $lotCategory)
                                        {{ $lotCategory->title }}@if(!$loop->last),@endif
                                    @endforeach
                                </h6>
                                <p class="card-text">
                                    {{ $lot->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
