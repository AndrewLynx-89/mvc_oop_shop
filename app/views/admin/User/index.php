<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список пользователей
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
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Имя</th>
                                <th>Роль</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <td><?php echo $user['id'];?></td>
                                <td><?php echo $user['login'];?></td>
                                <td><?php echo $user['email'];?></td>
                                <td><?php echo $user['fio'];?></td>
                                <td><?php echo $user['role'];?></td>
                                <td><a href="/admin/user/edit?id=<?php echo $user['id'];?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?php echo count($users);?> пользователей из <?php echo $total;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?php echo $pagination;?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->