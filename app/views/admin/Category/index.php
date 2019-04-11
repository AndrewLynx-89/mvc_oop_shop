<section class="content-header">
    <h1>Список товаров</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/category/create" class="btn btn-block btn-success btn-lg">Добавить категорию</a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Наименование категории</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <?php new \app\widgets\Menu\Menu([
                                'tpl' => MENU_TPL . 'admin_category.php',
                                'container' => 'tbody'
                        ]);?>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>