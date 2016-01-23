 <div class="box-overlay">
 	<div class="box">
 		<div class="box-title"><?= __('Login'); ?></div>
 		<div class="box-content">
 			<?= $this->Form->create('User',array("url"=>array('controller'=>'users','action'=>'login'))); ?>
 		<fieldset>
 			<?= $this->Form->input('username', array('required'=>false,'label' => __('Username'),
 			'placeholder'=>__('Username :'),'autofocus'=>true)); ?>
 			<?= $this->Form->input('password', array('required'=>false,'label' => __('Password'),
 			'placeholder'=>__('Password :'))); ?>
 			<!-- <div class="input checkbox">
 				<div class="checkbox"> -->
 					<?php echo  $this->Form->input('remember', array('type'=>'checkbox', "checked"=>true,
 					'label'=>__('Remember me') ,'div'=>false, 'required'=>false,'class'=>'input')); ?>
 			<!-- 	</div>
 			</div> -->
 			<ul >
 				<li>
 					<?php // echo  $this->Html->link(__('Forgot password?'), array('action' => 'forgot'),array('id'=>"forgot")); ?>
 					<a href="#" id="forgot"><?php echo __('Forgot password?'); ?></a>
 				</li>
 			</ul>
 			<div class="button text-right">
				<button  type="submit" class="btn btn-primary"> <?= __('Login'); ?></button>
				<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
			</div>
			</fieldset>
 			<?php  echo $this->Form->end(); ?>
 		</div>
 	</div>
 </div>
