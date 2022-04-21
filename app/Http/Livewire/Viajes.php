<?php

namespace App\Http\Livewire;

use App\Models\Viaje;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Viajes extends Component
{
    use WithPagination;
    use WithSorting;
   // use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];


    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Viaje())->orderable;
    }

    public function render()
    {
        $query = Viaje::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $viajes = $query->paginate($this->perPage);

        return view('livewire.viajes', compact('query', 'viajes'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Viaje::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Viaje $viaje)
    {
        abort_if(Gate::denies('viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viaje->delete();
    }
}
