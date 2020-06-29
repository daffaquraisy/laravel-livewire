<div>
    {{-- The Master doesn't talk, he acts. --}}

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    
    @if ($statusUpdate)
    <livewire:contact-update>
    @else
    <livewire:contact-create>
    @endif

    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="col">
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search...." wire:model="search">
        </div>
    </div>
    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($contacts as $contact)
            <?php $no++; ?>
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->phone}}</td>
                <td>
                    <button class="btn btn-info btn-sm text-white" wire:click="getContact({{$contact->id}})">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm text-white" wire:click="destroy({{$contact->id}})">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$contacts->links()}}
</div>
