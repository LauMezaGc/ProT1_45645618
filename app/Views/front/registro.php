<main>
	<div class="container pt-5 mt-4 mb-5">
		<div class="card-header text-justify">
			<div class="row d-flex justify-content-center">

				<h1>Registro de usuario</h1>

				<?php $validation =\Config\Services::validation(); ?>
				<form method="post" action="<?php echo base_url('/enviar-form') ?>">
				<?=csrf_field();?>
				<?php if(!empty (session()->getFlashdata('fail'))):?>
					<div class="alert alert-danger"><?session()->getFlashdata('fail');?></div>
				<?php endif?>
				<?php if(!empty (session()->getFlashdata('success'))):?>
					<div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
				<?php endif?>
					<div class="card-body justify-content-center" media="(max-width:768px)">
						<div class="mb-2">
							<label for="exampleFormControlInput1" class="form-label">Nombre</label>
							<input name="nombre" type="text" class="form-control" placeholder="nombre" >
								<!-- Error -->
							<?php if($validation->getError('nombre')) {?>
								<div class='alert alert-danger mt-2'>
									<?= $error = $validation->getError('nombre'); ?>
								</div>
				<?php }?>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlTextArea1" class="form-label">Apellido</label>
							<input name="apellido" type="text" class="form-control" placeholder="apellido">
								<!-- Error -->
							<?php if($validation->getError('apellido')) {?>
							<div class='alert alert-danger mt-2'>
								<?= $error = $validation->getError('apellido'); ?>
							</div>
							<?php }?>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Email</label>
							<input name="email" type="text" class="form-control" placeholder="correo@algo.com">
								<!--Error-->
							<?php if($validation->getError('email')) {?>
							<div class='alert alert-danger mt-2'>
								<?= $error = $validation->getError('email'); ?>
							</div>
							<?php }?>
						</div>
							<!-- usuario -->
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Usuario</label>
							<input name="usuario" type="text" class="form-control" placeholder="usuario">
								<!--Error-->
							<?php if($validation->getError('usuario')) {?>
							<div class='alert alert-danger mt-2'>
								<?= $error = $validation->getError('usuario'); ?>
							</div>
							<?php }?>
						</div>
							<!-- contraseña -->
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Contraseña</label>
							<input name="pass" type="password" class="form-control" placeholder="contraseña">
								<!--Error-->
							<?php if($validation->getError('password')) {?>
							<div class='alert alert-danger mt-2'>
								<?= $error = $validation->getError('password'); ?>
							</div>
							<?php }?>
						</div>
							<!-- botones -->
							<input type="submit" value="Guardar" class="btn btn-success">
						<p>¿Ya tiene cuenta? <a href="<?php echo base_url('login'); ?>" class="text-success">Inicie sesión aquí.</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>