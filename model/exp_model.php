<!-- add modal -->
<div class="modal fade bd-example-modal-sm" id="iModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add expierd </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form autocomplete="off" action=" /operation/add_exp.php" method="post" class="was-validated" id="add_exp" name="add_exp">
                    <div class="mb-3 mt-3 ">
                        <input type="text" class="form-control" id="name" placeholder="name " name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="type">
                        <option selected value="comprimé">comprime</option>
                        <option value="suppo">suppo</option>
                        <option value="collyre">collyre</option>
                        <option value="goutte"> goutte</option>
                        <option value="amp">amp</option>
                        <option value="sachet">sachet</option>
                        <option value="pomad">pomad</option>
                        <option value="doses">doses</option>
                        <option value="other">other</option>

                    </select>
                    <div class="mb-3 mt-3">
                        <input type="number" id="amount" placeholder="Amount" name="amount" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="number" step="0.01" placeholder="prix" name="prix" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" placeholder="date f " name="datef" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" placeholder="date p " name="datep" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Add</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- edit modal -->
<div class="modal fade bd-example-modal-sm" id="exp_edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit expierd </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form autocomplete="off" action=" /operation/edit_exp.php" method="post" class="was-validated" id="edit_exp" name="edit_exp">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3 mt-3 ">
                        <input type="text" class="form-control" id="name" placeholder="name " name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="type">
                        <option selected value="comprimé">comprime</option>
                        <option value="suppo">suppo</option>
                        <option value="collyre">collyre</option>
                        <option value="goutte"> goutte</option>
                        <option value="amp">amp</option>
                        <option value="sachet">sachet</option>
                        <option value="pomad">pomad</option>
                        <option value="doses">doses</option>
                        <option value="other">other</option>

                    </select>
                    <div class="mb-3 mt-3">
                        <input type="number" id="amount" placeholder="Amount" name="amount" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="number" step="0.01" placeholder="prix" id="prix" name="prix" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" placeholder="date f " id="datef" name="datef" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" placeholder="date p " id="datep" name="datep" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Edit</button>
                    <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["edit_exp"]["id"].value ,"expiration")' style="float:right">Delete</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- empty model -->
<div class="modal fade bd-example-modal-sm" id="iempty">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Creat a new record </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form autocomplete="off" action=" /operation/empty.php" method="post" class="was-validated" id="recorde_exp" name="recorde_exp">
                    <div class="mb-3 mt-3">
                        <input readonly id="exp_total" type="text" name="exp_total" placeholder="total" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="date" placeholder="date" name="date" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-danger"> Confirm</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- recored model irecord -->
<div class="modal fade bd-example-modal-lg" id="irecord">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Records</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table" id="exp">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Creation</th>
                            <th scope="col">Totla</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp = $_SESSION['id'];
                        $sql =  "SELECT * FROM `record_exp` WHERE  id_ph= $temp";
                        $r = $pharm->query($sql);
                        if ($r->num_rows > 0) {
                            while ($row = $r->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["id"] . "</th>";
                                echo "<td>" . $row["creation"] . "</td>";
                                echo "<td>" . $row["total"] . "</td>";
                                $amount+= $row["total"]; 
                                echo "<td onclick=\"show_record(" . $row["id"] . ")\">" . "show" . "</td>";
                                echo "</tr>";
                            }
                        }
                        $pharm->close();
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

</div>