<section class="content-header">
    <h1>
        Список заказов
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
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Покупатель</th>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Дата создания</th>
                                <th>Дата изменения</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <tr class="<?php echo $class;?>">
                                    <td><?php echo $order['id'];?></td>
                                    <td><?php echo $order['fio'];?></td>
                                    <td><?php echo $order['status'] ? 'Завершен' : 'Новый';?></td>
                                    <td><?php echo $order['sum'];?></td>
                                    <td><?php echo $order['date_create'];?></td>
                                    <td><?php echo $order['update_at'];?></td>
                                    <td><a href="/admin/order/view?id=<?php echo $order['id'];?>">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="delete" href="/admin/order/delete?id=<?php echo $order['id'];?>">
                                            <i class="fa fa-fw fa-close text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?php echo count($orders);?> заказа(ов) из <?php echo $total;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?php echo $pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>