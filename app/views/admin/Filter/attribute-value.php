<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Фильтры
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <a href="/admin/filter/attribute-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Добавить атрибут</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Группа</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($attrs as $item): ?>
                                <tr>
                                    <td><?php echo $item['value'];?></td>
                                    <td><?php echo $item['title'];?></td>
                                    <td>
                                        <a href="/admin/filter/attribute-edit?id=<?php echo $item['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a class="delete text-danger" href="/admin/filter/attribute-delete?id=<?php echo $item['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a>
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