var images = ["url(images/room.jpg)", "url(images/eat.jpg)", "url(images/contact-us.jpg)","url(images/gallery.jpg)","url(images/about-us.jpg)","url(images/detail.jpg)"]
function applybackground() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var head = document.getElementById("header");
    var text = document.getElementById("hero_text");
    head.style.height = "620px";
    if(page == "book.php"){
        head.style.backgroundImage = images[0];
    }
    else if(page == "dining.php"){
        head.style.backgroundImage = images[1];
        text.innerHTML = "DINING";
    }
    else if(page == "contact.php"){
        head.style.backgroundImage = images[2];
        text.innerHTML = "CONTACT US";
    }
    else if(page == "gallery.php"){
        head.style.backgroundImage = images[3];
        text.innerHTML = "GALLERY";
    }
    else if(page == "about.php"){
        head.style.backgroundImage = images[4];
        text.innerHTML = "ABOUT US";
    }
    else if(page == "dining_room.php"){
        head.style.backgroundImage = images[1];
        text.innerHTML = "DINING";
    }
    else if(page == "in_room_dining.php"){
        head.style.backgroundImage = images[1];
        text.innerHTML = "DINING";
    }
    else if(page == "private_dining.php"){
        head.style.backgroundImage = images[1];
        text.innerHTML = "DINING";
    }
    else if(page == "detail.php"){
        head.style.backgroundImage = images[5];
        text.innerHTML = "Just a Smile Away :)";
        text.style.fontSize = '50px'
    }
}
applybackground();