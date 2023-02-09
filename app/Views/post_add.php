<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Add Post</h2>
                <form action="<?php echo base_url(); ?>/api/addPost" method="post" id="loginForm">
                    <div class="form-group mb-3">
                        <input type="text" name="title" placeholder="Title" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="content" placeholder="Content" class="form-control" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="tags" placeholder="Tags" class="form-control" required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark" id="submitButton">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div><?= $this->endSection() ?>

    <?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            let form    = $(this);
            let button  = $("#submitButton");
            let url     = form.attr("action");
            let method  = form.attr("method");
            let data    = form.serialize();
            
            button.attr("disabled", true);
            var request = $.post(url, data, null, "json");
            request.done(function(response) {
                if(response.status === 200)
                {
                    window.location.href = response.redirect;
                }
            })
            .fail(function(xhr, status, error) {
                let response    = JSON.parse(xhr.responseText);
                let messages    = response.messages;
                let errorText   = "";
                if(typeof messages === 'object')
                {
                    $.each(messages, function( index, value ) {
                        errorText += value + "\n";
                    });
                } else {
                    errorText += messages.error;
                }
                alert(errorText);
                button.attr("disabled", false);
            });
        });
    });
</script>
<?= $this->endSection() ?>