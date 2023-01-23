<?php
require_once ROOT.'/config/security.php';
require_once ROOT.'/models/Main_model.php';

class BascedController
{
    public function actionDisplayOrders(){
        $client = Main_model::getOrder();


        require_once ROOT.'/views/basced/orders.php';
        return true;
    }

    public function actionDisplayAdd(){
        require_once ROOT.'/views/finance/add.php';

        return true;
    }

    public function actionArchive($id, $type){
        $relation_order = Main_model::addArchiveItem($id, $type);

        header('location:/admin/orders/all');
        return true;
    }

    public function actionDelete($id){
        $delete_order = Main_model::archiveDelete($id);

        header('location:/admin/orders');
        return true;
    }
}