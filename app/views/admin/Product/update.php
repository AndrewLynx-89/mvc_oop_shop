<section class="content-header">
    <h1>Редактирование товара № <?php echo $product['id'];?></h1>
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
                                    <input type="text" name="title" class="form-control" placeholder="Введите заголовок" value="<?php echo $product['title'];?>"/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Категория товара</label>
                                    <?php new \app\widgets\Menu\Menu([
                                        'tpl' => MENU_TPL . 'select.php',
                                        'class' => 'form-control',
                                        'container' => 'select',
                                        'selected' => $product['category_id'],
                                        'attrs' => ['name' => 'category_id']
                                    ]);?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Цена</label>
                                    <input type="text" name="price" class="form-control" placeholder="Укажите цену" value="<?php echo $product['price'];?>"/>
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
                        <textarea id="product_editor" name="content" rows="10" cols="80"><?php echo $product['content'];?></textarea>
                    </div>
                </div>

                <?php
                    $filter = new \app\widgets\Filter\Filter($filter, FILTER_TPL . 'admin_product_filter.php');
                    $filter->run();
                ?>

                <div class="box box-primary">
                    <div class="form-group" style="margin-left: 15px;">
                        <label>
                            <input type="checkbox" name="status" checked> Статус
                        </label>
                    </div>

                    <div class="form-group" style="margin-left: 15px;">
                        <label>
                            <input type="checkbox" name="hit"> Хит
                        </label>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Основное изображение товара</label>
                                <div class="dropzone" id="single"></div>
                            </div>
                            <div id="single_uploaded">
                                <?php if ($product['single_image'] != 'no-image.jpg'):?>
                                    <div class="">
                                        <img id="delete"
                                             style="max-width: 250px; max-height: 200px; margin: 0 5px;"
                                             src="/public/uploads/product/<?php echo $product['single_image']; ?>"
                                             data-id = "<?php echo $product['id'];?>"
                                             data-src = "<?php echo $product['single_image']; ?>"
                                             alt=""
                                        >
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Галерея товара</label>
                                <div class="dropzone" id="multi"></div>
                            </div>

                            <div id="multi_uploaded">
                                <?php foreach ($gallery as $key => $value):?>
                                    <img id="delete"
                                         style="max-width: 250px; max-height: 200px; display: inline-block;"
                                         src="/public/uploads/gallery/<?php echo $value['img']?>"
                                         data-id = "<?php echo $product['id'];?>"
                                         data-src = "<?php echo $value['img']?>"
                                         alt=""
                                    >
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
