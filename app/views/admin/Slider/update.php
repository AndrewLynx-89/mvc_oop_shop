<section class="content-header">
    <h1>Редактированиее слайда #<?php echo $single_slide['id'];?></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Форма добавления слайда</h3>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Заголовок слайда</label>
                                <input type="text" name="title" class="form-control" placeholder="Введите заголовок" value="<?php echo $single_slide['title'];?>"/>
                            </div>
                            <div class="form-group">
                                <label for="">Подзаголовок слайда</label>
                                <input type="text" name="subtitle" class="form-control" placeholder="Введите подзаголовок" value="<?php echo $single_slide['subtitle'];?>"/>
                            </div>
                            <div class="form-group">
                                <label for="">Цена на слайде</label>
                                <input type="text" name="price" class="form-control" placeholder="Введите подзаголовок" value="<?php echo $single_slide['price'];?>"/>
                            </div>
                            <div class="form-group">
                                <label for="">Изображение слайда</label>
                                <div class="dropzone" id="slider_image"></div>
                            </div>

                            <div id="slider_pict">

                            <?php if ($single_slide['image'] != 'no-slider-image.jpg'):?>
                                <div class="">
                                    <img id="delete"
                                         style="max-width: 250px; max-height: 200px; margin: 0 5px;"
                                         src="/public/uploads/slider/<?php echo $single_slide['image']; ?>"
                                         data-id = "<?php echo $single_slide['id'];?>"
                                         data-src = "<?php echo $single_slide['image']; ?>"
                                         alt=""
                                    >
                                </div>
                            <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </div>
            </form>
        </div>
    </div>
</section>