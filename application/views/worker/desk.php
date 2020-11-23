<div class="contsiner">
    <a href="<?= base_url('assets/job_desk/job_desk.xlsx'); ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-file-excel"></i> Download Template Job Description</a>
    <div class="row ml-2">
        <form action="<?= base_url('job/insert_desk/') . $pekerjaan['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="job_file"> Upload Job Description</label>
                <input type="file" class="form-control-file" name="job_file" id="job_file">
            </div>
        </form>
    </div>
</div>