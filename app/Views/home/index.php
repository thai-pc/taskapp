<?=$this->extend('layouts/default')?>

<?=$this->section('page_title')?>
Home
<?=$this->endSection('page_title')?>
<?=$this->section('content')?>
    <h1>Home</h1>
    <a href="<?= site_url('signup')?>">Đăng ký</a>
<?=$this->endSection('content')?>