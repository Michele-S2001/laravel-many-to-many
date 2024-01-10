/* recupero l'elemento per far vedere i tools dal DOM */
/* recupero gli elementi tool */
const showToolsDomElement = document.getElementById("show-tools");
const toolsDomElements = document.querySelectorAll(".tool");

// aggancio l'evento click al show-tools
showToolsDomElement.addEventListener("click", () => {
    toolsDomElements.forEach((tool) => {
        tool.classList.toggle("hide");
    });
});
