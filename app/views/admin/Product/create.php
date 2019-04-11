<section class="content-header">
    <h1>Добавлние нового товара</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Форма добавления товара</h3>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Название товара</label>
                                        <input type="text" name="title" class="form-control" placeholder="Введите заголовок"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Категория товара</label>
                                        <?php new \app\widgets\Menu\Menu([
                                            'tpl' => MENU_TPL . 'select.php',
                                            'class' => 'form-control',
                                            'container' => 'select',
                                            'attrs' => ['name' => 'category_id']
                                        ]);?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Цена</label>
                                        <input type="text" name="price" class="form-control" placeholder="Укажите цену"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">CK Editor</h3>
                    </div>
                    <div class="box-body pad">
                        <textarea id="product_editor" name="content" rows="10" cols="80"></textarea>
                    </div>
                 </div>

                <?php
                    $filter = new \app\widgets\Filter\Filter(null, FILTER_TPL . 'admin_product_filter.php');
                    $filter->run();
                ?>

                <div class="box">
                    <div class="form-group" style="margin-left: 15px; margin-top: 5px;">
                        <label>
                            <input type="checkbox" name="status" value="1"> Статус
                        </label>
                    </div>

                    <div class="form-group" style="margin-left: 15px;">
                        <label>
                            <input type="checkbox" name="hit" value="1"> Хит
                        </label>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Основное изображение товара</label>
                                <div class="dropzone" id="single"></div>
                            </div>

                            <div id="single_uploaded"></div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Галерея товара</label>
                                <div class="dropzone" id="multi"></div>
                            </div>

                            <div id="multi_uploaded"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</section>
