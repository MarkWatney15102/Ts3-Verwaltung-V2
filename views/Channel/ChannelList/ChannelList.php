<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Channel List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <th>#</th>
                            <th>Channel Name</th>
                            <th>Type</th>
                            <th>Clients</th>
                        </tr>
                        <?php 
                            foreach ($channelList as $channel) {
                                echo '<tr>';
                                echo '<th>' . $channel['channel_name'] . '</th>';
                                echo '<th></th>';
                                echo '<th></th>';
                                echo '<th></th>';
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>