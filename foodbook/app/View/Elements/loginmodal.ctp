<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Sign in to Foodbook</h4>
			</div>
			<div class="modal-body">
				<div style="height:180px;">
					<?php echo $this->form->create('User', array('id'=>'UserLoginForm', 'onsubmit' => 'return false;')); ?>
                    <div class="col-xs-12" style="margin-bottom: 10px;">
                        <span id="logininfobox" class="label label-danger" style="display: none;"></span>
                    </div>
					<div class="col-xs-12" style="margin-bottom: 10px;">
						<?php echo $this->form->input('username', array('label' => false, 'div'=> false, 'class' => 'form-control', 'placeholder' => 'Username')); ?>
					</div>
					<div class="col-xs-12">
						<?php echo $this->form->input('password', array('label' => false, 'div'=> false, 'class' => 'form-control', 'placeholder' => 'Password')); ?>
					</div>
                    <?php echo $this->form->end(); ?>
					<div class="col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
					<div class="col-xs-4">
                        <button type="button" class="btn btn-primary" onclick="login();">Sign in</button>
					</div>
					<?php echo $this->Form->end(); ?>
					<div class="col-xs-offset-2 col-xs-6" style="line-height: 34px;">
						<?php echo $this->Html->link('Sign up here!',array('controller' => 'users', 'action' => 'signup', 'full_base' => true)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


