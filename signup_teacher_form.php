			<form id="signin_teacher" class="form-signin" method="post">
					<h3 class="form-signin-heading"><i class="icon-lock"></i> Регистрация</h3>
					<input type="text" class="input-block-level"  name="firstname" placeholder="Имя" required>
					<input type="text" class="input-block-level"  name="lastname" placeholder="Фамилия" required>
					<label>Отделения</label>
					<select name="department_id" class="input-block-level span12">
						<option></option>
						<?php
						$query = mysqli_query($conn,"select * from department order by department_name ")or die(mysqli_error());
						while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
						<?php
						}
						?>
					</select>
					<input type="text" class="input-block-level" id="username" name="username" placeholder="Имя пользователя" required>
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Пароль" required>
					<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Повторить пароль" required>
					<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Регисттрация</button>
			</form>
			<script>
			jQuery(document).ready(function(){
			jQuery("#signin_teacher").submit(function(e){
					e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "teacher_signup.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Добро пожаловать!", { header: 'Успешно' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}else{
							$.jGrowl("Ваши данные не найдены на базе", { header: 'Ошибка' });
						}
						}
					});
			
					}else
						{
						$.jGrowl("Ваши данные не найдены на базе", { header: 'Ошибка' });
						}
				});
			});
			</script>
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Назад на главную</a>
			
			
			
				
		
					
		