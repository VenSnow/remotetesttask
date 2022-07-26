@extends('layouts.app')

@section('title')
    {{ __('lot.lot_create_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('lot.lot_crud_page') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.lot.store') }}" method="POST">
                @csrf
                @include('lot.form')
                <button type="submit" class="btn btn-primary">{{ __('lot.form_create') }}</button>
            </form>
        </div>
    </div>
@endsection
