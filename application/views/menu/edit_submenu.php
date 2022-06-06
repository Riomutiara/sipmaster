<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <form action="<?= base_url('menu/editsubmenu/') . $sm['id']; ?>" method="POST">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Menu ID</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?= $sm['id']; ?>">
                        <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $sm['menu_id']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">

                        <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">

                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">

                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->