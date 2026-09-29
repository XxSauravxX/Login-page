document.queryselector("form").add
EventListener("submit", function (event){

        const email = document.queryselector('input[name="email"]').value.trim();
        const password = document.queryselector('input[name="pssword"]').value;


        if (email === "" || password === ""){

            alert("please enetr your email and password.");
            event.preventDefault();
            return;

        }

        if (!email.includes("@")) {
            alert("Please enter a valid email addess.");
            event.preventDefault();
            return;

        }
});