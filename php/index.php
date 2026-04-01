<?php
require_once'config.php';
require_once'views/_helpers.php';
require_once'models/order.php';
require_once'models/menu.php';
require_once'controllers/menu.php';
switch($_SERVER['PATH_INFO']??$_SERVER['REQUEST_URI']){
    // case '/order_list':
    // $cond_date = null;
    // if(!empty($_GET)&&!empty($_GET['cond_date'])){
        // $cond_date=$_GET['cond_date'];
    // }
    // include'views/order_list.php';
    // break;
    case'/home':
        // include 'views/home.php';
        render('home',[]);
        break;
    case'/':
        // global $pdo;
        // $stmt=$pdo->query("SELECT name FROM menus WHERE id = 1;");
        // $test_name = $stmt->fetch(PDO::FETCH_ASSOC);
        // include 'views/home.php';
        render('home',[]);
        
         break;
     // menu_list
    case '/menu_list':
        $menus = Menu::getAll();
    // include 'views/menu_list.php';
    render('menu_list',['menus'=>$menus]);
    break;
    // new_menu
    case '/new_menu':
        // include'views/form_menu.php';
        render('form_menu',[]);
        break;
    // edit_menu
    case '/edit_menu';
    $old = Menu::getMenu($_GET['id']);
    // include 'views/form_menu.php';
    render('form_menu',['old'=>$old]);
    break;
    // order_list
    case '/order_list';
    $cond_date = null;
    $orders = Order::getAll($_GET);
    if(!empty($_GET)&&!empty($_GET['cond_date'])){
        $cond_date=$_GET['cond_date'];
    }
    // include 'views/order_list.php';
    render('order_list',['cond_date'=>$cond_date,'orders'=>$orders]);
    break;
    // order_detail
    case '/order_detail';
    $order = Order::getDetail($_GET['id']);
    // include 'views/order_detail.php';
    render('order_detail',['order'=>$order]);
    break;
    // create_menu
    case '/create_menu':
        if ($_SERVER['REQUEST_METHOD']==='POST'){
           
            $controller = new MenuController();
            $controller -> createMenu($_POST);
            echo $_POST['menu_name'];
        }else{
            echo "Bad Request";
        }
        break;
        case '/update_menu':
        if ($_SERVER['REQUEST_METHOD']==='POST'){
           
            $controller = new MenuController();
            $controller -> update_menu($_POST);
            echo $_POST['menu_name'];
        }else{
            echo "Bad Request";
        }
        break;
        default:
    echo "Page not found";
    break;

}