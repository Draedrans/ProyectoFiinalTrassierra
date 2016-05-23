<?php echo $this->getContent(); ?>


        <?php echo $this->tag->form(array('session/start', 'role' => 'form')); ?>
        <fieldset>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="controls">
                    <?php echo $this->tag->textField(array('username', 'class' => 'form-control', 'autofocus' => 'true')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="controls">
                    <?php echo $this->tag->passwordField(array('password', 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $this->tag->submitButton(array('Login', 'class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </fieldset>
        <?php echo $this->tag->endForm(); ?>
