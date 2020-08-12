<?php

class Alerts
{
    public function buildAlerts()
    {
        ?>
        <div class="row mt-3">
            <div class="col-12">

                <div class="alert alert-primary d-none" id="alert1" role="alert">
                    <span id="alert1message"></span>
                </div>

                <div class="alert alert-warning d-none" id="alert2" role="alert">
                    <span id="alert2message"></span>
                </div>

                <div class="alert alert-danger d-none" id="alert3" role="alert">
                    <span id="alert3message"></span>
                </div>

                <div class="alert alert-success d-none" id="alert4" role="alert">
                    <span id="alert4message"></span>
                </div>
            </div>
        </div>
        <?php
    }
}


?>