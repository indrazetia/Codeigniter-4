<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Pegawai</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.css') ?>">
    <style type="text/css">

    </style>
</head>

<body class="m-5">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <hr>
    <a href="<?= base_url('tambah-kegiatan') ?>" class="btn btn-success">Tambah Data</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Kegiatan</td>
                <td>DIverivikasi Oleh</td>
                <td>Tindakan</td>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datak as $keydata) :
                $where = array('id' => $keydata->verified_by);
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $keydata->kegiatan ?></td>
                    <td><?php echo (!empty($keydata->fullname) ? '' . $keydata->fullname . '' : '-') ?></td>
                    <td><a href="<?= base_url("edit-kegiatan/$keydata->id") ?>" class="btn btn-secondary">Edit</a> ||
                        <a href="<?= base_url("hapus-kegiatan/$keydata->id")  ?>" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Hapus</a>
                    </td>
                </tr>
            <?php $no++;
            endforeach ?>
        </tbody>
    </table>

</body>

</html>