<?php

namespace App\Http\Livewire\Sales;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Sales extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $showingSaleDetail = false;
    public $showingEditForm = false;

    public $search;
    public $selectedSale;
    public $dateFilter;

    public $selectedSaleEdit;
    public $saleId, $server, $payment_type;

    public $users;
    public $selectedUserId, $selectedUserName = 'Select user';

    protected function rules() {
        $rules = [
            'server' => 'required|exists:users,id',
            'payment_type' => 'required|string|max:191',
        ];

        return $rules;
    }

    public function showSaleDetail($sale) {
        $this->selectedSale = Sale::select('id', 'user_id', 'payment_type', 'created_at')
                                    ->with('user:id,name,email,profile_photo_path', 'items:id,name,image,cost_price,selling_price')
                                    ->find($sale);
        $this->showingSaleDetail = true;
    }

    public function saleEditForm(Sale $sale) {
        $this->authorize('update', $sale);
        $this->resetErrorBag();

        $this->showingEditForm = true;

        $this->saleId = $sale->id;
        $this->server = $sale->user_id;
        $this->payment_type = $sale->payment_type;
    }

    public function selectingUser($id, $name) {
        $this->selectedUserId = $id;
        $this->server = $id;
        $this->selectedUserName = $name;
    }

    public function cancelSaleForm() {
        $this->showingEditForm = false;

        $this->reset('selectedUserId');
        $this->reset('selectedUserName');
        $this->reset('payment_type');
    }

    public function editSale(){
        $this->validate();

        $update_record = Sale::find($this->saleId);

        $update_record->update([
            'user_id' => $this->server,
            'payment_type' => $this->payment_type,
        ]);

        $this->showingEditForm = false;

        $this->emitSelf('render');
    }

    public function mount() {
        $this->users = User::select('id','name')->get();
    }

    public function render()
    {
        $today = Carbon::now();
        return view('livewire.sales.sales', [
            'sales' => Sale::select('id', 'user_id', 'payment_type', 'created_at')
                            ->with('user:id,name', 'items')
                            ->withCount('items')
                            ->latest()
                            ->when($this->dateFilter, function($query) {
                                $query->whereRaw("DATE(created_at) = '" .$this->dateFilter. "'");
                            })
                            ->search(trim($this->search))
                            ->paginate(10),
            'total_sales' => Sale::count(),
            'total_sales_this_week' => Sale::where('created_at', '>=', $today->startOfWeek(Carbon::SUNDAY))->count(),
            'total_sales_today' => Sale::where('created_at', '>=', Carbon::today())->count(),
        ]);
    }
}
