<?php
// -------------------------
// ERROR REPORTING
// -------------------------
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// -------------------------
// REQUIRE FILES
// -------------------------
require_once('classes/conn.php');
require_once('classes/resident.class.php');

// -------------------------
// INIT OBJECT
// -------------------------
$bmis = new ResidentClass($conn);

// -------------------------
// USER DETAILS
// -------------------------
$userdetails = $bmis->get_userdata();
$addedby = trim(($userdetails['surname'] ?? '') . ', ' . ($userdetails['firstname'] ?? 'Admin'));

// -------------------------
// VALIDATE ADMIN
// -------------------------
$bmis->validate_admin();

// -------------------------
// CRUD OPERATIONS
// -------------------------
$bmis->create_announcement();
$bmis->update_announcement();
$bmis->delete_announcement();

// -------------------------
// GET ANNOUNCEMENTS
// -------------------------
$view = $bmis->view_announcement();

// -------------------------
// CURRENT DATE
// -------------------------
$dt = new DateTime("now", new DateTimeZone('Asia/Manila'));
$cdate = $dt->format('Y-m-d');
?>

<!-- Tailwind + Poppins -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
* { font-family: 'Poppins', sans-serif; }
img.announcement-img { max-height: 60px; object-fit: cover; border-radius: 5px; }
</style>

<?php include('dashboard_sidebar_start.php'); ?>

<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Event Announcements</h1>
        <button onclick="openAddModal()"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
            + Add Announcement
        </button>
    </div>

    <!-- ANNOUNCEMENT TABLE -->
    <div class="bg-white shadow-lg rounded-xl overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Content</th>
                    <th class="px-4 py-3 text-center">Photo</th>
                    <th class="px-4 py-3 text-center">Date</th>
                    <th class="px-4 py-3 text-center">Added By</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (is_array($view) && count($view) > 0): ?>
                <?php foreach ($view as $row): ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800"><?= htmlspecialchars($row['title']) ?></td>
                        <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['event']) ?></td>
                        <td class="px-4 py-3 text-center">
                            <?php if(!empty($row['photo'])): ?>
                                <img src="<?= htmlspecialchars($row['photo']) ?>" alt="Photo" class="announcement-img mx-auto">
                            <?php else: ?>
                                <span class="text-gray-400 text-xs">No Photo</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-center"><?= $row['start_date'] ?></td>
                        <td class="px-4 py-3 text-center"><?= htmlspecialchars($row['addedby']) ?></td>
                        <td class="px-4 py-3">
                            <div class="flex flex-col gap-2 items-center">
                                <!-- EDIT BUTTON -->
                                <button
                                    onclick="openEditModal(
                                        '<?= $row['id_announcement'] ?>',
                                        `<?= addslashes(htmlspecialchars($row['title'])) ?>`,
                                        `<?= addslashes(htmlspecialchars($row['event'])) ?>`,
                                        '<?= $row['photo'] ?>'
                                    )"
                                    class="bg-blue-600 hover:bg-blue-700 text-white rounded px-3 py-1 text-xs w-full">
                                    Edit
                                </button>

                                <!-- DELETE FORM -->
                                <form method="post" class="w-full" onsubmit="return confirm('Delete this announcement?');">
                                    <input type="hidden" name="id_announcement" value="<?= $row['id_announcement'] ?>">
                                    <button type="submit" name="delete_announcement"
                                        class="bg-red-600 hover:bg-red-700 text-white rounded px-3 py-1 text-xs w-full">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                        No announcements found.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- ADD MODAL -->
<div id="addModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-full max-w-xl">
        <h2 class="text-xl font-semibold mb-4">Add Announcement</h2>
        <form method="post" enctype="multipart/form-data" class="space-y-4">
            <input name="title" required class="w-full border p-3 rounded" placeholder="Title">
            <textarea name="event" required rows="4" class="w-full border p-3 rounded" placeholder="Content"></textarea>
            
            <!-- Upload Photo -->
            <label class="block text-gray-700 font-medium">Upload Image (Optional)</label>
            <input type="file" name="photo" accept="image/*" class="w-full border p-2 rounded">

            <input type="hidden" name="start_date" value="<?= $cdate ?>">
            <input type="hidden" name="addedby" value="<?= $addedby ?>">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAddModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button type="submit" name="create_announce" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-full max-w-xl">
        <h2 class="text-xl font-semibold mb-4">Update Announcement</h2>
        <form method="post" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id_announcement" id="edit_id">
            
            <input name="title" id="edit_title" required class="w-full border p-3 rounded" placeholder="Title">
            <textarea name="event" id="edit_event" required rows="4" class="w-full border p-3 rounded" placeholder="Content"></textarea>
            
            <!-- Update Photo -->
            <label class="block text-gray-700 font-medium">Update Image (Optional)</label>
            <input type="file" name="photo" accept="image/*" class="w-full border p-2 rounded" id="edit_photo">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button type="submit" name="update_announce" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
const addModal = document.getElementById('addModal');
const editModal = document.getElementById('editModal');

function openAddModal(){ addModal.classList.remove('hidden'); addModal.classList.add('flex'); }
function closeAddModal(){ addModal.classList.add('hidden'); }

function openEditModal(id, title, event, photo){
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_event').value = event;
    // photo input cannot be set programmatically, user can choose new one
    editModal.classList.remove('hidden');
    editModal.classList.add('flex');
}
function closeEditModal(){ editModal.classList.add('hidden'); }
</script>

<?php include('dashboard_sidebar_end.php'); ?>
