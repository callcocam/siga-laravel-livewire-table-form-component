<div>
    <div class="breadcrumb">
        <h1>{{ __($this->title()) }}</h1>
        <ul>
            <li><a href="{{ route('admin') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ $this->BackList() }}">{{ __($this->title()) }}</a></li>
            @if($this->subtitle())
            <li><a href="">{{ $this->subtitle() }}</a></li>
            @endif
            <li>{{ __($this->action()) }}</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-5">
        <div class="col-md-12">
           @include(alert_views())
            @foreach($fields as $field)
                @if($field->view)
                    @include(form_views($field->view))
                @else
                    @include(form_views_fields($field->type))
                @endif
            @endforeach
            <div class="row">
                <div class="col-md offset-md-2" style="text-align: end">
                    <button class="btn btn-warning" wire:click="saveAndStay">{{ __('Save New') }}</button>
                    <button class="btn btn-success" wire:click="saveAndGoBackResponse">{{ __('Save') }}</button>
                    <button class="btn btn-primary" wire:click="saveAndGoBack">{{ __('Save & Go Back') }}</button>
                    <button class="btn btn-danger" wire:click="GoBack">{{ __('Go Back') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include(form_views('scripts'))
