/* FUNCTION TO CHANGE THE CONTENT WHEN CLICKED ON THE SIDE MENU */
function showContent(event,id){
    var tabs = document.getElementsByClassName("vTabs")
    var contents = document.getElementsByClassName("vTabContent")
    var givenId = document.getElementById(id)
    for(var i=0 ;i < contents.length;i++){
        contents[i].style.display = "none";
    }
    for(var i=0;i<tabs.length;i++){
        tabs[i].classList.remove('active')
    }
    givenId.style.display = "block"
    event.currentTarget.classList.add("active")
}
document.getElementById("defaultOpen").click()



/* FUNCTION TO SHOW SELECTED IMAGE WHEN ADDING A PROPERTY DETAILS */
function showChoosenImage(selectImage,displayImage){
    const select = document.getElementById(selectImage);
    const display = document.getElementById(displayImage);
    if(select.files && select.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            display.src = e.target.result;
            display.style.display = "block";
        }
        reader.readAsDataURL(select.files[0]);
    }
}