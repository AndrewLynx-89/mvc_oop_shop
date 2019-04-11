<?php if (!empty($_SESSION['cart'])):?>
    <div class="table-responsive">
        <table class="table table-hover table-striped modal_cart">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="product/<?php echo $item['alias'];?>"><img src="/public/frontend/img/product/mediam/12.jpg" alt="<?php echo $item['title'];?>"></a></td>
                    <td><a href="product/<?php echo $item['alias'];?>"><?php echo $item['title'];?></td>
                    <td><?php echo $item['qty'];?></td>
                    <td><?php echo $item['price'];?></td>
                    <td><span data-id="<?php echo $id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Итого:</td>
                <td colspan="4" class="text-right cart-qty"><?php echo $_SESSION['cart.qty'];?></td>
            </tr>
            <tr>
                <td>На сумму:</td>
                <td colspan="4" class="text-right cart-sum"><?php echo $_SESSION['cart.sum'];?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else:?>
    <h3>Корзина пуста</h3>
<?php  endif;?>