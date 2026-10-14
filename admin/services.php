<?php
/**
 * Admin: Services CRUD
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();
csrf_verify();

$services = load_collection('services', $GLOBALS['services']);

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $id = ($_POST['id'] ?? '') !== '' ? (int) $_POST['id'] : null;
        $item = [
            'name' => trim($_POST['name'] ?? ''),
            'icon' => trim($_POST['icon'] ?? '🛠️'),
            'description' => trim($_POST['description'] ?? ''),
            'features' => array_values(array_filter(array_map('trim', explode("\n", $_POST['features'] ?? '')), 'strlen')),
            'starting_price' => trim($_POST['starting_price'] ?? ''),
        ];
        if ($item['name'] === '') {
            admin_set_flash('error', 'Service name is required.');
        } else {
            if ($id !== null && isset($services[$id])) {
                $item['slug'] = $services[$id]['slug'] ?? strtolower(str_replace(' ', '-', $item['name']));
                $services[$id] = $item;
                admin_set_flash('success', 'Service "' . $item['name'] . '" updated.');
            } else {
                $item['slug'] = strtolower(str_replace(' ', '-', $item['name']));
                $services[] = $item;
                admin_set_flash('success', 'Service "' . $item['name'] . '" created.');
            }
            save_collection('services', $services);
        }
        header('Location: /admin/services.php');
        exit;
    }
    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? -1);
        if (isset($services[$id])) {
            $name = $services[$id]['name'] ?? '';
            array_splice($services, $id, 1);
            save_collection('services', $services);
            admin_set_flash('success', 'Service "' . $name . '" deleted.');
        }
        header('Location: /admin/services.php');
        exit;
    }
}

$edit = null;
if (($_GET['action'] ?? '') === 'add') {
    $edit = ['name' => '', 'icon' => '🛠️', 'description' => '', 'features' => [], 'starting_price' => ''];
} elseif (($_GET['action'] ?? '') === 'edit' && isset($services[(int) ($_GET['id'] ?? -1)])) {
    $edit = $services[(int) $_GET['id']];
    $edit['id'] = (int) $_GET['id'];
}

admin_header('Services', 'services');
admin_flash();
?>
<div class="admin-panel">
    <div class="admin-panel-head">
        <h2>All Services (<?php echo count($services); ?>)</h2>
        <a class="admin-btn admin-btn-sm" href="/admin/services.php?action=add"><i class="fas fa-plus"></i>Add Service</a>
    </div>
    <?php if (!$services): ?>
        <div class="admin-empty">No services yet. <a href="/admin/services.php?action=add">Add the first one</a>.</div>
    <?php else: ?>
    <table class="admin-table">
        <thead><tr><th style="width:3rem;">#</th><th>Icon</th><th>Name</th><th>Starting Price</th><th>Features</th><th class="actions">Actions</th></tr></thead>
        <tbody>
        <?php foreach ($services as $i => $s): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td style="font-size:1.4rem;"><?php echo e($s['icon'] ?? '🛠️'); ?></td>
                <td><strong><?php echo e($s['name'] ?? ''); ?></strong></td>
                <td><?php echo e($s['starting_price'] ?? '—'); ?></td>
                <td><?php echo count($s['features'] ?? []); ?></td>
                <td class="actions">
                    <a class="admin-btn admin-btn-sm admin-btn-secondary" href="/admin/services.php?action=edit&id=<?php echo $i; ?>"><i class="fas fa-edit"></i>Edit</a>
                    <form method="post" action="/admin/services.php" style="display:inline;" onsubmit="return confirm('Delete this service?');">
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
    <div class="admin-panel-head"><h2><?php echo isset($edit['id']) ? 'Edit Service' : 'New Service'; ?></h2></div>
    <div class="admin-panel-body">
        <form method="post" action="/admin/services.php">
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
            <div class="admin-field">
                <label class="admin-label">Description</label>
                <textarea class="admin-textarea" name="description"><?php echo e($edit['description'] ?? ''); ?></textarea>
            </div>
            <div class="admin-field">
                <label class="admin-label">Features (one per line)</label>
                <textarea class="admin-textarea" name="features"><?php echo e(implode("\n", $edit['features'] ?? [])); ?></textarea>
            </div>
            <div class="admin-field" style="max-width:260px;">
                <label class="admin-label">Starting Price</label>
                <input class="admin-input" type="text" name="starting_price" value="<?php echo e($edit['starting_price'] ?? ''); ?>" placeholder="$5,000">
            </div>
            <button class="admin-btn" type="submit"><i class="fas fa-save"></i>Save Service</button>
            <a class="admin-btn admin-btn-secondary" href="/admin/services.php">Cancel</a>
        </form>
    </div>
</div>
<?php endif; ?>
<?php admin_footer(); ?>