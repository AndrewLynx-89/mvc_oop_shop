<?php foreach($this->groups as $group_id => $group_title ): ?>

    <section  class="sky-form">
        <h4><?php echo $group_title;?></h4>
                <?php if(isset($this->attrs[$group_id])): ?>

                    <?php foreach($this->attrs[$group_id] as $attr_id => $value): ?>

                        <?php

                        if(!empty($filter) && in_array($attr_id, $filter)){
                            $checked = ' checked';
                        }else{
                            $checked = null;
                        }
                        ?>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox" value="<?php echo $attr_id;?>" <?php echo $checked;?>><i></i><?php echo $value;?>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
    </section>
<?php endforeach; ?>
