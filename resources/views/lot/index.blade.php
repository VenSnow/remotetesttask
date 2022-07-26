@extends('layouts.app')

@section('title')
    {{ __('lot.index_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('lot.lot_crud_page') }}</h1>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{ route('crud.lot.create') }}" class="btn btn-success">
                {{ __('lot.lot_action_create') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('lot.form_title') }}</th>
                    <th scope="col">{{ __('lot.form_description') }}</th>
                    <th scope="col">{{ __('lot.form_categories') }}</th>
                    <th scope="col">{{ __('lot.lot_created_at') }}</th>
                    <th scope="col">{{ __('lot.lot_actions') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lots as $lot)
                        <tr>
                            <th>{{ $lot->id }}</th>
                            <td>{{ $lot->title }}</td>
                            <td>{{ $lot->getShortDescription() }}</td>
                            <td>
                                @foreach($lot->categories as $lotCategory)
                                    {{ $lotCategory->title }}@if(!$loop->last),@endif
                                @endforeach
                            </td>
                            <td>{{ $lot->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="col-6 my-1">
                                    <a href="{{ route('crud.lot.edit', $lot) }}" class="btn btn-primary">{{ __('lot.lot_action_edit') }}</a>
                                </div>
                                <div class="col-6 my-1">
                                    <form action="{{ route('crud.lot.destroy', $lot) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('lot.lot_action_delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lots->links() }}
        </div>
    </div>
@endsection
