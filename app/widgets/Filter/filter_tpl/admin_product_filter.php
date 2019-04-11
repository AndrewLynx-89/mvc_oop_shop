<div class="nav-tabs-custom" id="filter">
    <ul class="nav nav-tabs">
        <?php $i = 1; foreach($this->groups as $group_id => $group_title): ?>
            <li<?php if($i == 1) echo ' class="active"' ?>><a href="#tab_<?php echo  $group_id ?>" data-toggle="tab" aria-expanded="true"><?php echo  $group_title ?></a></li>
            <?php $i++; endforeach; ?>
        <li class="pull-right">
            <a href="" id="reset-filter">Сброс</a>
        </li>
    </ul>
    <div class="tab-content">
        <?php if(!empty($this->attrs[$group_id])): ?>
            <?php $i = 1; foreach($this->groups as $group_id => $group_title): ?>
                <div class="tab-pane<?php if($i == 1) echo ' active' ?>" id="tab_<?php echo  $group_id ?>">
                    <?php foreach($this->attrs[$group_id] as $attr_id => $value): ?>
                        <?php
                        if(!empty($this->filter) && in_array($attr_id, $this->filter)){
                            $checked = ' checked';
                        }else{
                            $checked = null;
                        }
                        ?>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="attrs[<?php echo  $group_id ?>]" value="<?php echo  $attr_id ?>"<?php echo  $checked ?>> <?php echo  $value ?>
                            </label>
                        </div>
                        <?php $i++; endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>