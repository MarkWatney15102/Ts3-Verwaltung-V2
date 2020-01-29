<div class="container">
  <div class="col-xs-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Account List</h5>
      </div>
      <div class="card-body">
        <table class="table table-dark">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>E-Mail</th>
              <th>Profile</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($accounts as $account) {
                echo '<tr>';
                echo '<td>' . $account['user_id'] . '</td>';
                echo '<td>' . $account['username'] . '</td>';
                echo '<td>' . $account['reg_mail'] . '</td>';
                echo '
                <td>
                  <a href="/admin/userprofile/' . $account['user_id'] . '"
                  class="btn btn-info">
                    Go to Profile
                  </a>
                </td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
