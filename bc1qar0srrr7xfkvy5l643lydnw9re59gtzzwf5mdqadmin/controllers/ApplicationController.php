<?php
require_once ROOT.'/config/security.php';
require_once ROOT.'/models/Application_model.php';
require_once ROOT.'/controllers/ExchangeController.php';

class ApplicationController
{
    public function actionDisplayApplication(){
        $applications = Application_model::getApplication();

        require_once ROOT.'/views/application/application.php';
        return true;
    }

    public function actionApplicationAdd(){
        if (isset($_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['mail']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && !empty($_POST['mail'])){
            $data = array(
                'first_name' => $_POST['fname'],
                'last_name' => $_POST['lname'],
                'phone' => $_POST['phone'],
                'mail' => $_POST['mail'],
                'fulldescription' => $_POST['fulldescription'],
                'status' => $_POST['status'],
                'status_payment' => $_POST['payment_status'],
                'profit_payment' => $_POST['profit_payment'],
                'valute_type' => $_POST['valute_type'],
                'kurs' => $_POST['kurs_dollar'],
            );

            if ($_POST['valute_type'] == 1 && $_POST['kurs_dollar'] != 0){
                $data['payment_uah'] = $_POST['total_payment']*$_POST['kurs_dollar'];
                $data['payment_usd'] = $_POST['total_payment'];
                $data['staff_payment_uah'] = $_POST['staff_payment']*$_POST['kurs_dollar'];
                $data['staff_payment_usd'] = $_POST['staff_payment'];
                $data['profit_payment_uah'] = $_POST['profit_payment']*$_POST['kurs_dollar'];
                $data['profit_payment_usd'] = $_POST['profit_payment'];
            }elseif ($_POST['valute_type'] == 0 && $_POST['kurs_dollar'] != 0){
                $data['payment_usd'] = $_POST['total_payment']/$_POST['kurs_dollar'];
                $data['payment_uah'] = $_POST['total_payment'];
                $data['staff_payment_usd'] = $_POST['staff_payment']/$_POST['kurs_dollar'];
                $data['staff_payment_uah'] = $_POST['staff_payment'];
                $data['profit_payment_usd'] = $_POST['profit_payment']/$_POST['kurs_dollar'];
                $data['profit_payment_uah'] = $_POST['profit_payment'];
            }
            $addAplication = Application_model::addApplication($data);
        }
        return true;
    }

    public function actionAddApplicationDisplay(){
        require_once ROOT.'/views/application/add.php';

        return true;
    }

    public function actionApplicationEdit($id){
        $data = Application_model::editApplication($id);

        require_once ROOT.'/views/application/edit.php';

        return true;
    }

    public function actionEditApplication(){
        $exchange = new ExchangeController();

        if (isset($_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['mail']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && !empty($_POST['mail'])){

            $data = array(
                'id' => $_POST['id'],
                'first_name' => $_POST['fname'],
                'last_name' => $_POST['lname'],
                'phone' => $_POST['phone'],
                'mail' => $_POST['mail'],
                'fulldescription' => $_POST['fulldescription'],
                'status' => $_POST['status'],
                'status_payment' => $_POST['payment_status'],
                'profit_payment' => $_POST['profit_payment'],
                'valute_type' => $_POST['valute_type'],
            );



            if (isset($_POST['kurs_dollar'])){
                $data['kurs'] = $_POST['kurs_dollar'];
                if (isset($_POST['total_payment']) && $_POST['total_payment'] != 0){
                    $data['payment_usd'] = $_POST['total_payment'];
                    $data['payment_uah'] = $_POST['total_payment']*$_POST['kurs_dollar'];
                }else{
                    $data['payment_usd'] = 0;
                    $data['payment_uah'] = 0;
                }
                if (isset($_POST['staff_payment']) && $_POST['staff_payment'] != 0){
                    $data['staff_payment_usd'] = $_POST['staff_payment'];
                    $data['staff_payment_uah'] = $_POST['staff_payment']*$_POST['kurs_dollar'];
                }else{
                    $data['staff_payment_usd'] = 0;
                    $data['staff_payment_uah'] = 0;
                }
                if (isset($_POST['profit_payment']) && $_POST['profit_payment'] != 0){
                    $data['profit_payment_usd'] = $_POST['profit_payment'];
                    $data['profit_payment_uah'] = $_POST['profit_payment']*$_POST['kurs_dollar'];
                }else{
                    $data['profit_payment'] = 0;
                    $data['profit_payment'] = 0;
                }
            }else{
                $data['kurs'] = 0;
                $data['payment_usd'] = 0;
                $data['payment_uah'] = 0;
                $data['staff_payment_usd'] = 0;
                $data['staff_payment_uah'] = 0;
                $data['profit_payment_usd'] = 0;
                $data['profit_payment_uah'] = 0;
            }

            $status = Application_model::editApplicationSuccess($data);
            echo $status;
        }
        return true;
    }

}