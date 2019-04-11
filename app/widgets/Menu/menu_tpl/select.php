<option value="<?php echo $id;?>"
    <?php echo (!empty($selected) && $id == $selected) ? "selected='selected'" : null; ?>>
    <?php echo $tab . $category['title']?>
</option>
<?php if(isset($category['childs'])): ?>
    <?php echo $this->getMenuHtml($category['childs'], '&nbsp;' . $tab . '-' . '&nbsp;' );?>
<?php endif; ?>