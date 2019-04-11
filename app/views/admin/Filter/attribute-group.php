<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Группы фильтров
    </h1>
</section>


<?php var_dump($_SESSION);?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <a href="/admin/filter/group-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Добавить группу</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($attrs_group as $item): ?>
                                <tr>
                                    <td><?php echo $item['title'];?></td>
                                    <td>
                                        <a href="/admin/filter/group-edit?id=<?php echo $item['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a class="delete text-danger" href="/admin/filter/group-delete?id=<?php echo $item['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->