@extends('layouts.app')

@section('title')
    {{ __('category.index_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('category.category_crud_page') }}</h1>
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
            <a href="{{ route('crud.category.create') }}" class="btn btn-success">
                {{ __('category.category_action_create') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('category.category_title') }}</th>
                    <th scope="col">{{ __('category.category_created_at') }}</th>
                    <th scope="col">{{ __('category.category_actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="col-6 my-1">
                                <a href="{{ route('crud.category.edit', $category) }}" class="btn btn-primary">{{ __('category.category_action_edit') }}</a>
                            </div>
                            <div class="col-6 my-1">
                                <form action="{{ route('crud.category.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('category.category_action_delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
