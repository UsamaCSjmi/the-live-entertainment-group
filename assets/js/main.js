$('.read-more').click((e)=>{
    current = e.target
    target = current.getAttribute("data-target-id");
    $("#"+target).toggleClass("d-none");
    if(e.target.innerText == "Read More +"){
        e.target.innerText = "Read Less -"
    }
    else{
        e.target.innerText = "Read More +"
    }
});