<!-- Confirm Delete Modal -->
<div id="confirmDeleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
    <div style="background: white; padding: 20px; border-radius: 10px; max-width: 400px; text-align: center;">
        <h3>Confirm Deletion</h3>
        <p>Type <b>DELETE</b> to confirm.</p>
        <input id="deleteConfirmationInput" type="text" class="form-control" placeholder="Type DELETE to confirm" />
        <div style="margin-top: 20px;">
            <button id="confirmDeleteButton" class="btn btn-danger" disabled>Delete</button>
            <button id="cancelDeleteButton" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</div>
