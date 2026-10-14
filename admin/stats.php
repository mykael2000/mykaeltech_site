<?php
/**
 * Admin: Stats CRUD (homepage counters)
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();
csrf_verify();

$items = load_collection('stats', $GLOBALS['stats']);

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $id = ($_POST['id'] ?? '') !== '' ? (int) $_POST['id'] : null;
        $item = [
            'label' => trim($_POST['label'] ?? ''),
            'value' => (int) ($_POST['value'] ?? 0),
            'suffix' => trim($_POST['suffix'] ?? ''),
        ];
        if ($item['label'] === '') {
            admin_set_flash('error', 'Stat label is required.');
        } else {
            if ($id !== null && isset($items[$id])) {
                $items[$id] = $item;
                admin_set_flash('success', 'Stat updated.');
            } else {
                $items[] = $item;
                admin_set_flash('success', 'Stat created.');
            }
            save_collection('stats', $items);
        }
        header('Location: /admin/stats.php');
        exit;
    }
    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? -1);
        if (isset($items[$id])) {
            array_splice($items, $id, 1);
            save_collection('stats', $items);
            admin_set_flash('success', 'Stat deleted.');
        }
        header('Location: /admin/stats.php');
        exit;
    }
}

$edit = null;
if (($_GET['action'] ?? '') === 'add') {
    $edit = ['label' => '', 'value' => 0, 'suffix' => '+'];
} elseif (($_GET['action'] ?? '') === 'edit' && isset($items[(int) ($_GET['id'] ?? -1)])) {
    $edit = $items[(int) $_GET['id']];
    $edit['id'] = (int) $_GET['id'];
}

admin_header('Stats', 'stats');
admin_flash();
?>
<div class="admin-panel">
    <div class="admin-panel-head">
        <h2>Homepage Counters (<?php echo count($items); ?>)</h2>
        <a class="admin-btn admin-btn-sm" href="/admin/stats.php?action=add"><i class="fas fa-plus"></i>Add Stat</a>
    </div>
    <?php if (!$items): ?>
        <div class="admin-empty">No stats yet.</div>
    <?php else: ?>
    <table class="admin-table">
        <thead><tr><th style="width:3rem;">#</th><th>Label</th><th>Value</th><th>Suffix</th><th class="actions">Actions</th></tr></thead>
        <tbody>
        <?php foreach ($items as $i => $it): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><strong><?php echo e($it['label'] ?? ''); ?></strong></td>
                <td><?php echo e((string) ($it['value'] ?? '')); ?></td>
                <td><?php echo e($it['suffix'] ?? ''); ?></td>
                <td class="actions">
                    <a class="admin-btn admin-btn-sm admin-btn-secondary" href="/admin/stats.php?action=edit&id=<?php echo $i; ?>"><i class="fas fa-edit"></i>Edit</a>
                    <form method="post" action="/admin/stats.php" style="display:inline;" onsubmit="return confirm('Delete this stat?');">
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
    <div class="admin-panel-head"><h2><?php echo isset($edit['id']) ? 'Edit Stat' : 'New Stat'; ?></h2></div>
    <div class="admin-panel-body">
        <form method="post" action="/admin/stats.php">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="action" value="save">
            <input type="hidden" name="id" value="<?php echo e(isset($edit['id']) ? (string) $edit['id'] : ''); ?>">
            <div class="admin-field-row">
                <div class="admin-field">
                    <label class="admin-label">Label *</label>
                    <input class="admin-input" type="text" name="label" required value="<?php echo e($edit['label'] ?? ''); ?>" placeholder="Projects Completed">
                </div>
                <div class="admin-field">
                    <label class="admin-label">Value</label>
                    <input class="admin-input" type="number" name="value" value="<?php echo e((string) ($edit['value'] ?? 0)); ?>">
                </div>
            </div>
            <div class="admin-field" style="max-width:200px;">
                <label class="admin-label">Suffix</label>
                <input class="admin-input" type="text" name="suffix" value="<?php echo e($edit['suffix'] ?? ''); ?>" placeholder="+">
                <div class="admin-help">Shown after the animated number, e.g. "+" or "%".</div>
            </div>
            <button class="admin-btn" type="submit"><i class="fas fa-save"></i>Save</button>
            <a class="admin-btn admin-btn-secondary" href="/admin/stats.php">Cancel</a>
        </form>
    </div>
</div>
<?php endif; ?>
<?php admin_footer(); ?>