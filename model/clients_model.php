<!--add client -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add a client </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/operation/client_add.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>



        </div>
    </div>

</div>
<!--delet client -->
<div class="modal" id="delet">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delet a client </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="delet_client" action="/operation/delet_client.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class='btn btn-outline-danger'>Confirm Deletion</button>
                </form>

            </div>
        </div>
    </div>

</div>
<!--edit -->
<div class="modal" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">edit</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit_clients" name="edit_clients" action="/operation/edit_client.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="note" name="note" placeholder="note"></textarea>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-outline-success">Edit</button>


                </form>
                <br>
                <br>
                <div class="container">
                    <div class="row justify-content-evenly">
                        <button class='btn btn-outline-warning col' id="unblock" onclick="unsingle_client()">unblock</button>
                        <button class='btn btn-outline-warning col' id="block" onclick="single_client()">block</button>
                        <button class='btn btn-outline-danger col' onclick="delet_client()">Delet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!--single clients -->
<div class="modal" id="single">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">block a client</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="single_client" action="/operation/single_client.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="note" name="note" placeholder="note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Confirm Block</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="modal" id="unsingle">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Unblock a client</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="unsingle_client" action="/operation/unsingle_client.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="note" name="note" placeholder="note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Confirm Unblock</button>
                </form>
            </div>
        </div>
    </div>

</div>