       <!--add a sales -->
       <div class="modal fade bd-example-modal-sm" id="myModal">
           <div class="modal-dialog">
               <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                       <h4 class="modal-title">new sales </h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                   </div>

                   <!-- Modal body -->
                   <div class="modal-body">
                       <form autocomplete="off" action="/operation/fix_sales.php" method="post" class="was-validated" id="form_sales" name="form_sales">
                           <div class="mb-3 mt-3 autocomplete">
                               <input type="text" class="form-control" id="input_client" placeholder="client" name="client" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="type">
                               <option selected value="2">new</option>
                               <option value="1">old</option>
                           </select>

                           <br>
                         <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="employs">
                             <option selected value="1">wissam</option>
                             <option value="2">mohssen</option> 
                             <option value="3">hakim</option>
                             <option value="4">rafik</option>
                             <option value="5">khouloud</option>
                             <option value="6">mehdi</option>
                             <option value="7">wided</option>
                         </select>
                         <br>
                           <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                               <input type="text" onclick="drugs_auto(this)" class="form-control order-1 p-2" placeholder="drug name" name="name[]" required>
                               <input type="text" onclick="lot_auto(this)" onblur="clear_exist(this)" class="order-2 p-2" style="width:90px" id="lot" placeholder="Lot" name="Lot[]" required>
                               <input type="number" min="0" max="99" class="order-3 p-2" style="width:90px" placeholder="Amount" name="amount[]" required>
                               <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick=" delet_p(this)">
                                   <br>
                           </div>
                           <input type="hidden" id="0">
                           <button style="margin-top:10px" type="button" onclick="addElement()" class="btn btn-primary fa fa-plus"></button>
                           <div class="mb-3 mt-3">
                               <input type="text" class="form-control" id="num_order" placeholder="num_order" name="num_order" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <div class="mb-3">
                               <label for="sale_date" class="form-label">sale date</label>
                               <input type="date" id="sale_date" name="sale_date" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Enter a valid date.</div>
                           </div>
                           <div class="mb-3 mt-3">
                               <input type="text" class="form-control" id="dure" placeholder="dure" name="dure" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <div class="mb-3 mt-3">
                               <textarea class="form-control" id="note" placeholder="note" name="note"></textarea>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>

                           <button type="submit" class="btn btn-outline-success">Add</button>
                       </form>
                   </div>
               </div>
           </div>

       </div>
       <!--edit-->
       <div class="modal fade bd-example-modal-sm" id="myedit">
           <div class="modal-dialog">
               <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                       <h4 class="modal-title">update sales information </h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                   </div>

                   <!-- Modal body -->
                   <div class="modal-body">
                       <form autocomplete="off" action="/operation/update_sale.php" method="post" class="was-validated" id="sale_update" name="sale_update">
                           <div class="mb-3 mt-3">
                               <input type="hidden" class="form-control" id="id" name="id" required>
                               <!-- this on soo we can know wich sales id -->
                           </div>
                           <div class="mb-3 mt-3">
                               <textarea class="form-control" id="medication" placeholder="medication" name="medication" required>
                               </textarea>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>

                           <div class="mb-3 mt-3">
                               <input type="text" class="form-control" id="num_order" placeholder="num_order" name="num_order" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <div class="mb-3">
                               <label for="sale_date" class="form-label">sale date</label>
                               <input type="date" id="sale_date" name="sale_date" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Enter a valid date.</div>
                           </div>
                           <br>
                           <div class="mb-3"> 
                               <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="employs">
                               <option value="1">wissam</option>
                               <option value="2">mohssen</option> 
                               <option value="3">hakim</option>
                               <option value="4">rafik</option>
                               <option value="5">khouloud</option>
                               <option value="6">mehdi</option>
                               <option value="7">wided</option>
                           </select>
                           </div>
                           <br>
                           <div class="mb-3 mt-3">
                               <input type="text" min="1" max="100" class="form-control" id="dure" placeholder="dure" name="dure" required>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <div class="mb-3 mt-3">
                               <textarea class="form-control" id="note_fix" placeholder="note" name="note_fix"></textarea>
                               <div class="valid-feedback">Valid.</div>
                               <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                           <button type="submit" class="btn btn-outline-success">Edit</button>
                           <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["sale_update"]["id"].value ,"sales")' style="float:right">Delete</button>
                       </form>

                   </div>
               </div>
           </div>

       </div>