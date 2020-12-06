<?php
$tgl1 = new DateTime($pekerjaan['tgl_mulai']);

$tgl2 = new DateTime($pekerjaan['tgl_selesai']);

$durasi = $tgl2->diff($tgl1)->days + 1;
?>

<div class="container" style="margin-top: 90px;">
    <table class="table table-light table-bordered table-striped table-responsive">
        <thead>
            <tr>
                <th>Pekerjaan Utama</th>
                <th>Uraian Pekerjaan</th>
                <th>Durasi</th>
                <th>Bobot</th>
                <?php for ($i = 1; $i <= $durasi; $i++) { ?>
                    <th><?= $i; ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function load_data() {
            $.ajax({
                url: "<?php echo base_url() . 'job/u_progress/' . $pekerjaan['id']; ?>",
                dataType: "JSON",
                success: function(data) {

                    for (var count = 0; count < data.length; count++) {

                        html += '<tr class="table-success">';
                        html += '<td class="table_data" data-row_id="' + data[count].id + '" data-column_name="pekerjaan_utama">' + data[count].pekerjaan_utama + '</td>';

                        html += '<td class="table_data" data-row_id="' + data[count].id + '" data-column_name="update_pekerjaan">' + data[count].update_pekerjaan + '</td>';
                        html += '<td class="table_data" data-row_id="' + data[count].id + '" data-column_name="durasi">' + data[count].durasi + '</td>';
                        html += '<td class="table_data" data-row_id="' + data[count].id + '" data-column_name="bobot">' + data[count].bobot + '</td>';
                        html += '</tr>';


                    }
                    $('tbody').html(html);
                }
            })
        }
        load_data();
    });
</script>

</body>

</html>