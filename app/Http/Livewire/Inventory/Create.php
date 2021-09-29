<?php

namespace App\Http\Livewire\Inventory;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;

class Create extends Component
{
    use AuthorizesRequests;

    public $productScan;
    public $newItem;
    public $scanList;
    public $groupWithCount;

    public function submit() {
        $this->newItem = Item::select('id','upc_ean','name','image','category_id','selling_price','cost_price')->with('category:id,name')->where('upc_ean', $this->productScan)->first();
        
        if (isset($this->newItem)) {
            $this->scanList->push($this->newItem);

            $this->groupList($this->scanList);

            $this->productScan = '';
            $this->emitSelf('render');
        } else {
            $this->emit('scanError');
            $this->productScan = '';
            $this->newItem = null;
        }
    }

    public function reduceProductInventory($reducedProduct) {
       $this->scanList = $this->scanList->filter(function ($value, $key) use($reducedProduct) {
           return $value['id'] != $reducedProduct;
       });

       $this->groupList($this->scanList);
       
       $this->emitSelf('render');
    }

    private function groupList($scanList) {
        $groups = $scanList->groupBy('id');
        $this->groupWithCount = $groups->map(function($group) {
            return [
                'id' => $group->first()['id'],
                'upc_ean' => $group->first()['upc_ean'],
                'image' => $group->first()['image'],
                'name' => $group->first()['name'],
                'category' => $group->first()['category']['name'],
                'cost_price' => $group->first()['cost_price'],
                'quantity' => $group->count(),
            ];
        })->all();
    }

    public function cancelInventory() {
        $this->scanList = collect();
        $this->newItem = null;
        $this->groupList($this->scanList);
        $this->emitSelf('render');
    }

    public function finishMakingInventory() {
        $this->authorize('create', User::class);

        if (!empty($this->groupWithCount)) {
            foreach ($this->groupWithCount as $product) {
                $inventory = new Inventory;
                $inventory->item_id = $product["id"];
                $inventory->user_id = auth()->user()->id;
                $inventory->quantity = $product["quantity"];
                $inventory->remarks = $product["quantity"]." of ".$product["name"]." added on ".date("h:i:sa, d/m/Y").".";
                $inventory->save();

                $item = Item::find($inventory->item_id);
                $item->quantity += $inventory->quantity;
                $item->save();
            }
            return redirect('/inventories');
        } else {
            $this->emit('scanError');
        }
        
    }

    public function mount() {
        $this->scanList = collect();
    }

    public function render()
    {
        $this->authorize('create', User::class);

        return view('livewire.inventory.create', [
            'items' => $this->groupWithCount,
        ]);
    }
}
