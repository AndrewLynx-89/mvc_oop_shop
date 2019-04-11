<section class="content-header">
    <h1>Список товаров</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/product/create" class="btn btn-block btn-success btn-lg">Добавить товар</a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Наименование товара</th>
                            <th>Категория</th>
                            <th>Бренд</th>
                            <th>Цена</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product):?>
                            <tr>
                                <td><?php echo $product['title'];?></td>
                                <td><?php echo $product['category_id'];?></td>
                                <td><?php echo $product['brand_id'];?></td>
                                <td><?php echo $product['price'];?></td>
                                <td class="tex-align:center;">
                                    <a href="/admin/product/update?id=<?php echo $product['id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="/admin/product/delete?id=<?php echo $product['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>