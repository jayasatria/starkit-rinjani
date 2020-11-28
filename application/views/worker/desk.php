<div class="contsiner">
    <a href="<?= base_url('assets/job_desk/job_desk.xlsx'); ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-file-excel"></i> Download Template Job Description</a>
    <div class="row ml-2">
        <form action="<?= base_url('job/insert_desk/') . $pekerjaan['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="upload_file"> Upload Job Description</label>
                <input type="file" class="form-control-file" name="upload_file" id="upload_file">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>