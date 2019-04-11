<?php
$parent = isset($category['childs']);
if(!$parent){
    $delete = '<a href="/admin/category/delete?id=' . $id . '" class="delete"><i class="fa fa-fw fa-close text-danger"></i></a>';
}else{
    $delete = '<i class="fa fa-fw fa-close"></i>';
}
?>
<tr>
    <td><?php echo $category['title'];?></td>
    <td>
        <a href="/admin/category/update?id=<?php echo $id;?>" class="btn btn-primary">Редактировать</a>
        <?php echo $delete;?>
    </td>
</tr>
<?php if($parent): ?>
    <div class="list-group">
        <?php echo  $this->getMenuHtml($category['childs']); ?>
    </div>
<?php endif; ?>


