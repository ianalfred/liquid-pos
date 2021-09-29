<?php

namespace App\Http\Livewire\Item;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Items extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithFileUploads;

    public $upc_ean, $name, $image, $category_id, $capacity_size, $cost_price, $selling_price, $description;

    public $search;
    //protected $queryString = ['search'];

    public $stockFilter;

    public $categories;
    public $selectedCategoryId, $selectedCategoryName = 'Select category';

    public $showingProductForm = false;
    public $showingDeletionConfirmation = false;

    public $editMode = false;

    public $selectedProduct;
    public $selectedProductId;

    public $selectedProductDeletion;

    protected function rules() {
        $rules = [
            'upc_ean' => 'required|string|max:191|unique:items,upc_ean,' . $this->selectedProductId,
            'name' => 'required|string|max:191',
            'capacity_size' => 'required|string|max:191',
            'category_id' => 'required',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric'
        ];
        
        if($this->image) {
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:1024';
        }

        return $rules;
    }

    public function selectingCategory($id, $name) {
        $this->selectedCategoryId = $id;
        $this->category_id = $id;
        $this->selectedCategoryName = $name;
    }

    public function productCreateForm() {
        $this->authorize('create', User::class);

        $this->resetErrorBag();

        $this->showingProductForm = true;
    }

    public function productEditForm(Item $item) {
        $this->authorize('update', $item);
        
        $this->resetErrorBag();

        $this->showingProductForm = true;
        $this->editMode = true;

        $this->upc_ean = $item->upc_ean;
        $this->name = $item->name;
        $this->category_id = $item->category_id;
        $this->capacity_size = $item->capacity_size;
        $this->cost_price = $item->cost_price;
        $this->selling_price = $item->selling_price;
        $this->description = $item->description;
        
        $this->selectedProduct = $item;
        $this->selectedProductId = $item->id;
    }

    public function cancelProductForm() {
        $this->showingProductForm = false;
        $this->editMode = false;

        $this->reset('upc_ean');
        $this->reset('name');
        $this->reset('image');
        $this->reset('category_id');
        $this->reset('capacity_size');
        $this->reset('cost_price');
        $this->reset('selling_price');
        $this->reset('description');
    }

    public function saveProduct() {
        $this->validate();

        if (!empty($this->image)) {
            $productImage = $this->image->hashName();
        } elseif (!empty($this->image) && isset($this->selectedProduct)) {
            $productImage = $this->selectedProduct->image;
        } else {
            $productImage = null;
        }

        $data = [
            'upc_ean' => $this->upc_ean,
            'name' => $this->name,
            'image' => $productImage,
            'category_id' => $this->category_id,
            'capacity_size' => $this->capacity_size,
            'cost_price' => $this->cost_price,
            'selling_price' => $this->selling_price,
            'quantity' => 0,
            'description' => $this->description,
        ];

        if ($this->editMode) {
            $this->selectedProduct->upc_ean = $this->upc_ean;
            $this->selectedProduct->name = $this->name;
            $this->selectedProduct->category_id = $this->category_id;
            $this->selectedProduct->capacity_size = $this->capacity_size;
            $this->selectedProduct->cost_price = $this->cost_price;
            $this->selectedProduct->selling_price = $this->selling_price;
            $this->selectedProduct->description = $this->description;
            if(!empty($this->image)) {
                $this->selectedProduct->image = $productImage;
            }
            $this->selectedProduct->save();
            $this->editMode = false;
        } else {
            Item::create($data);
        }
        
        if(!empty($this->image)) {
            $this->image->store('public/products');
        }

        $this->showingProductForm = false;

        $this->emitSelf('render');

        $this->reset('upc_ean');
        $this->reset('name');
        $this->reset('image');
        $this->reset('category_id');
        $this->reset('capacity_size');
        $this->reset('cost_price');
        $this->reset('selling_price');
        $this->reset('description');

        $this->selectedProduct = "";
    }

    public function confirmProductDeletion(Item $item) {
        $this->authorize('delete', $item);

        $this->showingDeletionConfirmation = true;
        $this->selectedProductDeletion = $item;
    }

    public function deleteProduct() {
        if(!empty($this->selectedProductDeletion->image)) {
            Storage::delete('public/products/'.$this->selectedProductDeletion->image);
        }

        $this->selectedProductDeletion->delete();

        $this->showingDeletionConfirmation = false;
        $this->emitSelf('render');
    }

    public function mount() {
        $this->categories = Category::select('id','name')->get();
    }

    public function render()
    {
        return view('livewire.item.items', [
            'items' => Item::select('id', 'name', 'image', 'category_id', 'capacity_size', 'quantity', 'selling_price')
                        ->with('category:id,name')
                        ->when($this->stockFilter, function($query) {
                            if ($this->stockFilter = 1) {
                                $query->where('quantity', '>', 0);
                            } else if ($this->stockFilter = 2) {
                                $query->where('quantity', 0);
                            }
                        })
                        ->search(trim($this->search))
                        ->paginate(10),
        ]);
    }
}
