<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center">
                {{ isset($setting->footer_credit) ? $setting->footer_credit : 'Copyright © 2024 || All rights reserved' }}
            </div>
        </div>
    </div>
</footer>