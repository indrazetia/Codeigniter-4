<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Pegawai</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.css') ?>">
</head>

<body class="m-5">
    <div class="col-md-6">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Periksa Entrian Form</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?= base_url("auth-edit/$datak->id") ?>">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="kegiatan">Nama Kegiatan</label>
                <input type="text" name="kegiatan" id="kegiatan" value="<?= $datak->kegiatan ?>" class="form-control" placeholder="Isikan Kegiatan">
            </div>
            <div class="form-group">
                <label for="verifikasi">Verifikasi Oleh</label>
                <select name="verifikasi" id="verifikasi" class="form-control">
                    <option default value="0">Pilih Verifikasi</option>
                    <?php foreach ($pegawai as $bardata) { ?>
                        <option value="<?= $bardata['id'] ?>" <?= ($bardata['id'] == $datak->verified_by ? "selected" : ""); ?>><?= $bardata['fullname'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-info">Edit</button>
        </form>

    </div>
</body>

</html>