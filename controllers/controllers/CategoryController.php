<?php
require_once MAIN_URL.'/models/Category_model.php';

class CategoryController
{
    public function actionCategoryView(){
        $category = Category_model::displayCategory();

        return $category;
    }
}