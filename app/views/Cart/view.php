
    <div class="row">
        <div class="col-md-12">
            <div class="area-title">
                <h3 class="title-group gfont-1">Оформление заказа</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($_SESSION['cart'])):?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Наименование</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($_SESSION['cart'] as $id => $item): ?>
                            <tr>
                                <td><a href="product/<?php echo $item['alias'];?>"><img src="/public/frontend/img/product/mediam/12.jpg" alt="<?php echo $item['title'];?>"></a></td>
                                <td><a href="product/<?php echo $item['alias'];?>"><?php echo $item['title'];?></td>
                                <td><?php echo $item['qty'];?></td>
                                <td><?php echo $item['price'];?></td>
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
        </div>
    </div>

    <div class="account-create">
        <form action="/cart/view" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-create-box">
                        <h2 class="box-info">Персональные данные</h2>
                        <div class="row">
                            <?php if (!isset($_SESSION['user_id'])):?>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-create">
                                        <p>Логин <sup>*</sup></p>
                                        <input class="form-control" type="text" name="login"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-create">
                                        <p>ФИО<sup>*</sup></p>
                                        <input class="form-control" type="text" name="fio"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-create">
                                        <p>Электронная почта <sup>*</sup></p>
                                        <input class="form-control" type="text" name="email"/>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                        <p>Мобильный телефон <sup>*</sup></p>
                                        <input class="form-control" type="text" name="phone"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-create">
                                        <p>Пароль <sup>*</sup></p>
                                        <input class="form-control" type="password" name="password"/>
                                    </div>
                                </div>
                            <?php endif;?>
                            <div class="col-sm-12 col-xs-12">
                                <div class="single-create">
                                    <p>Сообщенние</p>
                                    <textarea class="form-control" name="note" id="" cols="30" rows="10"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-area">
                        <p class="required text-right">* Обязательные поля</p>
                        <?php if (!isset($_SESSION['user_id'])):?>
                            <button type="submit" class="btn btn-primary floatright">Зарегистрироваться</button>
                        <?php else:?>
                            <button type="submit" class="btn btn-primary floatright">Оформить покупку</button>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </form>
    </div>
