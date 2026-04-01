<h1>📋Order Detail</h1>
<dl>
    <dt> 🆔order id </dt>
    <dd><?= htmlspecialchars($order['id']??'')?></dd>
    <dt> 📅order datetime </dt>
    <dd><?= htmlspecialchars($order['order_at']??'')?></dd>
    <dt> 👤Customer_Name</dt>
    <dd><?= htmlspecialchars($order['customer_name']??'')?></dd>
    <dt> 🍽️Menu </dt>
    <dd><?= htmlspecialchars($order['menu_name']??'')?></dd>
    <dt> 🔢Qty. </dt>
    <dd><?= htmlspecialchars($order['quantity']??'')?></dd>
    <dt>💲 Price </dt>
    <dd> <?= htmlspecialchars($order['price']??'')?></dd>
</dl>
<a href="order_list">🔙Back to Order List</a>