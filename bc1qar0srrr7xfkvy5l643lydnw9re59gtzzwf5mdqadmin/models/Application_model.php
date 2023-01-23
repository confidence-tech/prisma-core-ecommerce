<?php

class Application_model
{
    public static function getApplication(){
        $db = Db::connection();

        $query = "SELECT * FROM relation_order ORDER BY date_application DESC";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function addArchiveApplication($id){
        $db = Db::connection();

        if (isset($id) && !empty($id)){
            $query = $db->prepare("UPDATE relation_order SET status=2 WHERE id=:id");
            $res = $query->execute([':id' => $id]);

            return $res;
        }
    }

    public static function delApplication($id){
        $db = Db::connection();

        if (isset($id) && !empty($id)) {
            $query = $db->prepare("DELETE FROM relation_order WHERE id=:id");
            $res = $query->execute([':id' => $id]);

            return $res;
        }
    }

    public static function addApplication($data){
        $db = Db::connection();

        if (isset($data) && !empty($data)){
            $query = $db->prepare("INSERT INTO relation_order(
                                                first_name, last_name, phone, mail, fulldescription, status, 
                                                all_get_money_usd, send_money_usd, grow_money_usd, all_get_money_uah, send_money_uah, 
                                                grow_money_uah, type_valute, dollar_kurs, status_payment)
                                                 VALUES (:first_name, :last_name, :phone, :mail, :fulldescription, :status, 
                                                :all_get_money_usd, :send_money_usd, :grow_money_usd, :all_get_money_uah, :send_money_uah, 
                                                :grow_money_uah, :type_valute, :dollar_kurs, :status_payment)");
            $res = $query->execute([
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':phone' => $data['phone'],
                ':mail' => $data['mail'],
                ':fulldescription' => $data['fulldescription'],
                ':status' => $data['status'],
                ':all_get_money_usd' => $data['payment_usd'],
                ':send_money_usd' => $data['staff_payment_usd'],
                ':grow_money_usd' => $data['profit_payment_usd'],
                ':all_get_money_uah' => $data['payment_uah'],
                ':send_money_uah' => $data['staff_payment_uah'],
                ':grow_money_uah' => $data['profit_payment_uah'],
                ':type_valute' => $data['valute_type'],
                ':dollar_kurs' => $data['kurs'],
                ':status_payment' => $data['status_payment']
            ]);

            return $res;
        }
    }

    public static function editApplicationSuccess($data){
        $db = Db::connection();

        if (isset($data) && !empty($data)){
            $query = $db->prepare("UPDATE relation_order SET
                                                first_name=:first_name, last_name=:last_name, phone=:phone, mail=:mail, 
                                                fulldescription=:fulldescription, status=:status, 
                                                all_get_money_usd=:all_get_money_usd, send_money_usd=:send_money_usd, grow_money_usd=:grow_money_usd, all_get_money_uah=:all_get_money_uah, send_money_uah=:send_money_uah, 
                                                grow_money_uah=:grow_money_uah, type_valute=:type_valute, dollar_kurs=:dollar_kurs, status_payment=:status_payment WHERE id=:id");
            $res = $query->execute([
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':phone' => $data['phone'],
                ':mail' => $data['mail'],
                ':fulldescription' => $data['fulldescription'],
                ':status' => $data['status'],
                ':all_get_money_usd' => $data['payment_usd'],
                ':send_money_usd' => $data['staff_payment_usd'],
                ':grow_money_usd' => $data['profit_payment_usd'],
                ':all_get_money_uah' => $data['payment_uah'],
                ':send_money_uah' => $data['staff_payment_uah'],
                ':grow_money_uah' => $data['profit_payment_uah'],
                ':type_valute' => $data['valute_type'],
                ':dollar_kurs' => $data['kurs'],
                ':status_payment' => $data['status_payment'],
                ':id' => $data['id']
            ]);

            return $res;
        }
    }

    public static function editApplication($id){
        $db = Db::connection();

        $query = "SELECT * FROM relation_order WHERE id=".$id;
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
}