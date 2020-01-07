<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Note</h5>
                </div>
                <div class="card-body">
                    ID: [<?= $note['id']; ?>]
                    <br>
                    Short Note Description: 
                    <br>
                    <?= $note['note_desc_short']; ?>
                    <br>
                    <br>
                    Note Description:
                    <br>
                    <?= $note['note_desc'] ?>
                    <br>
                    <br>
                    Creator: <?= $note['creator_id'] ?>
                    <br>
                    Create Time: <?= $createTime; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Functions</h5>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>