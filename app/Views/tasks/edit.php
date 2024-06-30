<?= $this->extend('layouts/default') ?>

<?= $this->section('page_title') ?>
    Tạo task
<?= $this->endSection('page_title') ?>
<?= $this->section('content') ?>
    <h1>Cập nhật task</h1>
<?php if (session()->has('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session('errors') as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
<?= form_open('tasks/update/'.$task->id) ?>
<?= csrf_field() ?>
    <label>Description</label>
    <input type="hidden" name="_method" value="PATCH">
    <input type="text" value="<?= esc($task->description)?>" name="description">
    <button type="submit">
        Cập nhật
    </button>
    <a href="<?= site_url('tasks/show'.$task->id)?>">
        Trở về
    </a>
    </form>
<?= $this->endSection('content') ?>