<?php
require_once ROOT.'/config/security.php';

require_once ROOT.'/models/Main_model.php';
require_once ROOT.'/models/Application_model.php';

class MainController
{
    public function actionDashboardDisplay(){
        $allSum = Main_model::getAllMoney();
        $payment = Main_model::lastPayment();
        $allApplication = Main_model::countApp();
        $profit = Main_model::profitComp();
        $siteUsers = Main_model::siteAktiv();
        $mostCountryView = Main_model::getViewCountry('nine');


        require_once ROOT.'/views/main.php';
        return true;
    }

    public function actionVisitors(){
        $mostCountryView = Main_model::getViewCountry();

        require_once ROOT.'/views/visitors/table.php';
        return true;
    }

    public function actionValidCountry(){
        $validCountry = Main_model::getValidCountry();

        require_once ROOT.'/views/country/index.php';
        return true;
    }

    public function actionAddValidCountry(){
        require_once ROOT.'/views/country/add-country.php';
        return true;
    }

    public function actionCountryDelete($id){
        if (isset($id)){
            Main_model::delCountry($id);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/country');
        return true;
    }

    public function actionAddValidCountrySuccess(){
        if (isset($_POST['name_ru'])){
            $data = array(
                'name_ru' => $_POST['name_ru'],
            );

            Main_model::addCountry($data);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/country');
        return true;
    }
}