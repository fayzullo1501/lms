<?php include('header.php'); ?>
  <body id="login">
    <div class="container">

      <form id="login_form" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Вход</h3>
        <input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Имя пользователя" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Пароль" required>
        <button name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-"></i> Войти</button><br><br>
		<a href="../">Назад на главную</a>
		
		      </form>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Добро пожаловать!", { header: 'Администратор' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Не корректный логин или пароль", { header: 'Ошибка' });
						}
						}
						
					});
					return false;
				});
			});
			</script>

		


    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>