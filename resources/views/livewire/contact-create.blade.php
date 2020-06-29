<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">

                <div class="col">
                    <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

            </div>
        </div>
        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
    </form>
</div>
