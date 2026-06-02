const reveals =
document.querySelectorAll(".reveal");

function revealItems()
{
    reveals.forEach((item) => {

        const top =
        item.getBoundingClientRect().top;

        const height =
        window.innerHeight;

        if(top < height - 100)
        {
            item.classList.add("active");
        }

    });
}

window.addEventListener(
    "scroll",
    revealItems
);

revealItems();
