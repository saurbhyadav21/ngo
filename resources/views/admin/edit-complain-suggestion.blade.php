<div id="editUserSection" class="container mt-4" style="display:none; animation: slideDown 0.5s ease;">
    <h5 class="text-center">Edit Complaint</h5>
    <form id="inlineEditForm">
        <input type="hidden" name="id" id="edit_id">
        <div class="row">
            <div class="col-md-6">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" id="edit_name" required>
            </div>
            <div class="col-md-6">
                <label>Message:</label>
                <input type="text" class="form-control" name="message" id="edit_message" required>
            </div>
            <div class="col-md-12 mt-2">
                <label>Description:</label>
                <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
            </div>
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" id="cancelEditBtn" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>
