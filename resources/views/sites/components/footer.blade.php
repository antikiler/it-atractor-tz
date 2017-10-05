<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-24 col-sm-24 col-md-24 col-lg-24 col-xl-24">
                <p><i class="fa fa-code" aria-hidden="true"></i> LU GANG</p>
            </div>
        </div>
    </div>
</div>

@if (Auth::guest())
<div id="enter" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Вход на сайт</h4>
      </div>
      <div class="modal-body">
        @include('sites.components.login')
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
         @include('sites.components.register')
      </div>
    </div>
  </div>
</div>
@endif

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