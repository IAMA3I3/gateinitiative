const input = document.querySelector("#file-inp")
const display = document.querySelector("#file-name")

input.onchange = () => {
    display.innerHTML = input.value
}