<?php


namespace App\Http\ViewComposers;


use App\Category;
use App\Message;
use Illuminate\View\View;

class CategoriesComposer
{
    public function __construct(Category $category)
    {
        $this->categories = Category::all();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
