<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Online User</h5>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Goto Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($clientlist as $client) {
                                  if($client['client_platform'] != "ServerQuery") {
                                    echo '<tr>';
                                    echo '<td>' . $client['clid'] . '</td>';
                                    echo '<td>' . $client['client_nickname'] . '</td>';
                                    echo '<td><a href="/client/param=' . urlencode($client['client_unique_identifier']) . '" class="btn btn-block btn-info">Client Profile</a></td>';
                                    echo '</tr>';
                                  }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-7">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Your Last Actions</h5>
            </div>
            <div class="card-body">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
