<script>
function checkdob() {
                    var dob,dob1,dob2;
                         dob = document.getElementById('day').value;
                         dob1=document.getElementById('month').value;
                         dob2=document.getElementById('year').value;


                        if (dob == null ||  dob == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>Day is required</b>day";
                            ret = false;
                        } else if (dob1 == null || dob1 == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>month</b>";

                            ret = false;
                        } else if (dob2 == null || dob2 == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>year</b>";

                            ret = false;
                        } else {

                            document.getElementById("doberror").className = "doberrorcorrect";
                        }

                    }
                    
</script>
 
