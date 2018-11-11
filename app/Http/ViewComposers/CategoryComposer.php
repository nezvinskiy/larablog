<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Entity\Category\Category;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $categories = Category::select('*')
            ->orderBy('name', 'asc')
            ->get();

        $view->with('categories', $categories);
    }
}
