console.log("am here ");
function delet(id, name) {
    /* confirm first  */
    var r = confirm("You want to delete thus record  ?");
    if (r == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText); // just for test do somthing more awsome here  
                window.location.reload();
            }
        };
        xmlhttp.open("GET", window.location.origin + "/operation/delet.php?id=" + id + "&name=" + name);
        xmlhttp.send();
    } else {
        /* nothing yet to delete */
    }

}

function clear_exist(arg) {
    if (document.getElementById("select").value == "2") {
        let parent = arg.parentNode;
        const myNodelist = parent.querySelectorAll("input");
        let drug = myNodelist[0].value;
        let lot = myNodelist[1].value;
        let amount = myNodelist[2];
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "-1") {
                    //alert('drug white the name  ' + drug + ' and lot =' + lot + " dosn't exist in the database");
                } else if (this.responseText == "0") {
                   // alert('drug white the name = ' + drug + ' and lot =  ' + lot + " have amount of 0 ");

                }/* else {
                    amount.placeholder = this.responseText;
                }*/
                amount.placeholder = this.responseText;
                amount.max = this.responseText;
            }
        };
        xmlhttp.open("GET", window.location.origin + "/operation/check.php?name=" + drug + "&lot=" + lot);
        xmlhttp.send();
    }
}
function check_exist(arg)
{
    if (document.getElementById("select").value == "2") {    /// if 1 mean an old stuff 
    }
}
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}


/// drugs edit form 
function drug_edit(id, name, lot, amount, exp) {
    document.forms["form_edit"]["id"].value = id;
    document.forms["form_edit"]["name"].value = name;
    document.forms["form_edit"]["lot"].value = lot;
    document.forms["form_edit"]["number"].value = amount;
    document.forms["form_edit"]["exp"].value = exp;
}
/// sales edit form 
 function sales_edit(id) {

    /// get the information about the sale 
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            
            let result = JSON.parse(this.responseText) ;     
            document.forms["sale_update"]["id"].value =  result.id;
            document.forms["sale_update"]["medication"].value = result.medication;
            document.forms["sale_update"]["note_fix"].value = result.note;
            document.forms["sale_update"]["num_order"].value = result.num_order  ; 
            document.forms["sale_update"]["sale_date"].value = result.sales_date ; 
            document.forms["sale_update"]["dure"].value = result.dure;
            document.forms["sale_update"]["employs"].value = result.sales_id;
             
         }
     };
     xmlhttp.open("GET", window.location.origin + "/operation/sales_info.php?id=" +id);
     xmlhttp.send();     
}


function sal(id, name, amount) {
    document.forms["form_sales"]["id"].value = id;
    document.forms["form_sales"]["name"].value = name;
    document.forms["form_sales"]["number"].max = amount;
}

function delet_client(id, name) {
    document.forms["delet_client"]["id"].value = id;
    document.forms["delet_client"]["name"].value = name;
}