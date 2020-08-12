<?php
$rootpath = "../../";
?>

<div class="col-12">
    <div class="row my-3">
        <div class="col-12">
            <h2>Add Item Information</h2>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <input type="text" class="form-control" data="itemName" placeholder="Item Name" id="ip_itemName">
        </div>
        <div class="col-6">
            <input type="text" class="form-control" data="itemNumber" disabled value="<?= md5(uniqid()) ?>" id="ip_itemNumber">
            <small id="itemNumberHelp" class="form-text text-muted">Item Number (automatically generated)</small>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <textarea class="form-control" data="description" placeholder="Description (Max. 255 Characters)" rows="4" id="ip_description"></textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-1 text-right pt-2">
            <label for="ip_mass">Mass(cm)</label>
        </div>
        <div class="col-1">
            <input type="text" class="form-control" data="massWidth" placeholder="W" id="ip_massWidth">
        </div>
        <div class="col-1">
            <input type="text" class="form-control" data="massHeight" placeholder="H" id="ip_massHeight">
        </div>
        <div class="col-1">
            <input type="text" class="form-control" data="massDepth" placeholder="D" id="ip_massDepth">
        </div>
        <div class="col-3 offset-1">
            <input type="text" class="form-control" data="weight" placeholder="weight" id="ip_weight">
        </div>
        <div class="col-1 text-right pt-2">
            <label for="ip_status">Status</label>
        </div>
        <div class="col-3">
            <select class="form-control" data="status" id="ip_status">
                <option selected>Availability</option>
                <option>Available</option>
                <option>Sold Out</option>
                <option>No longer in catalogue</option>
            </select>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-1 text-right pt-2">
                <label for="ip_itemGroup">Item Group</label>
            </div>
            <div class="col-5">
                <select class="form-control" data="itemGroup" id="ip_itemGroup">
                    <option value="0" selected>Item Group</option>
                    <option value="1">Group 1</option>
                    <option value="2">Group 2</option>
                    <option value="3">Group 3</option>
                </select>
            </div>
            <div class="col-6">
                <button class="btn btn-primary btn-block" onclick="addItem('1')">Add Item Information</button>
            </div>
        </div>
</div>
