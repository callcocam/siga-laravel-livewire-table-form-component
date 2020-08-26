<div>
    @if($field->isShowLabel())
        <div class="col-12 col-form-label text-md-right">
            <h4 class="mt-4 mb-4"> {{ __($field->label) }}</h4>
        </div>
    @endif
    @foreach($field->child_fields as $child_field)
        <div class="form-group row">
            @include(form_views_fields('label'), ['field'=>$child_field])
            <div class="col-md">
                @if($child_field->view)
                    @include(form_views_child($child_field->view))
                @else
                    @include(form_views_child($child_field->type))
                @endif
                @include(form_views_fields('data-list'))
                @include(form_views_fields('error-help'))
            </div>
        </div>
    @endforeach
</div>
