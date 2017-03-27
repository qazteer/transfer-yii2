<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div class="well"><h1>Wellcome, <?= $user->username ?></h1></div>
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>

<?php if( Yii::$app->session->hasFlash('error_toself') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error_toself'); ?>
    </div>
<?php endif;?>
<div class="panel panel-primary">
			<div class="panel-heading">
				Your ballance: <span class="badge"><?= $user->balance ?></span>
			</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">Outbound transfers</div>
		  	<div class="panel-body">            
				<table class="table table-striped">
					<thead>
					  <tr>
					    <th>Usernamne</th>
					    <th>Summa</th>
					    <th>Date</th>
					  </tr>
					</thead>
					<tbody>
					<?php if(!empty($alltransfers)): ?>
						<?php foreach($alltransfers as $item): ?>
							<?php if($item['from_user_id'] == $user->id): ?>
								<tr>
								   <td><?php echo $item['to_username']; ?></td>
								   <td><?php echo $item['summa']; ?></td>
								   <td><?php echo date('d-m-Y H:i:s',$item['created_at']); ?></td>
								</tr>
					  		<?php endif; ?>
					  	<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6">	
		<div class="panel panel-primary">
		  <div class="panel-heading">Incoming transfers</div>
		  	<div class="panel-body">          
				<table class="table table-striped">
					<thead>
					  <tr>
					    <th>Usernamne</th>
					    <th>Summa</th>
					  </tr>
					</thead>
					<tbody>
					  	<?php if(!empty($alltransfers)): ?>
							<?php foreach($alltransfers as $item): ?>
								<?php if($item['to_user_id'] == $user->id): ?>
									<tr>
									   <td><?php echo $item['from_username']; ?></td>
									   <td><?php echo $item['summa']; ?></td>
									   <td><?php echo date('d-m-Y H:i:s',$item['created_at']); ?></td>
									</tr>
						  		<?php endif; ?>
						  	<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">Transfer sending form</div>
  <div class="panel-body">
  	<?php $form = ActiveForm::begin(); ?>
        <?= $form->field($usertransfer, 'from_user_id')->hiddenInput(['value' => $user->id])->label(false); ?>
        <?= $form->field($usertransfer, 'summa') ?>
        <?= $form->field($usertransfer, 'to_user_id') ?>
        <?= Html::submitButton('Submit',['class'=>'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
  </div>
</div>

