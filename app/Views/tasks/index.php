<?=$this->extend('layouts/default')?>

<?=$this->section('page_title')?>
    Danh sách tasks
<?=$this->endSection('page_title')?>
<?=$this->section('content')?>
    <h1>Danh sách Tasks</h1>
    <a href="<?= site_url('tasks/create')?>">Tạo task</a>
    <ul>
        <?php foreach ($tasks as $task) :?>
            <li>
                <a href="<?= site_url('tasks/show/'.$task->id)?>">
                    <?= $task->id?>
                    <?= $task->description?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="<?= site_url('')?>"></a>
<?=$this->endSection('content')?>