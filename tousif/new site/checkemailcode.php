<script>
function CheckCandEmailExists(email) {
                    jQuery.get('../../usercontrols/CandCallback.ashx?key=jchkmail&p1=' + email, function (result) {
                        if (result == "0") {
                            document.getElementById("errstrEmail").innerHTML = 'Already Exists';
                            document.getElementById("errstrEmail").className = "cssclasserror";
                            
                            ShowEmailExistsMsg();
                        }
                        else if (result == "1") {
                            varExistemail=email;
                            document.getElementById("errstrEmail").innerHTML = "&nbsp;";
                            document.getElementById("errstrEmail").className = "cssclasscorrect";
                        }
                    });
                }

function ShowEmailExistsMsg() {
                    //CustomPopup({"key":"verifyemail"}, {"type":"alert"}, {"title":"Registration"}, {"content":"Already Exists"}, {"shadow":"true"})
var varContent = '';
                    

varContent = "Dear user,<p style='line-height: 16px;'>We noticed that your Email is already registered on Mihnati.com or any Partnership Job Engines Powered by Mihnati.com. You can use the same Email and Password to activate your account in (Mihnati.com).</p>" +
             "<p>To login and enable your account on (Mihnati.com) <a href='http://www.mihnati.com/jobboard/cands/candlogin.aspx?chkcand=n'>click here</a>.</p>" +
             "<p>If you forgot your Password, please <a href='http://www.mihnati.com/jobboard/cands/lostlogin.aspx' rel='nofollow'>click here</a>.</p>" +
             "<p>If you would like to use a new Email <a href='javascript:void(0)' onclick='RegisterAsNew();'>click here</a>.</p>";
                    
CustomPopup({
                        key: "candemailexists", 
                        type: "custom", 
                        title: 'Registration', 
                        content: varContent, 
                        shadow: true,
                        width: 550,
                        left: "30%",
                        closebutton: false
                    });
                }


</script>
