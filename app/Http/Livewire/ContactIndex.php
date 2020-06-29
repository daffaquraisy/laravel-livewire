<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdate' => 'handleUpdate'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => $this->search === null ?
                Contact::latest()
                ->paginate($this->paginate) :
                Contact::latest()
                ->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::findOrFail($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Contact::findOrFail($id);
            $data->delete();

            session()->flash('success', 'Data was deleted');
        }
    }

    public function handleStored($contact)
    {
        // dd($contact);
        session()->flash('success', 'New data was stored');
    }

    public function handleUpdate($contact)
    {
        // dd($contact);
        session()->flash('success', 'Conatct ' . $contact['name'] . ' was update');
    }
}
