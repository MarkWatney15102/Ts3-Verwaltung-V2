<div class="container">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-Header">
          <h5 class="card-title">Information</h5>
        </div>
        <div class="card-body">
          User ID: <?= $editUser->getUserID(); ?>
          <br>
          Username: <?= $editUser->getUsername(); ?>
          <br>
          E-Mail: <?= $editUser->getRegMail(); ?>
          <br>
          Active: <?= $editUser->getActive(); ?>
        </div>
      </div>
    </div>
    <div class="col-8">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Functions</h5>
        </div>
        <div class="card-body">
          <div class="col-6">
            <form method="post">
              <label for="change_user_active_state">Disable User</label>
              <br>
              <input type="hidden" name="change_to" value="<?php echo ($editUser->getActive() == 0) ? 1 : 0; ?>">
              <input type="submit" class="btn btn-info" name="change_user_active_state" value="Change User state">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-Header">
          <h5 class="card-Title">Edit User</h5>
        </div>
        <div class="card-body">
          <form method="post">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $editUser->getUsername(); ?>" placeholder="Username">
            <br>
            <label for="reg_mail">Mail</label>
            <input type="text" class="form-control" name="reg_mail" value="<?= $editUser->getRegMail(); ?>">
            <br>
            <input type="submit" class="btn btn-block btn-success" name="save_edit_user" value="Save">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
