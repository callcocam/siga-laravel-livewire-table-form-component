<div>
    <div class="breadcrumb">

        <h1>@isset($tenant) {{ $tenant->name }} @else {{ __("System") }} @endisset</h1>
        <ul>
            <li><a href="{{ route('admin') }}">{{ __('Painel') }}</a></li>
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
               @if(!$field->rendered)
                    @if($field->view)
                        @include(form_views($field->view))
                    @else
                        @include(form_views_fields($field->type))
                    @endif
                @endif
            @endforeach
            <div class="row">
                <div class="col-md offset-md-2"  style="text-align: center">
                    <div wire:loading>
                        <livewire:admin.utils.loading class="mr-2" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md offset-md-2" style="text-align: end">
                    <button class="btn btn-success" wire:click="saveAndGoBackResponse">{{ __('Edit Profile') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include(form_views('scripts'), [
    'component'=>get_class($this)
])
