<section class="content-header">
    <h1>Добавлние нового слайда</h1>
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
                                <input type="text" name="title" class="form-control" placeholder="Введите заголовок"/>
                            </div>
                            <div class="form-group">
                                <label for="">Подзаголовок слайда</label>
                                <input type="text" name="subtitle" class="form-control" placeholder="Введите подзаголовок"/>
                            </div>
                            <div class="form-group">
                                <label for="">Цена на слайде</label>
                                <input type="text" name="price" class="form-control" placeholder="Введите подзаголовок"/>
                            </div>
                            <div class="form-group">
                                <label for="">Изображение слайда</label>
                                <div class="dropzone" id="slider_image"></div>
                            </div>

                            <div id="slider_pict"></div>
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
