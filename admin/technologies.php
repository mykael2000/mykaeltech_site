<?php
/**
 * Admin: Technologies CRUD
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();
csrf_verify();

$items = load_collection('technologies', $GLOBALS['technologies']);

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $id = ($_POST['id'] ?? '') !== '' ? (int) $_POST['id'] : null;
        $item = [
            'name' => trim($_POST['name'] ?? ''),
            'icon' => trim($_POST['icon'] ?? '⚙️'),
        ];
        if ($item['name'] === '') {
            admin_set_flash('error', 'Technology name is required.');
        } else {
            if ($id !== null && isset($items[$id])) {
                $items[$id] = $item;
                admin_set_flash('success', 'Technology updated.');
            } else {
                $items[] = $item;
                admin_set_flash('success', 'Technology created.');
            }
            save_collection('technologies', $items);
        }
        header('Location: /admin/technologies.php');
        exit;
    }
    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? -1);
        if (isset($items[$id])) {
            array_splice($items, $id, 1);
            save_collection('technologies', $items);
            admin_set_flash('success', 'Technology deleted.');
        }
        header('Location: /admin/technologies.php');
        exit;
    }
}

$edit = null;
if (($_GET['action'] ?? '') === 'add') {
    $edit = ['name' => '', 'icon' => '⚙️'];
} elseif (($_GET['action'] ?? '') === 'edit' && isset($items[(int) ($_GET['id'] ?? -1)])) {
    $edit = $items[(int) $_GET['id']];
    $edit['id'] = (int) $_GET['id'];
}

admin_header('Technologies', 'technologies');
admin_flash();
?>
<div class="admin-panel">
    <div class="admin-panel-head">
        <h2>All Technologies (<?php echo count($items); ?>)</h2>
        <a class="admin-btn admin-btn-sm" href="/admin/technologies.php?action=add"><i class="fas fa-plus"></i>Add Technology</a>
    </div>
    <?php if (!$items): ?>
        <div class="admin-empty">No technologies yet.</div>
    <?php else: ?>
    <table class="admin-table">
        <thead><tr><th style="width:3rem;">#</th><th>Icon</th><th>Name</th><th class="actions">Actions</th></tr></thead>
        <tbody>
        <?php foreach ($items as $i => $it): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td style="font-size:1.4rem;"><?php echo e($it['icon'] ?? '⚙️'); ?></td>
                <td><strong><?php echo e($it['name'] ?? ''); ?></strong></td>
                <td class="actions">
                    <a class="admin-btn admin-btn-sm admin-btn-secondary" href="/admin/technologies.php?action=edit&id=<?php echo $i; ?>"><i class="fas fa-edit"></i>Edit</a>
                    <form method="post" action="/admin/technologies.php" style="display:inline;" onsubmit="return confirm('Delete this technology?');">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $i; ?>">
                        <button class="admin-btn admin-btn-sm admin-btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<?php if ($edit !== null): ?>
<div class="admin-panel">
    <div class="admin-panel-head"><h2><?php echo isset($edit['id']) ? 'Edit Technology' : 'New Technology'; ?></h2></div>
    <div class="admin-panel-body">
        <form method="post" action="/admin/technologies.php">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="action" value="save">
            <input type="hidden" name="id" value="<?php echo e(isset($edit['id']) ? (string) $edit['id'] : ''); ?>">
            <div class="admin-field-row">
                <div class="admin-field">
                    <label class="admin-label">Name *</label>
                    <input class="admin-input" type="text" name="name" required value="<?php echo e($edit['name'] ?? ''); ?>">
                </div>
                <div class="admin-field">
                    <label class="admin-label">Icon (emoji)</label>
                    <input class="admin-input" type="text" name="icon" value="<?php echo e($edit['icon'] ?? ''); ?>">
                </div>
            </div>
            <button class="admin-btn" type="submit"><i class="fas fa-save"></i>Save</button>
            <a class="admin-btn admin-btn-secondary" href="/admin/technologies.php">Cancel</a>
        </form>
    </div>
</div>
<?php endif; ?>
<?php admin_footer(); ?>