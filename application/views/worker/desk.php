<div class="container mb-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center" style="width: 18rem; ">
                <div class="card-body mt-4">
                    <h5 class="card-title"><b>Langkah 1:</b> Download template</h5>
                    <a href="<?= base_url('assets/job_desk/job_desk.xlsx'); ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-file-excel"></i> Download Template Job Description</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center" style="width: 18rem; ">
                <div class="card-body">
                    <h5 class="card-title"><b>Langkah 2:</b> Upload template yang sudah diisi</h5>
                    <form action="<?= base_url('job/insert_desk/') . $pekerjaan['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                            <input type="file" class="form-control-file" name="upload_file" id="upload_file">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>