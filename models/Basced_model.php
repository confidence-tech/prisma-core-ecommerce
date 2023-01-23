<?php

class Basced_model
{
    public static function addItemBasced($id, $size = null){
        $db = Db::getConnection();

        $query = "SELECT model_{$_SESSION['lang']} AS model, price, colichestvo, size, name_photo FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE assort.id={$id} AND photo.main=1";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        $size_m = $size;
        if ($size_m == null){
            $sizes = explode(',',$res['size']);
            if (isset($sizes[0]) && !empty($sizes[0])){
                $size_m = $sizes[0];
            }
        }

        $_SESSION['basced'][] = [
            'id' => $id,
            'name' => $res['model'],
            'price' => $res['price'],
            'count' => 1,
            'size' => $size_m,
            'sum' => $res['price'],
            'photo' => $res['name_photo'],
            'max' => $res['colichestvo']
        ];

        return 'true';
    }

    public static function addOrderComplete($data){
        $db = Db::getConnection();

        $query = $db->prepare("INSERT INTO client(name, adress, phone, city, zip, mail, id_user, pay_type, fulldescription) VALUES (:name, :adress, :phone, :city, :zip, :email, :id_user, :pay_type, :fulldescription)");
        $res = $query->execute([
            ':name' => $data['name'],
            ':adress' => $data['adress'],
            ':phone' => $data['phone'],
            ':city' => $data['city'],
            ':zip' => $data['zip'],
            ':email' => $data['email'],
            ':id_user' => $data['id_user'],
            ':pay_type' => $data['payment_type'],
            ':fulldescription' => $data['fulldescription'],
        ]);
        $id = $db->lastInsertId();

        foreach ($_SESSION['basced'] as $tmp){
            $queryRelOrder = $db->query("INSERT INTO relation_order(id_client, id_item, count, status, size) VALUES ({$id}, {$tmp['id']}, {$tmp['count']}, 0, '{$tmp['size']}')");
        }

        return 'true';
    }


    public static function getOrder($id){
        $db = Db::getConnection();

        $query = "SELECT client.id, client.name AS name, client.adress AS adress, client.phone AS phone, city, client.mail AS mail, id_client, pay_type, id_item, relation_order.count, assort.model_ru AS model, assort.colichestvo AS count_item,assort.price AS price, photo.name_photo 
                  FROM client INNER JOIN relation_order ON client.id=relation_order.id_client
                  INNER JOIN assort ON id_item=assort.id INNER JOIN photo ON photo.id_tovar=id_item WHERE relation_order.status=0 AND photo.main=1 AND client.id_user={$id} ORDER BY relation_order.data_order DESC";



        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function cheackWishlistForId($id_item, $id_user){
        $db = Db::getConnection();

        $query = "SELECT * FROM wishlist WHERE id_item={$id_item} AND id_user={$id_user}";

        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function addWishlistItem($id_item, $id_user){
        $db = Db::getConnection();

        $query = "INSERT INTO wishlist(id_item, id_user) VALUE({$id_item}, {$id_user})";

        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function DeleteWishlistItem($id_item, $id_user){
        $db = Db::getConnection();

        $query = "DELETE FROM wishlist WHERE id_item={$id_item} AND id_user={$id_user}";

        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }


    public static function getWishlist(){
        $db = Db::getConnection();
        $query = "SELECT id_item, model_ru, price, colichestvo AS item_count, name_photo FROM wishlist INNER JOIN assort ON assort.id=id_item INNER JOIN photo ON photo.id_tovar=id_item WHERE id_user={$_SESSION['id']} AND main=1";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}