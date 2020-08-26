<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de icones</h4>
                <input class="form-control" type="search" name="search" id="search"  wire:model="search">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if($this->icons())
                        @foreach($this->icons() as $icon)
                            <div class="text-center mb-3 col-sm-2"><i class="text-20 i-{{$icon}}"></i>
                                <p>{{ $icon }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><!-- end of main-content -->
