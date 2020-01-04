<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-8 col-lg-5">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Information</h5>
        </div>
        <div class="card-body">
          DatabaseID: <?= $client['client_database_id']; ?>
          <br>
          Current Username: <?= $client['client_nickname']; ?>
          <br>
          Current ClientID: <?= $client['clid']; ?>
          <br>
          Last Connection: <?= date('j F Y - G:i:s', $client['client_lastconnected']); ?>
        </div>
      </div>
    </div>
  </div>
</div>
