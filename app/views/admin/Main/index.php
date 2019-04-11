<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Привет! Это админка
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $orders; ?></h3>

                    <p>Количество заказов</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/order" class="small-box-footer">Просмотреть все заказы <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $categories; ?></h3>

                    <p>Добавлнно категорий</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/category" class="small-box-footer">Детальнее <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $users; ?></h3>

                    <p>Пользователей зарегистрированно</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/user" class="small-box-footer">Просмотреть всех <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>


