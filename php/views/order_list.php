<h1>🧾Order List</h1>
<a href="/">🏠Top</a>
<?= $message??''?>
<table>

<thead>
<tr>
<th>ID</th>
<th>Order Datetime</th>
<th>Customer Name</th>
<th></th>
</tr>
</thead>
<tbody>
    <form action="order_list" method="GET">
    <input type="date" name="cond_date" value=<?= h($cond_date)?> />
    <button type="submit">🔍Search</button>
    </form>
<?php foreach ($orders as $order): ?>
<tr>
<td><?= h($order['id']) ?></td>
<td><?= h($order['Order_Datetime']) ?></td>
<td><?= h($order['Customer_Name']) ?></td>
<td><a href="/order_detail?id=<?=htmlspecialchars($order['id'])?>"><?= h($order['id'])?></a></td>
<!-- <a href=""></a> -->
</tr>
<?php endforeach; ?>
</tbody>
</table>