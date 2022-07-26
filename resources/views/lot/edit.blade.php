@extends('layouts.app')

@section('title')
    {{ __('lot.lot_edit_title') }} - {{ $lot->title }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('lot.lot_crud_page') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.lot.update', $lot) }}" method="POST">
                @csrf
                @method('PATCH')
                @include('lot.form')
                <button type="submit" class="btn btn-primary">{{ __('lot.form_edit') }}</button>
            </form>
        </div>
    </div>
@endsection
