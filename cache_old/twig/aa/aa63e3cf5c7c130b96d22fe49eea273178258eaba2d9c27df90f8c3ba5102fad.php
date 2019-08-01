<?php

/* register.twig */
class __TwigTemplate_28919e02f4f352f508fa7ce2eb538f0f6c01b125d73fcecb11ce5a040777f470 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href=\"/vendor/fontawesome-free//css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">
  <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i\" rel=\"stylesheet\">

  <!-- Custom styles for this template-->
  <link href=\"/css/sb-admin-2.min.css\" rel=\"stylesheet\">

</head>

<body class=\"bg-gradient-primary\">


  <div class=\"container\" style=\"padding-left:0px; padding-right:0px;\">

    <div class=\"card o-hidden border-0 shadow-lg my-5\">
      <div class=\"card-body p-0\">
        <!-- Nested Row within Card Body -->
        <div class=\"row\">
          <div style=\"width:40%; padding-top:10%; padding-left:5%\"><img src=\"https://image.flaticon.com/icons/png/512/65/65956.png\" style=\"width:100%; height:70%;\"/></div>
          <div class=\"col-lg-7\">
            <div class=\"p-5\">
              <div class=\"text-center\">
                <h1 class=\"h4 text-gray-900 mb-4\">Create an Account!</h1>
              </div>

              <!--sign up form -->
              <form class=\"user\" action=\"/qi/sign-up/process\" method=\"post\">
                <div class=\"form-group row\">
                  <div class=\"col-sm-6 mb-3 mb-sm-0\">
                    <input type=\"text\" class=\"form-control form-control-user\" name=\"FirstName\" placeholder=\"First Name\">
                  </div>
                  <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control form-control-user\" name=\"LastName\" placeholder=\"Last Name\">
                  </div>
                </div>
                <div class=\"form-group\">
                  <input type=\"text\" class=\"form-control form-control-user\" name=\"nickname\" placeholder=\"NickName\">
                </div>
                <div class=\"form-group\">
                  <input type=\"email\" class=\"form-control form-control-user\" name=\"Email\" placeholder=\"Email Address\">
                </div>
                <div class=\"form-group row\">
                  <div class=\"col-sm-6 mb-3 mb-sm-0\">
                    <input type=\"password\" class=\"form-control form-control-user\" id = \"Password\" name=\"Password\" placeholder=\"Password\" onchange=\"Password_check_using_Regualation()\">
                    <label id = \"lb_pw\"></label>
                  </div>
                  <div class=\"col-sm-6\">
                    <input type=\"password\" class=\"form-control form-control-user\" id = \"Password_confirm\" name=\"Password_confirm\" placeholder=\"Repeat Password\" onchange=\"Password_check_using_Regualation()\">
                    <label id = \"lb_pw_cf\"></label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <input type=\"number\" class=\"form-control form-control-user\" name=\"pregnancy_month\" placeholder=\"Pregnancy Month\">
                </div>
                <div class=\"form-group\">
                  <input type=\"date\" class=\"form-control form-control-user\" name=\"birth\" placeholder=\"Birth\">
                </div>
                <div class=\"form-group\">
                  <input type=\" tel\" class=\"form-control form-control-user\" name=\"phone\" placeholder=\"Phone Number do not include '-'\">
                </div>
                <div class=\"form-group\">
                  <input type=\"text\" class=\"form-control form-control-user\" name=\"state\" placeholder=\"State\">
                </div>
                <div class=\"form-group\">
                  <input type=\"text\" class=\"form-control form-control-user\" name=\"city\" placeholder=\"City\">
                </div>
                <br />
                <div class=\"form-group\">
                  <input type=\"radio\" name = \"gender\" value=\"F\">&nbspFemale&nbsp&nbsp&nbsp&nbsp
                  <input type=\"radio\" name = \"gender\" value=\"M\">&nbspMale
                </div>
                <button type =\"submit\" class=\"btn btn-primary btn-user btn-block\">
                  Register Account
                </button>
              </form>


              <br />
              <div class=\"text-center\">
                <a class=\"small\" href=\"forgot-password.html\">Forgot Password?</a>
              </div>
              <div class=\"text-center\">
                <a class=\"small\" href=\"login.html\">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



    <script>
    // return 0 : not correct, return 1 : correct
      function Password_check_using_Regualation(){
        var pw = document.getElementById('Password').value;
        var pw_confirm = document.getElementById('Password_confirm').value;

        var flag = 0;
        var special_symbol_reqExp = /[\\{\\}\\[\\]\\/?.,;:|\\)*~`!^\\-_+<>@\\#\$%&\\\\\\=\\(\\'\\\"]/gi;
        var capital_reqExp = /[A-Z]/;

        if(pw.length <= 8 || pw.search(special_symbol_reqExp) == -1 || pw.search(capital_reqExp) == -1){
          document.getElementById('lb_pw').innerHTML = \"password must be over 8 character include Special Symbol, Capital, Number\";
          return 0;
        }else{
          document.getElementById('lb_pw').innerHTML = \"That's right!\";
          flag = 1;
        }

        //checking password confirm
        if(flag == 1 && pw == pw_confirm){
          document.getElementById('lb_pw').innerHTML = \"correct!\";
          document.getElementById('lb_pw_cf').innerHTML = \"correct!\";
          return 1;
        }else if(pw != pw_confirm){
          document.getElementById('lb_pw_cf').innerHTML = \"password is not same!\";
          return 0;
        }else{
          document.getElementById('lb_pw_cf').innerHTML = \"please check password requirement!\";
        }
      }
    </script>


  <!-- Bootstrap core JavaScript-->
  <script src=\"/vendor/jquery/jquery.min.js\"></script>
  <script src=\"/vendor/bootstrap//js/bootstrap.bundle.min.js\"></script>

  <!-- Core plugin JavaScript-->
  <script src=\"/vendor/jquery-easing/jquery.easing.min.js\"></script>

  <!-- Custom scripts for all pages-->
  <script src=\"/js/sb-admin-2.min.js\"></script>

</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "register.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* */
/* <head>*/
/* */
/*   <meta charset="utf-8">*/
/*   <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">*/
/*   <meta name="description" content="">*/
/*   <meta name="author" content="">*/
/* */
/*   <title>SB Admin 2 - Register</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="/vendor/fontawesome-free//css/all.min.css" rel="stylesheet" type="text/css">*/
/*   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="/css/sb-admin-2.min.css" rel="stylesheet">*/
/* */
/* </head>*/
/* */
/* <body class="bg-gradient-primary">*/
/* */
/* */
/*   <div class="container" style="padding-left:0px; padding-right:0px;">*/
/* */
/*     <div class="card o-hidden border-0 shadow-lg my-5">*/
/*       <div class="card-body p-0">*/
/*         <!-- Nested Row within Card Body -->*/
/*         <div class="row">*/
/*           <div style="width:40%; padding-top:10%; padding-left:5%"><img src="https://image.flaticon.com/icons/png/512/65/65956.png" style="width:100%; height:70%;"/></div>*/
/*           <div class="col-lg-7">*/
/*             <div class="p-5">*/
/*               <div class="text-center">*/
/*                 <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>*/
/*               </div>*/
/* */
/*               <!--sign up form -->*/
/*               <form class="user" action="/qi/sign-up/process" method="post">*/
/*                 <div class="form-group row">*/
/*                   <div class="col-sm-6 mb-3 mb-sm-0">*/
/*                     <input type="text" class="form-control form-control-user" name="FirstName" placeholder="First Name">*/
/*                   </div>*/
/*                   <div class="col-sm-6">*/
/*                     <input type="text" class="form-control form-control-user" name="LastName" placeholder="Last Name">*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="text" class="form-control form-control-user" name="nickname" placeholder="NickName">*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="email" class="form-control form-control-user" name="Email" placeholder="Email Address">*/
/*                 </div>*/
/*                 <div class="form-group row">*/
/*                   <div class="col-sm-6 mb-3 mb-sm-0">*/
/*                     <input type="password" class="form-control form-control-user" id = "Password" name="Password" placeholder="Password" onchange="Password_check_using_Regualation()">*/
/*                     <label id = "lb_pw"></label>*/
/*                   </div>*/
/*                   <div class="col-sm-6">*/
/*                     <input type="password" class="form-control form-control-user" id = "Password_confirm" name="Password_confirm" placeholder="Repeat Password" onchange="Password_check_using_Regualation()">*/
/*                     <label id = "lb_pw_cf"></label>*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="number" class="form-control form-control-user" name="pregnancy_month" placeholder="Pregnancy Month">*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="date" class="form-control form-control-user" name="birth" placeholder="Birth">*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type=" tel" class="form-control form-control-user" name="phone" placeholder="Phone Number do not include '-'">*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="text" class="form-control form-control-user" name="state" placeholder="State">*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <input type="text" class="form-control form-control-user" name="city" placeholder="City">*/
/*                 </div>*/
/*                 <br />*/
/*                 <div class="form-group">*/
/*                   <input type="radio" name = "gender" value="F">&nbspFemale&nbsp&nbsp&nbsp&nbsp*/
/*                   <input type="radio" name = "gender" value="M">&nbspMale*/
/*                 </div>*/
/*                 <button type ="submit" class="btn btn-primary btn-user btn-block">*/
/*                   Register Account*/
/*                 </button>*/
/*               </form>*/
/* */
/* */
/*               <br />*/
/*               <div class="text-center">*/
/*                 <a class="small" href="forgot-password.html">Forgot Password?</a>*/
/*               </div>*/
/*               <div class="text-center">*/
/*                 <a class="small" href="login.html">Already have an account? Login!</a>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* */
/* */
/*     <script>*/
/*     // return 0 : not correct, return 1 : correct*/
/*       function Password_check_using_Regualation(){*/
/*         var pw = document.getElementById('Password').value;*/
/*         var pw_confirm = document.getElementById('Password_confirm').value;*/
/* */
/*         var flag = 0;*/
/*         var special_symbol_reqExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;*/
/*         var capital_reqExp = /[A-Z]/;*/
/* */
/*         if(pw.length <= 8 || pw.search(special_symbol_reqExp) == -1 || pw.search(capital_reqExp) == -1){*/
/*           document.getElementById('lb_pw').innerHTML = "password must be over 8 character include Special Symbol, Capital, Number";*/
/*           return 0;*/
/*         }else{*/
/*           document.getElementById('lb_pw').innerHTML = "That's right!";*/
/*           flag = 1;*/
/*         }*/
/* */
/*         //checking password confirm*/
/*         if(flag == 1 && pw == pw_confirm){*/
/*           document.getElementById('lb_pw').innerHTML = "correct!";*/
/*           document.getElementById('lb_pw_cf').innerHTML = "correct!";*/
/*           return 1;*/
/*         }else if(pw != pw_confirm){*/
/*           document.getElementById('lb_pw_cf').innerHTML = "password is not same!";*/
/*           return 0;*/
/*         }else{*/
/*           document.getElementById('lb_pw_cf').innerHTML = "please check password requirement!";*/
/*         }*/
/*       }*/
/*     </script>*/
/* */
/* */
/*   <!-- Bootstrap core JavaScript-->*/
/*   <script src="/vendor/jquery/jquery.min.js"></script>*/
/*   <script src="/vendor/bootstrap//js/bootstrap.bundle.min.js"></script>*/
/* */
/*   <!-- Core plugin JavaScript-->*/
/*   <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/*   <!-- Custom scripts for all pages-->*/
/*   <script src="/js/sb-admin-2.min.js"></script>*/
/* */
/* </body>*/
/* */
/* </html>*/
/* */
