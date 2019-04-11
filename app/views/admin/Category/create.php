<section class="content-header">
    <h1>Добавлние новой категории</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Форма добавления категории</h3>
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Название категории</label>
                                <input type="text" name="title" class="form-control" placeholder="Введите заголовок"/>
                            </div>
                            <div class="form-group">
                                <label>Категория продукта</label>
                                <?php new \app\widgets\Menu\Menu([
                                    'tpl' => MENU_TPL . 'select.php',
                                    'container' => 'select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'style' => 'width: 100%',
                                    ],
                                    'prepend' => '<option value="0">Самостоятельная категория</option>',
                                ]);?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
