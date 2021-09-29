<?php

namespace App\Http\Livewire\Sales;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Sale;
use App\Models\SaleItem;
use Livewire\Component;

class Register extends Component
{
    use AuthorizesRequests;

    public $productScan;
    public $newItem;
    public $scanList;
    public $groupWithCount;
    public $saleTotal;

    public $paymentType = 'Cash';

    public $confirmingCheckOut = false;

    public $amountPaid;

    protected $rules = [
        'amountPaid' => 'required|numeric|gte:saleTotal',
    ];

    public function submit() {
        $this->newItem = Item::select('id','upc_ean','name','image','category_id','selling_price','capacity_size')->with('category:id,name')->where('upc_ean', $this->productScan)->first();
        
        if (isset($this->newItem)) {
            $this->scanList->push($this->newItem);

            $this->saleTotal = $this->scanList->sum('selling_price');

            $this->groupList($this->scanList);

            $this->reset('productScan');
            $this->emitSelf('render');
        } else {
            $this->emit('scanError');
            $this->reset('productScan');
            $this->reset('newItem');
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
                'selling_price' => $group->first()['selling_price'],
                'quantity' => $group->count(),
                'total_selling' => $group->sum('selling_price'),
            ];
        })->all();
    }

    public function cancelSale() {
        $this->scanList = collect();
        $this->reset('saleTotal');
        $this->reset('newItem');
        $this->groupList($this->scanList);
        $this->emitSelf('render');
    }

    public function confirmCheckOut() {
        if ($this->scanList->isNotEmpty()) {
            $this->validate();
            $this->confirmingCheckOut = true;
        } else {
            $this->emit('scanError');
        }
    }

    public function finishSale() {
        $this->authorize('create', Sale::class);

        $sale = new Sale;
        $sale->user_id = auth()->user()->id;
        $sale->payment_type = $this->paymentType;
        $sale->remarks = $this->scanList->count()." product(s) added on ".date("h:i:sa, d/m/Y").".";
        $sale->save();

        foreach ($this->groupWithCount as $product) {
            $saleItem = new SaleItem;
            $saleItem->sale_id = $sale->id;
            $saleItem->item_id = $product['id'];
            $saleItem->quantity = $product['quantity'];
            $saleItem->total_selling = $product['total_selling'];
            $saleItem->save();

            $inventory = new Inventory;
            $inventory->item_id = $product["id"];
            $inventory->user_id = auth()->user()->id;
            $inventory->quantity = -($product["quantity"]);
            $inventory->remarks = $product["quantity"]." of ".$product["name"]." sold on ".date("h:i:sa, d/m/Y").".";
            $inventory->save();

            $item = Item::find($product['id']);
            $item->quantity -= $product['quantity'];
            $item->save();
        }

        $this->reset('productScan');
        $this->reset('newItem');
        $this->reset('groupWithCount');
        $this->reset('saleTotal');
        $this->reset('paymentType');
        $this->reset('amountPaid');
        $this->scanList = collect();
        $this->confirmingCheckOut = false;

        $this->emitSelf('render');
    }

    public function mount() {
        $this->scanList = collect();
    }

    public function render()
    {
        return view('livewire.sales.register', [
            'items' => $this->groupWithCount,
            'total_selling_price' => $this->saleTotal,
            'total_items' => $this->scanList->count(),
        ]);
    }
}
