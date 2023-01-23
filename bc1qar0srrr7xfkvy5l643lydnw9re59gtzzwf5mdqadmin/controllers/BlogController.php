<?php
require_once ROOT.'/config/security.php';

class BlogController
{
    public function actionBlogAdd(){
        require_once ROOT.'/views/blog/add-blog.php';

        return true;
    }

    public function actionBlogAddConfirm(){
        require_once ROOT.'/views/blog/add-blog.php';

        return true;
    }
}