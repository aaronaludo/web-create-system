<?php include('../layout/header.php'); ?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Add</h1></div>
                </div>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_unit-add.php" method="POST">
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-12 col-lg-2 col-form-label">Name: <span class="required">*</span></label>
                                        <div class="col-lg-10 col-sm-12">
                                            <input type="text" class="form-control" id="name" name="name"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category_id" class="col-sm-12 col-lg-2 col-form-label">Category: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <select name="category_id" id="category_id" class="form-select form-control">
                                                <option value="1">HTML</option>
                                                <option value="2">CSS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5 mb-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>