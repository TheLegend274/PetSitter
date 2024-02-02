function ShowErrorLabel()
{
    document.getElementById("ID_ErrorLabel").textContent = "Invalid Username or Password";
}

function ShowDate()
{
    const date = new Date();
    document.getElementById("ID_DateLabel").textContent = (date.getMonth() + 1) + "/" + date.getDate() + "/" + date.getFullYear();
}