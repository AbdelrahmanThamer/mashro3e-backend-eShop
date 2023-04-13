<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Manage offer slider </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Offer slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <!-- form start -->
                        <form class="form-horizontal form-submit-event" action="<?= base_url('admin/offer_slider/add_offer_slider'); ?>" method="POST" enctype="multipart/form-data">
                            <?php if (isset($fetched_data[0]['id'])) { ?>
                                <input type="hidden" id="edit_offer_slider" name="edit_offer_slider" value="<?= @$fetched_data[0]['id'] ?>">
                                <input type="hidden" id="update_id" name="update_id" value="1">
                            <?php } ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <?php
                                    $style = ['default', 'style_1', 'style_2', 'style_3', 'style_4'];
                                    ?>
                                    <label for="style" class="control-label">Style <span class='text-danger text-sm'>*</span></label>
                                    <div class="col-md-12">
                                        <select name="style" class="form-control">
                                            <option value=" ">Select Style</option>
                                            <?php foreach ($style as $row) { ?>
                                                <option value="<?= $row ?>" <?= (isset($fetched_data[0]['style']) && $fetched_data[0]['style'] == $row) ? 'Selected' : '' ?>><?= ucwords(str_replace('_', ' ', $row)) ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_ids" class="control-label">Offer Ids *</label>
                                    <div class="col-md-12">
                                        <select name="offer_ids[]" id="search_offer" class="search_offer w-100" multiple data-placeholder=" Type to search and select products" onload="multiselect()">
                                            <?php
                                            if (isset($fetched_data[0]['id'])) {
                                                $product_id = explode(",", $fetched_data[0]['offer_ids'] ?? '');
                                                foreach ($product_details as $row) {
                                            ?>
                                                    <option value="<?= $row['id'] ?>" selected><?= $row['id'] ?></option>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-success" id="submit_btn"><?= (isset($fetched_data[0]['id'])) ? 'Update offer slider Section' : 'Add offer slider Section' ?></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center form-group">
                                <div id="error_box">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.card-->
            </div>
            <div class="modal fade edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit offer slider Section Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 main-content">
                <div class="card content-area p-4">
                    <div class="card-head">
                        <h4 class="card-title">Offer slider Section</h4>
                    </div>
                    <div class="card-innr">
                        <div class="gaps-1-5x"></div>
                        <table class='table-striped' data-toggle="table" data-url="<?= base_url('admin/offer_slider/get_offer_slider_list') ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true" data-show-refresh="true" data-trim-on-search="false" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true" data-toolbar="" data-show-export="true" data-maintain-selected="true" data-export-types='["txt","excel"]' data-query-params="queryParams">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="style" data-sortable="false">Style</th>
                                    <th data-field="offer_ids" data-sortable="true">Offer ids</th>
                                    <th data-field="date" data-sortable="true">Date</th>
                                    <th data-field="operate">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div><!-- .card-innr -->
                </div><!-- .card -->
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>