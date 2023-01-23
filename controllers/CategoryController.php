<?php
require_once MAIN_URL.'/models/Category_model.php';

class CategoryController
{
    public function __construct()
    {
        $this->lang_var = Public_model::getLangVar();
        $uri_for_filters = explode('?', $_SERVER['REQUEST_URI']);

        if ($uri_for_filters > 0 && isset($uri_for_filters[1])){
            $this->link_for_filters = $uri_for_filters[1];
        }
    }

    public function actionCategoryView(){
        $category['all'] = Category_model::displayCategory();
        $category['man'] = Category_model::getCategoryForFilter('is_man', 'is_not_accessorize');
        $category['woman'] = Category_model::getCategoryForFilter('is_woman', 'is_not_accessorize');
        $category['accessorize_man'] = Category_model::getCategoryForFilter('is_accessorize','is_man');
        $category['accessorize_woman'] = Category_model::getCategoryForFilter('is_accessorize','is_woman');
        $category['brands'] = Category_model::getBrands();

        return $category;
    }
}