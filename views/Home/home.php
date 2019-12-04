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
                                    echo '<tr>';
                                    echo '<td>' . $client['clid'] . '</td>';
                                    echo '<td>' . $client['client_nickname'] . '</td>';
                                    echo '<td></td>';
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