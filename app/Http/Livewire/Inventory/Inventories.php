<?php

namespace App\Http\Livewire\Inventory;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Inventory;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Inventories extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $inventoryFilter;

    public $showingDeletionConfirmation = false;

    public $selectedInventoryDeletion;

    public function confirmInventoryDeletion(Inventory $inventory) {
        $this->authorize('delete', $inventory);

        $this->showingDeletionConfirmation = true;
        $this->selectedInventoryDeletion = $inventory;
    }

    public function deleteInventory() {
        $this->authorize('delete', $this->selectedInventoryDeletion);

        $this->selectedInventoryDeletion->delete();

        $this->showingDeletionConfirmation = false;
        $this->emitSelf('render');
    }
    
    public function render()
    {
        $this->authorize('viewAny', User::class);
        
        return view('livewire.inventory.inventories', [
            'inventories' => Inventory::select('id', 'item_id', 'user_id', 'quantity', 'remarks')
                                    ->with('item:id,image,name,capacity_size,quantity', 'user:id,name')
                                    ->when($this->inventoryFilter, function($query) {
                                        if ($this->inventoryFilter = 1) {
                                            $query->where('quantity', '>', 0);
                                        } else if ($this->stockFilter = 2) {
                                            $query->where('quantity', '<', 0);
                                        }
                                    })
                                    ->latest()
                                    ->paginate(10),
        ]);
    }
}
