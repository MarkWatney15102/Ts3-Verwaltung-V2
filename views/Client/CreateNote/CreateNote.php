<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create New Note</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="client_uid" value="<?= htmlentities($this->params['url_param']); ?>">
                        <input type="hidden" name="creator_id" value="<?= $this->config->user->getUserID(); ?>">
                        <label for="note_desc_short">Short Description</label>
                        <input type="text" class="form-control" name="note_desc_short" placeholder="Short Description">
                        <label for="note_desc">Description</label>
                        <textarea class="form-control" name="note_desc" cols="30" rows="10" placeholder="Description"></textarea>
                        <br>
                        <input type="submit" class="btn btn-info col-lg-4" name="create_note" value="Create Note">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>