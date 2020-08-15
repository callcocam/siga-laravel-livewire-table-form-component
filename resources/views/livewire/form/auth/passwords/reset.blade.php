@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @foreach($fields as $field)
                        @if($field->view)
                            @include($field->view)
                        @else
                            @include(form_views_fields($field->type))
                        @endif
                    @endforeach
                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button class="btn btn-primary float-right" wire:click="reset">{{ __('Confirm Password') }}</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
