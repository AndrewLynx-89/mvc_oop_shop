<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Заказ №<?php echo $order['id'];?>
        <?php if(!$order['status']): ?>
            <a href="/admin/order/change?id=<?php echo $order['id'];?>&status=1" class="btn btn-success btn-xs">Одобрить</a>
        <?php else: ?>
            <a href="/admin/order/change?id=<?php echo $order['id'];?>&status=0" class="btn btn-default btn-xs">Вернуть на доработку</a>
        <?php endif; ?>
        <a href="/admin/order/delete?id=<?php echo $order['id'];?>" class="btn btn-danger btn-xs delete">Удалить</a>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td>Номер заказа</td>
                                <td><?php echo $order['id'];?></td>
                            </tr>
                            <tr>
                                <td>Дата заказа</td>
                                <td><?php echo $order['date_create'];?></td>
                            </tr>
                            <tr>
                                <td>Дата изменения</td>
                                <td><?php echo $order['update_at'];?></td>
                            </tr>
                            <tr>
                                <td>Кол-во позиций в заказе</td>
                                <td><?php echo count($order_products);?></td>
                            </tr>
                            <tr>
                                <td>Сумма заказа</td>
                                <td><?php echo $order['sum'];?></td>
                            </tr>
                            <tr>
                                <td>Имя заказчика</td>
                                <td><?php echo $order['fio'];?></td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td><?php echo $order['status'] ? 'Завершен' : 'Новый';?></td>
                            </tr>
                            <tr>
                                <td>Комментарий</td>
                                <td><?php echo $order['note'];?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3>Детали заказа</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($order_products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id'];?></td>
                                    <td><?php echo $product['title'];?></td>
                                    <td><?php echo $product['qty']; $qty += $product['qty'];?></td>
                                    <td><?php echo $product['price'];?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="active">
                                <td colspan="2">
                                    <b>Итого:</b>
                                </td>
                                <td><b><?php echo $qty;?></b></td>
                                <td><b><?php echo $order['sum'];?></b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->