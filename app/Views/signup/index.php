<?= $this->extend('layouts/default') ?>
<?= $this->section('page_title') ?>
Đăng ký
<?= $this->endSection('page_title') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="col-12">
        <h1>Đăng ký</h1>
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <?= form_open('signup/store') ?>
        <?= csrf_field() ?>
        <h5>Tên</h5>
        <input type="text" name="name" value="<?= old('name') ?>">

        <h5>Email</h5>
        <input type="text" name="email" value="<?= old('email') ?>">

        <h5>Password</h5>
        <input type="password" name="password" value="">

        <h5>Nhập lại mật khẩu</h5>
        <input type="password" name="re_password" value="">

        <div><input type="submit" value="Thêm"></div>

        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection('content') ?>


