<?php
?>
<div class="modal" tabindex="-1" role="dialog" id="edit_user_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User bearbeiten</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="editUserClose()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div id="userEditContent"></div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="editUserClose()">Schließen</button>
                <button type="button" class="btn btn-primary" onclick="editUserSave()">Speichern</button>
            </div>
        </div>
    </div>
</div>
