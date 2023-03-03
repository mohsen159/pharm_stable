    <!--model stuff -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add a donation </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form autocomplete="off" action="/operation/add_donation.php" method="post" class="was-validated" id="new_drog">
                        <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                            <input type="text" onclick="p_auto(this)" class="form-control order-1 p-2" placeholder="name" name="name[]" required>
                            <input type="text" onclick="dci_auto(this)" class="order-2 p-2" id="dci" placeholder="DCI" name="dci[]" required>
                            <input type="number" id="amount" class="order-3 p-2" placeholder="1" name="amount[]" required>
                            <input type="date" id="exp" class="order-3 p-2" placeholder="exp" name="exp[]" required>
                            <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick=" delet_p(this)">
                                <br>
                        </div>
                        <input type="hidden" id="0">
                        <br>
                        <button style="margin-top:10px" type="button" onclick="addElement()" class="fa fa-plus btn btn-primary"></button>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-outline-success">Add</button>
                    </form>

                </div>



            </div>
        </div>

    </div>
    <!--edit stuff -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form autocomplete="off" action="/operation/edit_donation.php" method="post" class="was-validated" id="edit_don">

                        <div class="mb-3 mt-3">
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" id="dci" name="dci" required>
                        </div>

                        <div class="mb-3 mt-3">
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="date" class=" form-control" id="exp" name="exp" required>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-outline-success">Edit</button>

                        <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["edit_don"]["id"].value ,"dunation")' style="float:right">Delete</button>
                    </form>

                </div>



            </div>
        </div>

    </div>