
<?php
$path = VIEW_DIR . DS . 'layout' . DS . 'header.php';
include $path
?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <div class="row">
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-12">
                        <form role="form" method="GET" action="<?= Index ?>">
                            <input type="hidden" value="CustomerController/listCustomersAction" name="r">
                            <div class="form-group col-lg-6">
                                <label>Countries</label>
                                <select class="form-control" aria-label="Default select example" name="country">
                                    <option value="all" <?= ($countryCode =='all')?'selected':'' ?> >All</option>
                                    <option value="237" <?= ($countryCode =='237')?'selected':'' ?> >Cameroon</option>
                                    <option value="251"<?= ($countryCode =='251')?'selected':'' ?>  >Ethiopia</option>
                                    <option value="212"<?= ($countryCode =='212')?'selected':'' ?>  >Morocco</option>
                                    <option value="258"<?= ($countryCode =='258')?'selected':'' ?>  >Mozambique</option>
                                    <option value="256"<?= ($countryCode =='256')?'selected':'' ?>  >Uganda</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Status</label>

                                <select class="form-control" aria-label="Default select example" name="status">
                                    <option value="all" <?= ($status =='all')?'selected':'' ?> >all</option>
                                    <option value="Valid" <?= ($status =='Valid')? 'selected':'' ?>>Valid</option>
                                    <option value="inValid" <?= ($status =='inValid')?'selected':'' ?> >inValid</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success"> Submit </button>
                            <!--                                                    <a href="--><?//= Index ?><!--UserController/deleteUsersAction&userId?>" class="btn btn-success"> submit </a>-->
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>


                <table width="100%" class="text-center table table-striped table-bordered table-hover"
                       id="dataTables-example">
                    <thead>
                    <tr>
                        <th>country</th>
                        <th>status</th>
                        <th>code</th>
                        <th>phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allNumbers as $number):?>

                        <tr class="gradeU">

                            <td><?=$number['country']?></td>
                            <td><?=$number['status']?></td>
                            <td><?=$number['code']?></td>
                            <td><?=$number['phone']?></td>

                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
$path = VIEW_DIR . DS . 'layout' . DS . 'footer.php';
include $path
?>