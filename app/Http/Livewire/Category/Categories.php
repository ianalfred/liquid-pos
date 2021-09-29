<?php

namespace App\Http\Livewire\Category;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $showingCategoryForm = false;
    public $editMode = false;

    public $showingDeletionConfirmation = false;

    public $name, $image;

    public $selectedCategory;

    public $selectedCategoryDeletion;

    public $search;
    protected $queryString = ['search'];

    protected function rules() {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        
        if($this->image) {
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:1024';
        }

        return $rules;
    }

    public function categoryCreateForm() {

        $this->resetErrorBag();
        $this->showingCategoryForm = true;
    }

    public function categoryEditForm(Category $category) {
        $this->authorize('update', $category);

        $this->resetErrorBag();
        $this->showingCategoryForm = true;
        $this->editMode = true;
        $this->name = $category->name;
        $this->selectedCategory = $category;
    }

    public function cancelCategoryForm() {
        $this->showingCategoryForm = false;
        $this->editMode = false;
        
        $this->reset('name');
        $this->reset('image');
        $this->reset('selectedCategory');
    }

    public function saveCategory() {
        $this->authorize('create', Category::class);

        $this->validate();

        if (!empty($this->image)) {
            $categoryImage = $this->image->hashName();
        } elseif (!empty($this->image) && isset($this->selectedCategory)) {
            $categoryImage = $this->selectedCategory->image;
        } else {
            $categoryImage = null;
        }

        $data = [
            'name' => $this->name,
            'image' => $categoryImage,
        ];

        if ($this->editMode) {
            $this->selectedCategory->name = $this->name;
            if(!empty($this->image)) {
                $this->selectedCategory->image = $categoryImage;
            }
            $this->selectedCategory->save();
            $this->editMode = false;
        } else {
            Category::create($data);
        }
        
        if(!empty($this->image)) {
            $this->image->store('public/categories');
        }

        $this->showingCategoryForm = false;
        $this->emitSelf('render');

        $this->reset('name');
        $this->reset('image');
        $this->reset('selectedCategory');
        
    }

    public function confirmCategoryDeletion(Category $category) {
        $this->authorize('delete', $category);

        $this->showingDeletionConfirmation = true;
        $this->selectedCategoryDeletion = $category;
    }

    public function deleteCategory() {
        if(!empty($this->selectedCategoryDeletion->image)) {
            Storage::delete('public/categories/'.$this->selectedCategoryDeletion->image);
        }

        $this->selectedCategoryDeletion->delete();

        $this->showingDeletionConfirmation = false;
        $this->emitSelf('render');
    }

    public function render()
    {
        return view('livewire.category.categories', [
            'categories' => Category::select('id', 'name','image')
                                ->withCount('items')
                                ->where('name', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
