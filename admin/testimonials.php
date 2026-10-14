<?php
/**
 * Admin: Testimonials CRUD
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();
csrf_verify();

$items = load_collection('testimonials', $GLOBALS['testimonials']);

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $id = ($_POST['id'] ?? '') !== '' ? (int) $_POST['id'] : null;
        $item = [
            'name' => trim($_POST['name'] ?? ''),
            'company' => trim($_POST['company'] ?? ''),
            'role' => trim($_POST['role'] ?? ''),
            'text' => trim($_POST['text'] ?? ''),
            'rating' => max(1, min(5, (int) ($_POST['rating'] ?? 5))),
        ];
        if ($item['name'] === '' || $item['text'] === '') {
            admin_set_flash('error', 'Name and testimonial text are required.');
        } else {
            if ($id !== null && isset($items[$id])) {
                $items[$id] = $item;
                admin_set_flash('success', 'Testimonial updated.');
            } else {
                $items[] = $item;
                admin_set_flash('success', 'Testimonial created.');
            }
            save_collection('testimonials', $items);
        }
        header('Location: /admin/testimonials.php');
        exit;
    }
    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? -1);
        if (isset($items[$id])) {
            array_splice($items, $id, 1);
            save_collection('testimonials', $items);
            admin_set_flash('success', 'Testimonial deleted.');
        }
        header('Location: /admin/testimonials.php');
        exit;
    }
}

$edit = null;
if (($_GET['action'] ?? '') === 'add') {
    $edit = ['name' => '', 'company' => '', 'role' => '', 'text' => '', 'rating' => 5];
} elseif (($_GET['action'] ?? '') === 'edit' && isset($items[(int) ($_GET['id'] ?? -1)])) {
    $edit = $items[(int) $_GET['id']];
    $edit['id'] = (int) $_GET['id'];
}

admin_header('Testimonials', 'testimonials');
admin_flash();
?>
<div class="admin-panel">
    <div class="admin-panel-head">
        <h2>All Testimonials (<?php echo count($items); ?>)</h2>
        <a class="admin-btn admin-btn-sm" href="/admin/testimonials.php?action=add"><i class="fas fa-plus"></i>Add Testimonial</a>
    </div>
    <?php if (!$items): ?>
        <div class="admin-empty">No testimonials yet.</div>
    <?php else: ?>
    <table class="admin-table">
        <thead><tr><th style="width:3rem;">#</th><th>Name</th><th>Company</th><th>Rating</th><th>Excerpt</th><th class="actions">Actions</th></tr></thead>
        <tbody>
        <?php foreach ($items as $i => $it): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><strong><?php echo e($it['name'] ?? ''); ?></strong><br><span style="color:#94a3b8;font-size:0.8rem;"><?php echo e($it['role'] ?? ''); ?></span></td>
                <td><?php echo e($it['company'] ?? ''); ?></td>
                <td style="color:#eab308;"><?php echo str_repeat('★', (int) ($it['rating'] ?? 5)); ?></td>
                <td style="max-width:280px;"><?php echo e(mb_strimwidth($it['text'] ?? '', 0, 80, '…')); ?></td>
                <td class="actions">
                    <a class="admin-btn admin-btn-sm admin-btn-secondary" href="/admin/testimonials.php?action=edit&id=<?php echo $i; ?>"><i class="fas fa-edit"></i>Edit</a>
                    <form method="post" action="/admin/testimonials.php" style="display:inline;" onsubmit="return confirm('Delete this testimonial?');">
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
    <div class="admin-panel-head"><h2><?php echo isset($edit['id']) ? 'Edit Testimonial' : 'New Testimonial'; ?></h2></div>
    <div class="admin-panel-body">
        <form method="post" action="/admin/testimonials.php">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="action" value="save">
            <input type="hidden" name="id" value="<?php echo e(isset($edit['id']) ? (string) $edit['id'] : ''); ?>">
            <div class="admin-field-row">
                <div class="admin-field">
                    <label class="admin-label">Name *</label>
                    <input class="admin-input" type="text" name="name" required value="<?php echo e($edit['name'] ?? ''); ?>">
                </div>
                <div class="admin-field">
                    <label class="admin-label">Role</label>
                    <input class="admin-input" type="text" name="role" value="<?php echo e($edit['role'] ?? ''); ?>" placeholder="CTO">
                </div>
            </div>
            <div class="admin-field-row">
                <div class="admin-field">
                    <label class="admin-label">Company</label>
                    <input class="admin-input" type="text" name="company" value="<?php echo e($edit['company'] ?? ''); ?>">
                </div>
                <div class="admin-field">
                    <label class="admin-label">Rating</label>
                    <select class="admin-select" name="rating">
                        <?php for ($r = 5; $r >= 1; $r--): ?>
                        <option value="<?php echo $r; ?>" <?php echo ((int) ($edit['rating'] ?? 5) === $r) ? 'selected' : ''; ?>><?php echo $r; ?> star<?php echo $r > 1 ? 's' : ''; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="admin-field">
                <label class="admin-label">Testimonial Text *</label>
                <textarea class="admin-textarea" name="text" required><?php echo e($edit['text'] ?? ''); ?></textarea>
            </div>
            <button class="admin-btn" type="submit"><i class="fas fa-save"></i>Save</button>
            <a class="admin-btn admin-btn-secondary" href="/admin/testimonials.php">Cancel</a>
        </form>
    </div>
</div>
<?php endif; ?>
<?php admin_footer(); ?>