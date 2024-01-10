// recuperiamo tutti i pulsanti input dei form delete
const deleteInputs = document.querySelectorAll("[data-delete]");
// recupero il modale
const cModal = document.querySelector(".c-modal");
// recuper i pulsanti del modale
const cModalSubmit = document.getElementById("destroy");
const cModalUndo = document.getElementById("undo");

deleteInputs.forEach((input) => {
    input.addEventListener("click", (e) => {
        e.preventDefault();

        cModal.classList.add("show");
        cModalSubmit.addEventListener("click", () => {
            const target = input.dataset.target;
            const form = document.querySelector(target);
            form.submit();
        });

        cModalUndo.addEventListener("click", () => {
            cModal.classList.remove("show");
        });
    });
});
