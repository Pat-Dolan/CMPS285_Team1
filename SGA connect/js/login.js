
  
function check(form)/*function to check userid & password*/ {
    /*the following code checkes whether the entered userid and password are matching*/
    if (form.username.value == "sga" && form.password.value == "sga") {
        window.open('../index.html')/*opens the target page while Id & password matches*/
        window.close('../Login.html')
    }
    else {
        alert("Error Password or Username")/*displays error message*/
    }
}


