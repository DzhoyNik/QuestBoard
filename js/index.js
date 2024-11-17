const formSignUp = document.getElementById("sign-up");
const formSignIn = document.getElementById("sign-in");

function onViewFormSignUp() {
    formSignIn.style.display = "none";
    formSignUp.style.display = "flex";
}

function onViewFormSignIn() {
    formSignIn.style.display = "flex";
    formSignUp.style.display = "none";
}

function signIn() {
    const login = formSignIn.getElementsByTagName("input")[0].value;
    const password = formSignIn.getElementsByTagName("input")[1].value;

    $.ajax({
        url: "/php/user/signIn.php",
        method: "post",
        cache: false,
        data: {
            login: login,
            password: password
        },
        dataType: "html",
        success: (e) => {
            if (e == "Success") {
                location.replace("../main.php");
            }
        }
    })
}

function signUp() {
    const login = formSignUp.getElementsByTagName("input")[0].value;
    const email = formSignUp.getElementsByTagName("input")[1].value;
    const firstName = formSignUp.getElementsByTagName("input")[2].value;
    const password = formSignUp.getElementsByTagName("input")[3].value;
    const modal = document.getElementsByClassName("modal")[0];

    if (login != "" && email != "" && firstName != "" && password != "") {
        $.ajax({
            url: '../php/user/sendMail.php',
            method: 'POST',
            cache: false,
            data: {
                login: login,
                firstName: firstName,
                email: email
            },
            dataType: "html",
            success: (e) => {
                if (e == "") {
                    modal.style.display = "flex";
                }
            }
        })
    }
}

window.onload = () => {
    const btnSignIn = document.getElementById("sign-in").getElementsByTagName("button")[0];
    const btnOnSignUp = document.getElementById("sign-in").getElementsByTagName("button")[1];
    const btnCreateAccount = document.getElementById("sign-up").getElementsByTagName("button")[0];
    const btnOnSignIn = document.getElementById("sign-up").getElementsByTagName("button")[1];

    btnOnSignUp.onclick = () => onViewFormSignUp();
    btnOnSignIn.onclick = () => onViewFormSignIn();

    btnSignIn.onclick = () => signIn();
    btnCreateAccount.onclick = () => signUp();

    const modal = document.getElementsByClassName("modal")[0];
    const inputs = modal.getElementsByTagName("input");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("input", () => {
            inputs[i+1].focus();
        })
    }
}

window.onchange = () => {
    const modal = document.getElementsByClassName("modal")[0];
    const inputs = modal.getElementsByTagName("input");

    if (inputs[0].value != "" && inputs[1].value != "" && inputs[2].value != "" && inputs[3].value != "" && inputs[4].value != "" && inputs[5].value != "") {
        const login = formSignUp.getElementsByTagName("input")[0].value;
        const email = formSignUp.getElementsByTagName("input")[1].value;
        const firstName = formSignUp.getElementsByTagName("input")[2].value;
        const password = formSignUp.getElementsByTagName("input")[3].value;
        let captcha = inputs[0].value + inputs[1].value + inputs[2].value + inputs[3].value + inputs[4].value + inputs[5].value;

        $.ajax({
            url: '../../php/user/checkVerify.php',
            method: 'POST',
            cache: false,
            data: {
                login: login,
                captcha: captcha
            },
            dataType: 'html',
            success: (e) => {
                if (e == "Success") {
                    $.ajax({
                        url: "/php/user/signUp.php",
                        method: "post",
                        cache: false,
                        data: {
                            login: login,
                            email: email,
                            firstName: firstName,
                            password: password
                        },
                        dataType: "html",
                        success: (status) => {
                            if (status == 200)
                                location.replace("../main.php");
                            else 
                                console.log(status);
                        }
                    })
                }
            }
        })
    }
}