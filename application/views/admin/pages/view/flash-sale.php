<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>View Sale </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('admin/flash_sale/') ?>">View Sale</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12 text-center">
                            <div class="tab-pane active" id="pic-1">
                                <a href="<?= basE_url($sale_details['image']) ?>" data-toggle="lightbox" data-gallery="product-gallery">
                                    <img src="<?= basE_url($sale_details['image']) ?>" class="w-100" /> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?php
                        $ids = explode(',', $sale_details['product_ids']);
                        $product_names = $this->db->select('GROUP_CONCAT(name) as names')->where_in('id', $ids)->get('products')->result_array();
                        ?>
                        <h3 class="my-2"><?= $sale_details['title'] ?></h3>
                        <h6 class="my-3"><?= $sale_details['short_description'] ?></h6>
                        <h6 class="my-3">Products : <?= $product_names[0]['names'] ?></h6>
                        <h6 class="my-3">Discount : <?= $sale_details['discount'] ?></h6>
                        <h6 class="my-3">Start Date : <?= $sale_details['start_date'] ?></h6>
                        <h6 class="my-3">End Date : <?= $sale_details['end_date'] ?></h6>
                        <hr>
                        <div class="col-12 col-sm-12 text-sm">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>
<!-- /.content -->