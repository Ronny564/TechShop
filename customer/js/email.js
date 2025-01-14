function sendMail()
{
    let parms={
         name : document.getElementById("name").value,
         email : document.getElementById("email").value,
         message : document.getElementById("message").value,
    }
    emailjs.send("service_m8rtxis","template_g03qd9z",parms).then(alert("Email Sent!!"))
}
