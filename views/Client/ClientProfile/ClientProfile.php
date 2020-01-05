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
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Functions</h5>
        </div>
        <div class="card-body">
          <form method="post">
            <label for="kick_client">Kick Client</label>
            <input type="hidden" name="clid" value="<?= $client['clid']; ?>">
            <input type="text" class="form-control" name="kick_reason" placeholder="Kick Client with reason">
            <input type="submit" class="btn btn-block btn-danger" name="kick_client" value="Kick Client">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
