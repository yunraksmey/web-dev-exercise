<?php
class Order {
    public static function getAll($Search){
    global $pdo;
    if (!empty($Search) && !empty($Search['cond_date'])){
        $stmt = $pdo->prepare("SELECT orders.id ,orders.order_at 
    AS Order_Datetime, customers.name 
    AS Customer_Name 
    FROM customers 
    INNER JOIN orders 
    ON customers.id = orders.customer_id
    WHERE order_at >= ? and order_at < ?");
    $cond_datetime = new DateTime($Search['cond_date'] . "00:00:00");
    $stmt->execute(array($cond_datetime->format("Y-m-d H:i:s"),$cond_datetime->modify('+1 day')->format("Y-m-d H:i:s")));
    }else{
    $stmt = $pdo->query("SELECT orders.id ,orders.order_at 
    AS Order_Datetime, customers.name 
    AS Customer_Name 
    FROM customers 
    INNER JOIN orders 
    ON customers.id = orders.customer_id;");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public static function getDetail($id){
global $pdo;
$stmt = $pdo->query("SELECT Menus.name AS menu_name, orders.id ,orders.order_at 
    AS order_at, customers.name 
    AS customer_name ,
    quantity,
    price
    FROM customers 
    INNER JOIN orders
    ON customers.id = orders.customer_id
    INNER JOIN Menus ON Menus.id = Orders.menu_id WHERE Orders.id=?;");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);

}
    }
