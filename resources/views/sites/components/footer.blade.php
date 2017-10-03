<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-24 col-sm-24 col-md-24 col-lg-24 col-xl-24">
                <p><i class="fa fa-code" aria-hidden="true"></i> LU GANG</p>
            </div>
        </div>
    </div>
</div>

<div id="enter" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Вход на сайт</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">пароль</label>
              <input type="password" class="form-control" id="password" placeholder="пароль">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-default">Вход</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

 <div id="registr" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Регистрация на сайте</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Имя</label>
              <input type="text" class="form-control" id="name" placeholder="Имя">
          </div>
          <div class="form-group">
            <label for="last_name" class="col-sm-2 control-label">Фамилия</label>
              <input type="text" class="form-control" id="last_name" placeholder="Фамилия">
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Пароль</label>
              <input type="password" class="form-control" id="password" placeholder="Пароль">
          </div>
          <div class="form-group">
            <label for="repassword" class="col-sm-2 control-label">Повторите пароль</label>
              <input type="password" class="form-control" id="repassword" placeholder="Повторите пароль">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-default">Регистрация</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(".enter").click(function() {
        $("#enter").modal('show');
    });
    $(".registr").click(function() {
        $("#registr").modal('show');
    });

</script>