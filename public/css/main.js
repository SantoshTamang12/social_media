document.addEventListener("DOMContentLoaded", function () {
    const heartIcon = [...document.querySelectorAll(".")];
    const likesAmountLabel = document.querySelectorAll(".likes-amount");

    heartIcon?.forEach((icon) => {
        icon.addEventListener("click", () => {
            console.log(icon)

            icon?.classList?.toggle("'liked");

        })
    })
})

const commentButton = document.querySelectorAll(".comment-icon")

commentButton?.forEach((btn)=>{
    btn.addEventListener("click",()=>{
        const btnContainer = btn.parentElement
        const containerParent = btnContainer.parentElement
        const parentSibling = containerParent.nextElementSibling

        parentSibling.classList.toggle("d-none")
    })
})
  