const form = document.querySelector("form");
const clearButton = document.querySelector('input[type="reset"]'); 


function handleClear(e) 
{
    if (!confirm("Are you sure you want to clear the form?")) 
    {
        e.preventDefault();
    }
    else 
    {
        form.reset();
    }
}

function handleSubmit(e) 
{
    const title = document.querySelector('input[name="title"]'); 
    const content = document.querySelector('textarea[name="content"]');

    title.classList.remove("missing");
    content.classList.remove("missing");
    
    let isEmpty = false;


    if (title.value.trim() === "" && content.value.trim() === "") {
        title.classList.add("missing");
        content.classList.add("missing");
        alert("Please fill in the title and content boxes.");
        isEmpty = true;
    } else if (title.value.trim() === "") {
        title.classList.add("missing");
        alert("Please fill in the title box.");
        isEmpty = true;
    } else if (content.value.trim() === "") {
        content.classList.add("missing");
        alert("Please fill in the content box.");
        isEmpty = true;
    }

    if (isEmpty) {
        e.preventDefault(); // prevent form from submitting
    }
}


if (form) 
{
    form.addEventListener("submit", handleSubmit);
}

if (clearButton) 
{
    clearButton.addEventListener("click", handleClear);
}
