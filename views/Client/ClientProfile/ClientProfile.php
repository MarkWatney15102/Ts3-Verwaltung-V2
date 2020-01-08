<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Information</h5>
        </div>
        <div class="card-body">
          DatabaseID: <?= $client['client_database_id']; ?>
          <br>
          UID: <?= $this->clientUID; ?>
          <br>
          Current Username: <?= $client['client_nickname']; ?>
          <br>
          Current ClientID: <?= $client['clid']; ?>
          <br>
          Last Connection: <?= date('j F Y - G:i:s', $client['client_lastconnected']); ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
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
          <br>
          <form method="post">
            <label for="ban_client">Ban Client</label>
            <input type="hidden" name="clid" value="<?= $client['clid']; ?>">
            <input type="text" class="form-control" name="ban_reason" placeholder="Ban Client with reason">
            <input type="number" class="form-control" name="ban_time" min="0" placeholder="Select the time">
            <select class="form-control" name="ban_unit">
              <option value="1">Seconds</option>
              <option value="2">Minutes</option>
              <option value="3">Hours</option>
              <option value="4">Days</option>
              <option value="5">Permanent</option>
            </select>
            <input type="checkbox" name="ban_sure"> <label for="ban_sure">Are you sure ?</label>
            <input type="submit" class="btn btn-block btn-danger" name="ban_client" value="Ban Client">
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Notes</h5>
        </div>
        <div class="card-body">
          <a href="/create-note?client_uid=<?= $this->clientUID; ?>" class="btn btn-block btn-info">Create New Note</a>
          <table class="table table-dark">
            <thead>
              <tr>
                <th>#</th>
                <th>Short Description</th>
                <th>Show full Note</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($notes as $note) {
                  echo '<tr>';
                  echo '<td>' . $note['id'] . '</td>';
                  echo '<td>' . $note['note_desc_short'] . '</td>';
                  echo '<td><a href="/note?note_id=' . $note['id'] . '" class="btn btn-info">Show full Note</a></td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
