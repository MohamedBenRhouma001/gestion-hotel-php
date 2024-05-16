const esm = document.querySelector("#name");
const email = document.querySelector("#email");
const pwd = document.querySelector("#pwd");
const tel = document.querySelector("#tel");
const pwd1 = document.querySelector("#pwd1");
const button = document.querySelector(".registerBotton");


function cadastrar(){
    fetch("http://localhost:8080/Api/gestionHotel/v2/saveClient",
    {
        headers:{
            "Accept":"application/json",
            "Content-Type":"application/json"
        },
        method:"POST",
        body:JSON.stringify({
            nom: esm.value,
            mail: email.value,
            password: pwd.value,
            numtel : tel.value
        })
    })
    .then(function(rest){console.log(rest)})
    .catch(function(rest){console.log(rest)})
}

function limpar (){
    esm.value="",
    email.value="",
    pwd.value="",
    pwd1.value="",
    tel.value=""
}

button.addEventListener('click', (event) => {
    event.preventDefault();
    /*gol lhamadi yzidlek fonction verif lena lel les deux password  */
    cadastrar();
    limpar();
});