@extends('layouts.app')

@section('title')
    {{ __('category.category_create_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('category.category_crud_page') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.category.store') }}" method="POST">
                @csrf
                @include('category.form')
                <button type="submit" class="btn btn-primary">{{ __('category.form_create') }}</button>
            </form>
        </div>
    </div>
@endsection
