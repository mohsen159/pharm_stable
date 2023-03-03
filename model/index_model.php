    <!--model stuff -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add a medication </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form autocomplete="off" onsubmit="return validateForm()" action="/operation/add_drug.php" method="post" class="was-validated" id="new_drog" name="new_drog">
                        <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                            <input type="text" onchange="find_dci(this);" onfocus="drugs_auto(this)" class="form-control order-1 p-2" placeholder="name" name="name[]" required>
                            <input type="text" onfocus="lot_auto(this)" class="order-2 p-2" style="width:80px" id="lot" placeholder="Lot" name="Lot[]" required>
                            <input type="number" id="amount" class="order-3 p-2" style="width:90px" placeholder="Amount" name="amount[]" required>
                            <input type="text" onfocus="dci_auto(this)" class="order-4 p-2" placeholder="dci" name="dci[]" required>
                            <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick=" delet_p(this)">
                                <br>
                        </div>
                        <input type="hidden" id="0">
                        <br>
                        <button style="margin-top:10px" type="button" onclick="addElement()" class="fa fa-plus btn btn-primary"></button>
                        <br>
                        <br>
                        <!--select class="form-select form-select-sm" aria-label="Default select example" name="type">
                            <option selected value="1">SARL BIG DIS</option>
                            <option selected value="3">hydera</option>
                            <option selected value="2">Attia Pharma</option>
                            <option selected value="2">Attia Pharma</option>

                        </select-->
                        <!--br>
                        <br-->
                        <button type="submit" class="btn btn-outline-success">Add</button>
                    </form>

                </div>



            </div>
        </div>

    </div>
    <!--edit-->
    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">change drugs information </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/operation/update_drug.php" method="post" class="was-validated" id="form_edit" name="form_edit">
                        <div class="mb-3 mt-3">
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lot" placeholder="Enter LOT" name="lot" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">count</label>
                            <input type="number" id="number" min="1" name="number" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Enter a valid number</div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Edit</button>
                        <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["form_edit"]["id"].value ,"products")' style="float:right">Delete</button>
                    </form>

                </div>



            </div>
        </div>

    </div>