<section class="content-header">
    <h1>Слайдер главной страницы</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/slider/create" class="btn btn-block btn-success btn-lg">Добавить новый слайд</a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Заголовок сладйа</th>
                            <th>Подзаголовок слайда</th>
                            <th>Картинка</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($slides as $slide):?>
                            <tr>
                                <td><?php echo $slide['title'];?></td>
                                <td><?php echo $slide['subtitle'];?></td>
                                <td><img src="/public/uploads/slider/<?php echo $slide['image'];?>" alt="<?php echo $slide['title'];?>" style="max-width: 150px;"></td>
                                <td class="tex-align:center;">
                                    <a href="/admin/slider/update?id=<?php echo $slide['id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="/admin/slider/delete?id=<?php echo $slide['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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