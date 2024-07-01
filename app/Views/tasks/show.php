<?= $this->extend('layouts/default') ?>

<?= $this->section('page_title') ?>
    Hiển thị tasks
<?= $this->endSection('page_title') ?>
<?= $this->section('content') ?>
    <h1>Tasks</h1>

    <ul>
        <li>
            <a href="<?= site_url('tasks') ?>">Quay lại</a>
        </li>
        <li>
            Id : <?= $task->id ?>
        </li>
        <li>
            Description : <?= esc($task->description) ?>
        </li>
        <li>
            Created_at : <?= $task->created_at ?>
        </li>
        <li>
            Updated_at : <?= $task->updated_at ?>
        </li>
        <li>
            <a href="<?= site_url('tasks/edit/' . $task->id) ?>">
                Cập nhật
            </a>
            <?= form_open('tasks/delete/'.$task->id)?>
            <?= csrf_field()?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">
                Xóa
            </button>
            </form>
        </li>
    </ul>
<?= $this->endSection('content') ?>